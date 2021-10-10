<?php

    /*
    
    */


    function display_searched_cheatsheet($id){

        // Connxion à la base de donée
        include('connexionBDD.php');

      
        
        $sql = ("SELECT id_cheatsheet,date_cheatsheet,title_cheatsheet,name_category,content_cheatsheet FROM cheatsheet INNER JOIN category ON cheatsheet.id_cheatsheet=category.id_category WHERE id_cheatsheet = ? ORDER BY date_cheatsheet DESC");
        $req = $db->prepare($sql);
        $req->execute(array($id));
        if($req->rowCount()== 1 ){

            $cheatsheet = $req->fetch(PDO::FETCH_OBJ);

            return $cheatsheet;
        }

    }

    function diplay_cheatsheet(){

         // Connxion à la base de donée
         include('connexionBDD.php');

      
         //Recupère les fiches en BDD
         $sql = ("SELECT id_cheatsheet,date_cheatsheet,title_cheatsheet,name_category,content_cheatsheet FROM cheatsheet INNER JOIN category ON cheatsheet.id_cheatsheet=category.id_category ORDER BY date_cheatsheet ASC ");
         $req = $db->prepare($sql);
         $req->execute();
        $cheatsheet = $req->fetchAll(PDO::FETCH_OBJ);
        return $cheatsheet;
        
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




?>