<?php

require_once('config.php');

$id_user = $_POST['id_user'];
$email = $_POST['email'];
$pseudo= $_POST['pseudo'];

$sql = "update user set user_mail = '$email' , user_pseudo ='$pseudo' where id_user = '$id_user'";

$result = $conn->query($sql);

if($result)
{
    header("location:admin_acceuil.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error modification record"; // display error message if not delete
}

?>