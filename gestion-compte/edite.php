
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des comptes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<?php

require_once('config.php');

$id_user = $_GET['id']; // get id through query string

$sql = "select * from user where id_user = '$id_user'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}


$email = $user['user_mail'];
$pseudo=$user['user_pseudo'];


?>


<form action="modifier.php" method="post">
<input type="email" name="email" value = "<?php echo (isset($email))?$email:'';?>" class="form-control" placeholder="email">
<input type="text" name="pseudo" value="<?php echo(isset($pseudo))?$pseudo:'';?>" class="form-control" placeholder="pseudo">
<input type="hidden" name="id_user" value="<?php echo(isset($id_user))?$id_user:'';?>" class="form-control" >

<input type="submit" value="modifier">
</form>

</body>
</html>