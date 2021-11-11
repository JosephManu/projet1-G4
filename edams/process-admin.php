<?php
session_start();

if(isset($_POST['user']) && !empty($_POST['user'])  &&  !empty($_POST['pass'])   && isset($_POST['pass']) ){

    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);

    try{
        
        if(isset($_POST['user']) && !empty($_POST['pass'])){

            $db = new PDO('mysql:host=localhost;dbname=edams','root','');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = ("select * FROM admin WHERE pseudo_admin = ? and admin_password = ?");
            $req = $db->prepare($sql);
            $req ->execute(array($username,$password));
         
            $count = $req->rowCount();
        
            if($count==1){

               header('Location:admin_acceuil.php');
           
                $_SESSION['pseudo']= $username;
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