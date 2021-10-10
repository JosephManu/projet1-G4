<?php


$resultat= '';

if(isset($_POST['query']) && !empty($_POST['query'])){
   $query = htmlspecialchars($_POST['query']);

   include('connexionBDD.php');

   
   $sql = ("SELECT id_cheatsheet,title_cheatsheet,name_category,content_cheatsheet FROM cheatsheet INNER JOIN category ON cheatsheet.id_cheatsheet=category.id_category WHERE title_cheatsheet LIKE ? OR name_category LIKE ?  ; ");
   $req = $db->prepare($sql);
   $req ->execute(array('%'.$query.'%',$query.'%'));

   $count = $req->rowCount(); 

   $tableHead = "<div class='table-responsive'><table class='table table-dark table-striped'>
   <thead>
       <tr>
       <th scope='col'>#</th>
       <th scope='col'>Titre</th>
       <th scope='col'>Catégorie</th>
       <th scope='col'></th>


       </tr>
   </thead>
   <tbody>";

   if($count >= 1){
       $res= " <p>$count résultat(s) trouvé(s) pour <strong> $query</strong></p>";
       $data =$req->fetchAll(PDO::FETCH_OBJ);
       
   }else{
       $res= "<p>$count résultat(s) trouvé(s) pour <strong> $query</strong></p>";
       $data = null ; 
       $tableHead ='';
   }
   
}else{

    $res="";
    $tableHead = "Veuillez renseigner les termes de votre recherche ..."; 
    $data=[];

   

}





    

?>