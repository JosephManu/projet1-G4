<?php
 if(isset($_POST['CategoryName']) && !empty($_POST['CategoryName']))
 {
    $NewCategory = $_POST['CategoryName'];
    $db = new PDO('mysql:host=localhost;dbname=edams','root','');
    $query = $db->prepare("INSERT INTO category (name_category) VALUES (?);");
    $query ->execute(array($NewCategory));
 }
    if(!empty($NewCategory) ){
        echo'La catégorie a bien était crée'; 
    }
 
 ?>

  <?php
    try {
            $bdd = new PDO('mysql:host=localhost;dbname=edams','root','');
            $query = $bdd->prepare("SELECT * FROM  category");
            $query->execute();
            $data = $query->fetchAll();
            echo '
            <form action="admin_fct_ctg.php" method="POST">
            <p>supprimer une catégorie 
             <select name="id">';
                foreach ($data as $e) {
                    echo "<option value=".$e['id_category'].">".$e['name_category']."</option>";
                } 
                if(isset($_POST['id']))
                {
                    $SupprCategory = $_POST['id'];
                    $db = new PDO('mysql:host=localhost;dbname=edams','root','');
                    $query = $db->prepare("DELETE FROM `category` WHERE `category`.`id_category` = (?) ;");
                    $query ->execute(array($SupprCategory));
                    header("Location: formulaire-fiches.php");
                }
                if($query == true ){
                    echo'La catégorie a bien était supprimé'; 
                }
     echo "    </select>
                <input type='submit' name='delete'  value='Supprimer'>
            </form>
                ";

        } catch(PDOException $e) {

            die('Error :' . $e->getMessage());
        }
?>