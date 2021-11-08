<?php

$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);

/*$username = stripcslashes($username);
$password = styipcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);*/

try{
    $db = new PDO('mysql:host=localhost;dbname=edams','root','');

}
catch(PDOException $e){
    die('Errer :'.$e->getMessage());
}

if(isset($_POST['user']) && !empty($_POST['pass'])){
 
    $sql = ("select * from user where user_pseudo = ? and user_password = ?");
    $req = $db->prepare($sql);
    $req ->execute(array($username, $password));
 
    $count = $req->rowCount();

    if ($count==1){
        echo "Login success!!! Welcome ".$username;
        echo "<a href='../UtilisateurCom/index.html?user=<?php echo $username; ?>'>Page commentaire</a><br><br>";
    }
    else{
        echo "Failed to login !";
    }
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