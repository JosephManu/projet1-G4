<?php

  function icon_user(){
       // Connxion à la base de donée
       try{
        $db = new PDO('mysql:host=localhost;dbname=edams','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // execution sql
        $sql = ("SELECT icon_user from user where id_user = 1 ");
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

    function display_searched_cheatsheet($id){

        // Connxion à la base de donée
        try{
            $db = new PDO('mysql:host=localhost;dbname=edams','root','');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // execution sql
            $sql = ("SELECT id_cheatsheet,date_cheatsheet,title_cheatsheet,content_cheatsheet FROM cheatsheet   WHERE id_cheatsheet = ? ORDER BY date_cheatsheet DESC");
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

    function display_cheatsheet(){

         // Connxion à la base de donée
         include('connexionBDD.php');

      
         //Recupère les fiches en BDD
         $sql = ("SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet,name_category FROM cheatsheet INNER JOIN category ON cheatsheet.id_cheatsheet=category.id_category ;");
         $req = $db->prepare($sql);
         $req->execute();
         $cheatsheets = $req->fetchAll();
        return $cheatsheets;
        
    }

    function diplay_favorite_cheatsheet(){

        // Connxion à la base de donée
        include('connexionBDD.php');

     
        //Recupère les fiches en BDD
        $sql = ("SELECT * FROM cheatsheet WHERE favorite_cheatsheet = 1  ORDER BY date_cheatsheet DESC ;");
        $req = $db->prepare($sql);
        $req->execute();
        $cheatsheets = $req->fetchAll();
       return $cheatsheets;
       
   }




    function AddComment($CheatsheetId,$comment){
        require('ConnexionBDD.php');
        $req= $db->prepare("INSERT INTO remark (content_remark,date_remark,id_user,id_cheatsheet) VALUES (?,NOW(),?,?)");
        $req->execute(array($comment,1,$CheatsheetId));
        
    }

    function display_category_cheatsheet(){
         // Connxion à la base de donée
         include('connexionBDD.php');

      
         //Recupère les categories en BDD
         $sql = ("SELECT name_category FROM category;");
         $req = $db->prepare($sql);
         $req->execute(array($id));
         if($req->rowCount()== 1 ){
 
             $category = $req->fetch(PDO::FETCH_OBJ);
 
             return $category;
         }
 
    }

    function getRemark($CheatsheetId){
        
        try{
            require('ConnexionBDD.php');
            // execution sql
            $sql = ("SELECT * FROM remark WHERE id_cheatsheet = ? ;");
            $req = $db->prepare($sql);
            $req->execute(array($CheatsheetId));
            $remarks = $req->fetchAll(PDO::FETCH_OBJ);
    
            return $remarks;
        }
        catch(PDOException $e){
            die('Errer :'.$e->getMessage());
        }
    }

    function display_navbar(){

        echo '
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"> WIKI G4</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav">

                            <li class="nav-item active">
                                <a class="nav-link" href="acceuil.php">Acceuil <span class="sr-only"></span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="recherche.php">Recherche</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="favorite.php">Favoris</a>
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link " href="profil.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profil
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="connexion.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Deconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>';
    }




?>