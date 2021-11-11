<?php
session_start();
include ('fonctions.php');
$Cheatsheets =  display_favorite_cheatsheet();

$db = new PDO('mysql:host=localhost;dbname=edams','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['valider'])){
    $option = $_POST['choix'];
   
        if($option == "A-Z"){
            $req = "SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet,name_category FROM cheatsheet NATURAL JOIN category  WHERE (SELECT user.id_user FROM user WHERE user_pseudo = ?) AND  favorite_cheatsheet = 1  ORDER BY title_cheatcheet DESC ";
            $result = mysqli_query($db, $req);
            if(mysqli_fetch_assoc($result)){
              
                echo' 
                
                <div class="card">
                    <div class="card-header">'.$cheatsheet['title_cheatsheet'].'</div>
                    <span class="badge bg-secondary text-decoration-none link-light" >'.$cheatsheet['name_category'].'</span>

                   <div class="card-body"><p>'.$cheatsheet['content_cheatsheet'].'</p></div> 

                    <div class="card-footer">
                    <a href=fiche.php?id='.$cheatsheet['id_cheatsheet'].'><button type="button" class="btn btn-primary"> Accéder</button></a>
                    </div>
                </div>
                '; 

            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <title>Favoris </title>
</head>
<body>
    <?=display_navbar_user()?>
    <div class="container">
    

    <h3> Vos fiches favorites </h3>

    <p>Trier par :
            <form method="post" action="">
                <select name="choix" type = "submit">
                    <option value="Points">Date</option>
                    <option value="A-Z">A-Z</option>
                </select>
                <button type="submit" name="valider">Valider</button>
                <!--<button type="submit" name="refresh">refresh</button>-->
            
            </form>
        
        <?php 
            
        try{
            //var_dump($Cheatsheets);
            if(!$Cheatsheets){
                $Cheatsheets = [];
                
            }
            foreach($Cheatsheets as $cheatsheet ){
                echo' 
                
                <div class="card">
                    <div class="card-header">'.$cheatsheet['title_cheatsheet'].'</div>
                    <span class="badge bg-secondary text-decoration-none link-light" >'.$cheatsheet['name_category'].'</span>

                   <div class="card-body"><p>'.$cheatsheet['content_cheatsheet'].'</p></div> 

                    <div class="card-footer">
                    <a href=fiche.php?id='.$cheatsheet['id_cheatsheet'].'><button type="button" class="btn btn-primary"> Accéder</button></a>
                    </div>
                </div>
                '; 
            }
        } catch(PDOException $e){
            die('Errer :'.$e->getMessage());
        }

        ?>

    </div>
    
</body>
</html>