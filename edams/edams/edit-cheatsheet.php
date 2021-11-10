<?php
include('fonctions.php');
include('controller-comment.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <title>modifier une Fiche</title>
</head>
<body>
<?= display_navbar() ?>
<div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Post content-->
                    <article>
                        <a href="fiche.php?id=<?=$CheatsheetId ?>"><button class="btn btn-light btn-block back" >retour </button></a> 
                        
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= display_searched_cheatsheet($CheatsheetId)->title_cheatsheet?></h1>
                            <!-- Post meta content-->
                            <!-- Post categories-->
                            <!--<span class="badge bg-secondary text-decoration-none link-light" ><?= display_searched_cheatsheet($CheatsheetId)->name_category; ?></span> -->
                    
                        </header>
                        <!-- Post content-->
                        <section class="col-lg-12">
                            <div class="form-group">
                                <form action="controller-edit.php?id=<?= $CheatsheetId ?>" method="POST">
                                    <textarea class="form-control" rows="12" name="edit"  ><?=  display_searched_cheatsheet($CheatsheetId)->content_cheatsheet?></textarea>
                                    <input type="submit"  value="Valider"> 
                                </form>
                            </div>
                            
                           
                            

                        
                        </section>
                    </article>
                   
                </div>
                
            </div>
        </div>
</body>
</html>