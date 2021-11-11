<?php

require_once('config.php');

$id_user = $_GET['id']; // get id through query string

$sql = "delete from user where id_user = '$id_user'";

$result = $conn->query($sql);

if($result)
{
    header("location:gestion-compte.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>