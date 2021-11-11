<?php
session_start();

if(isset($_POST['user']) && !empty($_POST['user'])  &&  !empty($_POST['pass'])   && isset($_POST['pass']) ){

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
              
              
                $mail= $req->user_mail;
           
                $_SESSION['pseudo']= $username;
                $_SESSION['id']=1; 

               
            }
            else{
                echo "Failed to login !";
            }

        }else{
                echo "Vous devez remplir tous les champs";

        }
    
    }
    catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }
}else{
   
}



?>