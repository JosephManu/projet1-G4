<?php 
  
  include('fonctions.php');
  include('controller-comment.php');

  if(isset($_GET['idRequest'])){
    $idRequest= htmlspecialchars($_GET['idRequest']);
}

 
       
?>  

<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title> WIKI G4 - Demande</title>
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="css/bootstrap.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />

  </head>
  <body>
      <!--  affiche la barre de navigation  -->
      <?= display_navbar_admin() ?>
      <!-- Responsive navbar-->
     
      <!-- Page content-->
      <div class="container mt-5">
          <div class="row">
              <div class="col-lg-10">
                  <!-- Post content-->
                  <article>
                      <a href="admin_request.php"><button class="btn btn-light btn-block back" >retour </button></a> 
                      
                      <!-- Post header-->
                      <header class="mb-4">
                          <!-- Post title-->
                          <h1 class="fw-bolder mb-1"><?= getRequest($idRequest)->title_request?></h1>
                          
                          <!-- Post meta content-->
                          <!--<div class="text-muted fst-italic mb($CheatsheetId)->name_category; ?></div>-->
                          <!-- Post categories-->
                          <a href="show_category.php?name_category=<?= getRequest($idRequest)->category_request; ?>"></a>
                          <span class="badge bg-secondary text-decoration-none link-ligh"><?= getRequest($idRequest)->category_request; ?></span>

                  
                      </header>
                      <!-- Post content-->
                      <section class="mb-5">
                          <p class="fs-5 mb-4"><?= nl2br(getRequest($idRequest)->content_request) ; ?></p>
                         
                          <a href="edit-cheatsheet.php?id=<?=$idRequest?>"><button class="btn btn-block btn-light">Traiter</button></a>

                          <a href="edit-cheatsheet.php?id=<?=$idRequest?>"><button class="btn btn-block btn-danger">Refuser</button></a>


                      
                      </section>
                  </article>
                
              </div>
              
          </div>
      </div>
     
      <!-- Bootstrap core JS-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Core theme JS-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
