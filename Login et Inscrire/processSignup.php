<?php

$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);
$mail = htmlspecialchars($_POST['mail']);

/*$username = stripcslashes($username);
$password = styipcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);*/

//connexion à la base de donnees
try{
    $db = new PDO('mysql:host=localhost;dbname=edams','root','');

}
catch(PDOException $e){
    die('Errer :'.$e->getMessage());
}

//requete sql
if(isset($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['mail'])){
 
    $sql = ("INSERT INTO `user` (`id_user`, `user_mail`, `user_password`, `user_role`, `user_pseudo`) VALUES (NULL, '$mail', '$password', '', '$username')");
    $req = $db->prepare($sql);
    $req ->execute(array($username, $password, $mail));

    header("Location: LOGIN.html");
}

/*
$result = mysql_query("select * from users where username = '$username' and password = '$password'")
            or die("failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password){
    echo "Login success!!! Welcome ".$row['username'];
} else{
    echo "Failed to login !";
}*/

?>