<?php

if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['mail'])){
    
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    $mail = htmlspecialchars($_POST['mail']);

    try{
        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = ("INSERT INTO user (user_mail,user_password,user_role,user_pseudo) VALUES ('$mail', '$password', 'user', '$username');");
        $req = $db->prepare($sql)->execute();
        
        
        
        header("Location:acceuil.php");

        
    }catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }

}

?>