 <?php 
  
    include('fonctions.php');
    include('controller-comment.php');

   $remarks = getRemark($CheatsheetId);
         
?>  

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />

    </head>
    <body>
        <!--  affiche la barre de navigation  -->
        <?= display_navbar() ?>
        <!-- Responsive navbar-->
       
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-10">
                    <!-- Post content-->
                    <article>
                        <a href="recherche.php"><button class="btn btn-light btn-block back" >retour </button></a> 
                        <button>**</button>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= display_searched_cheatsheet($CheatsheetId)->title_cheatsheet?></h1>
                            <!-- Post meta content-->
                            <!--<div class="text-muted fst-italic mb-2"><?= display_searched_cheatsheet($CheatsheetId)->name_category; ?></div>-->
                            <!-- Post categories-->
                            <!--<span class="badge bg-secondary text-decoration-none link-light" ><?= display_searched_cheatsheet($CheatsheetId)->name_category; ?></span> -->
                    
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?= nl2br( display_searched_cheatsheet($CheatsheetId)->content_cheatsheet ); ?>
                        
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">

                                <!-- Comment form-->
                                <form class="mb-4" method="POST" action="fiche.php?id=<?=$CheatsheetId ?>">
                                    <textarea name="comment" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                    <button type="submit" style=margin-top:20px; class="btn btn-success">Envoyer</button>
                                </form>

                                <!-- Single comment-->
                                <?php foreach ($remarks as $remark): ?>
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold"><?= 'Utilisateur '.$remark->id_user;?></div>
                                        
                                       <?= $remark->content_remark?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                </div>
                
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
