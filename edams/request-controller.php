<?php

include ('fonctions.php');


if(isset($_GET['id'])){
            
    $CheatsheetId = htmlspecialchars($_GET['id']);
    
}

if(isset($_POST['title_request']) && !empty($_POST['title_request']) && isset($_POST['content_request']) && !empty($_POST['content_request']) && isset($_POST['category']) && !empty($_POST['category'])){
   
    $title_request = htmlspecialchars($_POST['title_request']);

    $category = htmlspecialchars($_POST['content_request']);

    $content_request = htmlspecialchars($_POST['category']);

    if( Post_request($title_request,$content_request,$category) ){

        $statut= "Demande enregistrée";
        
        header('Location:request.php');
    }else{

        $statut= "Une érreur s'est produite";
        
        header('Location:request.php');
    }

    
    

    
}


?>