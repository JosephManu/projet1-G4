<?php

include ('fonctions.php');
include ('controller-category.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <title>Acceuil </title>
</head>
<body>
    <?=display_navbar()?>

	<div class="container">

		
	<div class=" text-center mt-5 ">
        <h1>Demande de fiche</h1>
    </div>
    <div class="row ">
	<a href="recherche.php"><button class="btn btn-light btn-block back" >retour </button></a>
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
				
                <div class="card-body bg-light">
					
                    <div class="container">


                        <form id="contact-form" method="POST" action="controller-category.php">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Titre</label> <input id="form_name" type="text" name="title_request" class="form-control" placeholder="" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
									<div class="form-group"> <label for="form_need">Catégorie</label>
									 <select id="form_need" name="cat_request" class="form-control" required="required" data-error="Please specify your need.">
								
									 <?php
											
											while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;
										?>
											<option value="<?php echo $category["id_category"];?>">
												<?php echo $category["name_category"];
													// montrer le nom de la categorie
												?>
											</option>
										<?php
											endwhile;
											// loop de while s'arrete ici
										?>
                                            </select>
										
									</div>
									<div class="form-group"> <label for="form_lastname"></label> <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Si autre catégorie ..."  data-error="Lastname is required."> </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                           
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message"></label> <textarea id="form_message" name="content_request" class="form-control" placeholder="Entrer le contenu initial de votre fiche." rows="4" required="required" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Envoyer"> </div>
                                </div>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
    
</body>

</html>