<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire-fiche.css">
    <title>création de fiche</title>
</head>
<body>
    <h1>Création d'une fiche</h1>


        
    <?php
    try {
            $bdd = new PDO('mysql:host=localhost;dbname=edams','root','');
            $query = $bdd->prepare("SELECT * FROM  category");
            $query->execute();
            $data = $query->fetchAll();

            echo '
            <form action="process.php" method="POST">
                <td>Nom fiches :</td>
                <td><input type="text" name="ficheName" size="8" maxlength="8"></td>
                <td><textarea wrapper name="contenu" id="" col="30" rows="10"></textarea></td>

                <select name="id">
                ';
                
                foreach ($data as $e) {
                    echo "<option value=".$e['id_category'].">".$e['name_category']."</option>";
                } 

     echo "    </select>
                <input type='submit' name='submit' value='Envoyer'>

            </form>
                ";

        } catch(PDOException $e) {

            die('Error :' . $e->getMessage());
        }


?>
    
   
    </body>
    </html> 