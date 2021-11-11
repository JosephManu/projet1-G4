<?php

function connexion(){

    try{
        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
    catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }

}

/**
 * @author: moi
 */
function Post_request($title_request,$content_request,$category){
    require('ConnexionBDD.php');
    $req= $db->prepare("INSERT INTO request_cheatsheet (title_request,content_request,category_request) VALUES (?,?,?)");
    $req->execute(array($title_request,$content_request,$category));


}



  function icon_user(){
       // Connxion à la base de donée
       try{
        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // execution sql
        $sql = ("SELECT icon_user from user where id_user = 1 ");
        $req = $db->prepare($sql);
        $req->execute(array());
        if($req->rowCount()== 1 ){

            $cheatsheet = $req->fetchAll(PDO::FETCH_OBJ);

            return $cheatsheet[0];
        }   

    }
    catch(PDOException $e){
        die('Errer :'.$e->getMessage());
    }
  }

    function display_searched_cheatsheet($id){

        // Connxion à la base de donée
        try{
            $db = new PDO('mysql:host=localhost;dbname=edams','root','');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // execution sql
            $sql = ("SELECT id_cheatsheet,date_cheatsheet,title_cheatsheet,content_cheatsheet,name_category FROM cheatsheet  NATURAL JOIN category  WHERE cheatsheet.id_cheatsheet =  ? ORDER BY date_cheatsheet DESC");
            $req = $db->prepare($sql);
            $req->execute(array($id));
            if($req->rowCount()== 1 ){
    
                $cheatsheet = $req->fetchAll(PDO::FETCH_OBJ);
    
                return $cheatsheet[0];
            }   
    
        }
        catch(PDOException $e){
            die('Errer :'.$e->getMessage());
        }
    

       
    }

    function unableAcces(){
        session_start();
        if(empty($_SESSION["pseudo"])){

            header("Location: index.php");
        }
    }

    function display_cheatsheet(){

         // Connxion à la base de donée
         include('connexionBDD.php');

      
         //Recupère les fiches en BDD
         $sql = ("SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet,date_cheatsheet FROM cheatsheet NATURAL JOIN category ORDER BY date_cheatsheet DESC");
         $req = $db->prepare($sql);
         $req->execute();
         $cheatsheets = $req->fetchAll();
        return $cheatsheets;
        
    }

    function display_favorite_cheatsheet(){

        // Connxion à la base de donée
        include('connexionBDD.php');

     
        //Recupère les fiches en BDD
        $sql = ("SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet,name_category FROM cheatsheet NATURAL JOIN category  WHERE (SELECT user.id_user FROM user WHERE user_pseudo = ?) AND  favorite_cheatsheet = 1  ORDER BY date_cheatsheet DESC ;");
        $req = $db->prepare($sql);
        $req->execute(array( $_SESSION['pseudo']));
        $cheatsheets = $req->fetchAll();
       return $cheatsheets;
       
   }


    function Edit_Cheatsheet($Idcheatsheet,$edited_cheatsheet){

        include('connexionBDD.php');
        $sql = "UPDATE cheatsheet SET content_cheatsheet=? WHERE id_cheatsheet=?";
        $req = $db->prepare($sql);
        $req->execute([$edited_cheatsheet,$Idcheatsheet]);
        if($req){
            $infos = "fiche modifiée avec succès";
        }
        
    }


    function AddComment($CheatsheetId,$comment){
        require('ConnexionBDD.php');
        $req= $db->prepare("INSERT INTO remark (content_remark,date_remark,id_user,id_cheatsheet) VALUES (?,NOW(),?,?)");
        $req->execute(array($comment,2,$CheatsheetId));
        
    }

    function display_category_cheatsheet($category){
         // Connxion à la base de donée
         include('connexionBDD.php');

      
         //Recupère les categories en BDD
         $sql = ("SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet,date_cheatsheet FROM cheatsheet NATURAL JOIN category WHERE name_category = ?  ORDER BY date_cheatsheet DESC ;");
         $req = $db->prepare($sql);
         $req->execute(array($category));
        $category = $req->fetchAll();
 
             return $category;
         
 
    }

    function getRemark($CheatsheetId){
        
        try{
            require('ConnexionBDD.php');
            // execution sql
            $sql = ("SELECT content_remark,date_remark,user_pseudo FROM remark NATURAL JOIN user WHERE id_cheatsheet = ? ORDER BY remark.date_remark DESC;;");
            $req = $db->prepare($sql);
            $req->execute(array($CheatsheetId));
            $remarks = $req->fetchAll(PDO::FETCH_OBJ);
    
            return $remarks;
        }
        catch(PDOException $e){
            die('Errer :'.$e->getMessage());
        }
    }

    function display_navbar_user(){

        echo '
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="acceuil.php"> WIKI G4</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav">

                            

                            <li class="nav-item">
                                <a class="nav-link" href="recherche.php">Recherche</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="favorite.php">Favoris</a>
                            </li>
                            
                          

                            <li class="nav-item ">
                                <a class="nav-link " href="deconnexion.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Deconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>';
    }


    function display_navbar_admin(){

        echo '
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="admin_acceuil.php"> WIKI G4</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav">

                            

                            <li class="nav-item">
                                <a class="nav-link" href="request_admin.php">Compte</a>
                            </li>

                            

                            <li class="nav-item">
                            <a class="nav-link" href="#">Commentaire</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Categorie</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="admin_request.php">Demande</a>
                </li>
                            
                          

                            <li class="nav-item ">
                                <a class="nav-link " href="deconnexion.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Deconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>';
    }


    function getRequest($idRequest){


       
        try{
            require('ConnexionBDD.php');
            // execution sql
            $sql = ("SELECT * FROM request_cheatsheet WHERE id_request = ? ");
            $req = $db->prepare($sql);
            $req->execute(array($idRequest));
            $requests = $req->fetchAll(PDO::FETCH_OBJ);
    
            return $requests[0];
        }
        catch(PDOException $e){
            die('Errer :'.$e->getMessage());
        }
    }




?>