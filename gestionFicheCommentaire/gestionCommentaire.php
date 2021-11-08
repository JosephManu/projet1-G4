<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM remark WHERE id_cheatsheet='" . $_GET["id_cheatsheet"] . "'");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Gestion Com</title>
</head>
<body>
<table border='1'>
	<tr>
	<td>id</td>
	<td>commentaire</td>
	<td>date</td>
	<td>id cs</td>
	<td>id user</td>
	<td>Action</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_remark"]; ?></td>
	<td><?php echo $row["content_remark"]; ?></td>
	<td><?php echo $row["date_remark"]; ?></td>
	<td><?php echo $row["id_cheatsheet"]; ?></td>
	<td><?php echo $row["id_user"]; ?></td>
	<td><a href="delete-process.php?id_remark=<?php echo $row["id_remark"]; ?>">Supprimer</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>