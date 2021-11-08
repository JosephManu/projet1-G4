<?php

echo "<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>Titre fiche</th>
<th>contenus</th>
</tr>";


$conn = mysqli_connect("localhost", "root", "", "edams");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM cheatsheet";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id_cheatsheet"]. "</td><td>" . $row["title_cheatsheet"] . "</td><td>"
. $row["content_cheatsheet"]. "</td></tr>";
}
//echo "<a href='Afficher commentaires.php'>Page commentaire</a><br><br>";
echo "</table>";
} else { echo "0 results"; }
$conn->close();


echo "</table>
</body>
</html>";


?>