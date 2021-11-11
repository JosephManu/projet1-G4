<?php
include('connexionBDD.php');
$sql = ("SELECT * FROM user");
$req = $db->prepare($sql);
$req ->execute();
$count = $req->rowCount(); 

if($count >= 1){
    
    $data =$req->fetchAll(PDO::FETCH_OBJ);
}