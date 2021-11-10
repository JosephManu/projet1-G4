<?php
/*$server = "localhost";
$username = "root";
$password ="";
$dbname = "edams";

$conn = mysqli_connect($server, $username, $password, $dbname);*/


try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=edams','root','');
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if( isset($_POST['ficheName']) && isset($_POST['contenu']) && isset($_POST['id']) && !empty($_POST['ficheName']) && !empty($_POST['contenu']) && !empty($_POST['id'])){

        $name = $_POST['ficheName'];
        $content = $_POST['contenu'];   
        $id_category= $_POST['id'];
        //settype($id_category, "integer");

        $sql ="INSERT INTO cheatsheet (title_cheatsheet, content_cheatsheet, id_admin, id_category) VALUES (?,?,1,?)";
        $req =$bdd->prepare($sql);
        $req->execute(array($name,$content,$id_category));
       
            // = mysqli_query($bdd,$query) or die(mysqli_error());
            //$run ->execute(array($pseudo,$content_remark));

        if($req){
            echo  "OK" ;
        }
        else{
            echo "echec";
        }
    }
    else{
        echo "remplir  tous  les champs";
    }

}catch(PDOException $e) {

    die('Error :' . $e->getMessage());
}
    echo '</br>';
var_dump($_POST);

?>