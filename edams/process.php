<?php


if(isset($_POST['user']) && isset($_POST['pass']) ){

    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);

    try{
        
        if(isset($_POST['user']) && !empty($_POST['pass'])){

        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
            $sql = ("select * FROM user WHERE user_pseudo = ? and user_password = ?");
            $req = $db->prepare($sql);
            $req ->execute(array($username, $password));
         
            $count = $req->rowCount();
        
            if ($count==1){
               header('Location:acceuil.php');
            }
            else{
                echo "Failed to login !";
            }
        }
    
    }
    catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }
}



?>