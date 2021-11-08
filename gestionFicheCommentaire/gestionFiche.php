<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM cheatsheet");
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
	<td>titre</td>
	<td>contenu</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["id_cheatsheet"]; ?></td>
	<td><?php echo $row["title_cheatsheet"]; ?></td>
	<td><?php echo $row["content_cheatsheet"]; ?></td>
	<td><a href="gestionCommentaire.php?id_cheatsheet=<?php echo $row["id_cheatsheet"]; ?>">Voir les commentaires</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>