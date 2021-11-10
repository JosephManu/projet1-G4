<?php
 include('connexionBDD.php');
 include('process.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<!--regler le probleme l'accents sur le navigateur-->

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	 <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/connexion.css">
	<title>Connexion-EDAMS</title>

	<!-- Bootstrap JS -->
     <script src="js/bootstrap.min.js"></script>
</head>
<body>
		
	<div class="container-body">
		<div class="card" >
			<div class="linear-gradient"></div>
			<div class="card-header">
				<h3>Connexion utilisateur</h3>

			</div>
			<div class="card-body">
				
				<form action="process.php" method ="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name='user' class="form-control" placeholder="pseudo">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name='pass' class="form-control" placeholder="mot passe">
					</div>
					<div class="password-signup">
					<div class="forgot password">
						<samp><a href="connexion-admin.php">Admnistrateur ? </samp>
					</div>
					<div class="signup">
						<a href="inscription.php">s inscrire</a>
					</div>
					</div>
					<div class="form-group">
						<input type="submit" value="valider" class="btn float-right login_btn">
					</div>
				</form>
			
			</div>
		
		</div>
	</div>

</div>
</body>
</html>