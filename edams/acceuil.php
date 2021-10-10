<?php
include ('fonctions.php');
$Cheatsheets = diplay_cheatsheet();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <title>Acceuil </title>
</head>
<body>
    <div class="container">
        <?php 

        foreach($Cheatsheets as $cheatsheet ){
            echo' 
            
            <div class="card">
                <div class="card-header">'.$cheatsheet->title_cheatsheet.'</div>
                <span class="badge bg-secondary text-decoration-none link-light" >'.$cheatsheet-> name_category.'</span>

                <div class="card-body"><p>'.$cheatsheet->content_cheatsheet.'</p></div> 

                <div class="card-footer">
                <a href=fiche.php?id='.$cheatsheet->id_cheatsheet.'><button type="button" class="btn btn-primary"> Accéder</button></a>
                </div>
            </div>
            '; 
        }
        ?>

    </div>
    
</body>
</html>