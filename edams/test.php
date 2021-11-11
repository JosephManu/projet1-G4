<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fiche.css">
    <title>création de fiche</title>   
</head>

<body>
    <h1>Création d'une fiche</h1>

<?php
    try {
            $bdd = new PDO('mysql:host=localhost;dbname=edams','root','');
            $query = $bdd->prepare("SELECT * FROM  category");
            $query->execute();
            $data = $query->fetchAll();

            echo '
            <div class="mb-3" >
            <form action="processtest.php" method="POST">

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" name="ficheName"></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom de votre fiche">
                </div>
                </br>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" name="contenu"></label>
                </br>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre Contenu"></textarea>
                </div>

                <select name="id"> 
                
                ';
                
                foreach ($data as $e) {
                    echo "<option name='id' value=".$e['id_category'].">".$e['name_category']."</option>";
                } 

                 echo "    </select>
                <input type='submit' name='submit' value='Envoyer'>

            </form>
            </div>
                ";

        } catch(PDOException $e) {

            die('Error :' . $e->getMessage());
        }


    ?>
    
   Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque exercitationem excepturi quis vitae obcaecati consequatur, nihil asperiores accusamus. Eligendi quibusdam, deserunt ab voluptate distinctio quia consequuntur iusto quasi commodi modi?settype
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
    </html>