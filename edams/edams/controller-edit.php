<?php

include('fonctions.php');
if(isset($_GET['id'])){
            
    $CheatsheetId = htmlspecialchars($_GET['id']);
    
}

if(isset($_POST['edit']) && !empty($_POST['edit'])){
   
    $edited_cheatsheet = htmlspecialchars($_POST['edit']);

    Edit_Cheatsheet($CheatsheetId,$edited_cheatsheet);
    

    header('Location:fiche.php?id='.$CheatsheetId.'');
    
}


?>