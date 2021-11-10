<?php 

if(isset($_GET['name_category'])){
            
    $name_category = htmlspecialchars($_GET['name_category']);
    $Cheatsheets = display_category_cheatsheet($name_category); 
}


try{

    // connexion
    $con = mysqli_connect("localhost","root","","edams");
        

    // avoir tous les categories
    $sql = "SELECT * FROM `category`";
    $all_categories = mysqli_query($con,$sql);


      



    // si le button 'submit' est cliqué
    // on insert les infos dans la bdd
    if(isset($_POST['submit']))
    {

        echo '<script>alert("demande envoyé")</script>';
        // stoquer les infos dans une variables
        $content = mysqli_real_escape_string($con,$_POST['content_request']);
        
        // stoquer le id category dans une variable
        $cat = mysqli_real_escape_string($con,$_POST['cat_request']);

        $title_request = mysqli_real_escape_string($con,$_POST['title_request']);
        
        // creation de insert into
        // dans une variable.
        
        $sql_insert ="INSERT INTO request_cheatsheet (title_request,content_request,category_request) VALUES ($title_request,$content,$cat);";

        $insert = mysqli_query($con,$sql_insert);

        
        // executer la requette sql
        // si il y a pas d'erreur
        // un message js est affiché
        // pour dire que la demande a été envoyé

        if(1==1)
        {
            header('Location:request.php');
        }
    }
}
catch(PDOException $e){
    die('Errer :'.$e->getMessage());
}

