<?php
include ('fonctions.php');
include('controller-admin_request.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Gestion des demandes utilisateurs</title>
</head>
<body>
<?=display_navbar_admin()?>
        <div class="container">

        <h1>Gestion des demandes</h1>
            <div class='table-responsive'>
                <table class='table table-dark table-striped'> 
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Titre</th>
                            <th scope='col'>Catégorie</th>
                            <th scope='col'></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(is_null($data)){
                                $data=[];
                            }

                        try{
                            foreach($data as $q){
                                echo
                                "
                                <tr>
                                    <th scope='row'>".$q['id_request']."</th>
                                    <td>". $q['title_request']."</td>    
                                    <td>".$q['category_request']."</td>
                                    <td><a href='request_cheatsheet.php?idRequest=".$q['id_request']."'><img src='images\white-eyes-removebg-preview-ConvertImage.png' title='consulter la fiche' width=40px alt= yeux </img></a> </td>
                                  
        
                                </tr>"; 
                            }
                        }catch(PDOException $e){
                            
                        }
                        
                    
                        ?>
                    


                    </tbody>

                
                </table>
            </div>
                        
        </div>
</body>
</html>