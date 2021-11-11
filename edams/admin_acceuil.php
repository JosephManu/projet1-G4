<?php
session_start();
include ('fonctions.php');
include('controller_admin_account.php');

//unableAcces();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des comptes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css\bootstrap.css">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Css JQuery -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

    <link rel="stylesheet" type="text/css" href="gestion-compte.css">

</head>
<body>

<?=display_navbar_admin()?>

<div class="container">
    <div>
        <h3>Bienvenu <?= $_SESSION['pseudo'] ?></h3>
    </div>
    

    <table class= "table table-dark table-striped" id="user">
        <thead>
        <th scope="col">#</th>
        <th scope="col">Pseudo</th >
        <th scope="col">Email</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </thead>
        <tbody>

        <?php if(!empty($listUsers)) { ?>
        <?php foreach($listUsers as $user) { ?>
        <tr>
            <td></td>
            <td><?php echo $user['user_pseudo']; ?></td>
            <td><?php echo $user['user_mail']; ?></td>
            <td><a href="edite.php?id=<?php echo $user['id_user']; ?>"><i class="fa fa-pencil"></i></a></td>
            <td><a href="delete.php?id=<?php echo $user['id_user']; ?>"><i class="fa fa-close"></i></a></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#user').DataTable();
            });
        </script>
    </table>

</div>
</body>
</html>