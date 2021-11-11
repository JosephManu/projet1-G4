<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
    <link rel="stylesheet" href="formulaire-fiche.css">
    <title>Gerez catégorie</title>
</head>
<body>
    
    <h1>Gerez catégorie</h1> 

    <form action="formulaire-fiches.php" method="POST">
    nom de la catégorie:
    <input type="text" name="CategoryName" size="8" maxlength="8">
    <input type="submit" name="Submit"  value="Envoyer">
    </form>
    <?php include 'admin_fct_ctg.php';?>
</body> 
</html>