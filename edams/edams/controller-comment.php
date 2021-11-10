<?php 

if(isset($_GET['id'])){
            
    $CheatsheetId = htmlspecialchars($_GET['id']);
    
}

if(isset($_POST['comment']) && !empty($_POST['comment'])){
   
    $remark = htmlspecialchars($_POST['comment']);

    AddComment($CheatsheetId,$remark);
    
}