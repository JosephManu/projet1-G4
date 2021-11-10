<?php 
session_start();
include ('fonctions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
<?=display_navbar()?>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span> Bienvenu <?=$_SESSION['pseudo']; ?></h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Redéfinissez votre mot de passe 
        </div>
        <h3>Personal info</h3>
        <div class="form-group">
            <label class="col-lg-3 control-label">Rôle: utilisateur  </label>
          </div>
        
        <form class="form-horizontal" role="form">
          
          <div class="form-group">
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Mot de passe actuel:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" >
            </div>
            <div class="form-group">
            <label class="col-lg-3 control-label">Nouveau mot de passe :</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" >
            </div>
            <div class="col-lg-8">
              <button type="sublit"> Confirmer </button>
            </div>
          </div>
        
          
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
    
</body>
</html>