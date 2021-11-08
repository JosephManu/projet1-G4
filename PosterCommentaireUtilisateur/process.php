<?php

$com = htmlspecialchars($_POST['com']);

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
if(isset($_POST['com'])){
 
    $sql = ("INSERT INTO `remark` (`id_remark`, `content_remark`, `date_remark`, `id_cheatsheet`, `id_user`) VALUES (NULL, '$com', '2021-10-01 00:00:00', '1', '1')");
    $req = $db->prepare($sql);
    $req ->execute(array($com));
    header("Location: index.html");
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