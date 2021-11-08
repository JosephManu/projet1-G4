<?php

	// connexion
	$con = mysqli_connect("localhost","root","","edams");
	

	// avoir tous les categories
	$sql = "SELECT * FROM `category`";
	$all_categories = mysqli_query($con,$sql);

	// si le button 'submit' est cliqué
	// on insert les infos dans la bdd
	if(isset($_POST['submit']))
	{
		// stoquer les infos dans une variables
		$info = mysqli_real_escape_string($con,$_POST['info']);
		
		// stoquer le id category dans une variable
		$cat = mysqli_real_escape_string($con,$_POST['category']);
		
		// creation de insert into
		// dans une variable.
		$sql_insert =
		"INSERT INTO `demande`(`info`, `id_category`)
			VALUES ('$info','$cat')";
		
		// executer la requette sql
		// si il y a pas d'erreur
		// un message js est affiché
		// pour dire que la demande a été envoyé
		if(mysqli_query($con,$sql_insert))
		{
			echo '<script>alert("demande envoyé")</script>';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
<div id="frm">
	<form method="POST">
		<label>Informations:</label>
		<input type="text" name="info" required><br>
		<label>Categorie</label>
		<select name="category">
			<?php
				// utilisation de while loop pour prendre les données
				// de la variable $all_categories
				// et les afficher individuelement comme options
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["id_category"];
					// la clé primaire
				?>">
					<?php echo $category["name_category"];
						// montrer le nom de la categorie
					?>
				</option>
			<?php
				endwhile;
				// loop de while s'arrete ici
			?>
		</select>
		<br>
		<input type="submit" id ="btn" value="submit" name="submit">
	</form>
    </div>
	<br>
</body>
</html>
