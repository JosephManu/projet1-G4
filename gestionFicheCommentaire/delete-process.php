<?php
include_once 'database.php';
$sql = "DELETE FROM remark WHERE id_remark='" . $_GET["id_remark"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Supprimé";
} else {
    echo "erreur: " . mysqli_error($conn);
}
mysqli_close($conn);
?>