<?php
require_once('config.php');

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$listUsers = [];
if ($result->num_rows > 0) {
    $listUsers = $result->fetch_all(MYSQLI_ASSOC);
}
?>