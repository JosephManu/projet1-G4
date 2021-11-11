<?php
require_once('config.php');

$sql = "SELECT * FROM request_cheatsheet";
$result = $conn->query($sql);
$data = [];
if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
}
?>