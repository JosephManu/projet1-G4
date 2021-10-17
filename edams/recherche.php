<?php
  include('controller-recherche.php');
  include('fonctions.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Recherche</title>
</head>
<body>
<?=display_navbar()?>

    <div class='container'>
        <div class="form col-md">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="search" placeholder="Votre recherche" name="query" maxlength="80" size="80" id="query">
                <input type="submit" value="Recherche"> 
            </form>
        </div>
        <hr>

        <p>
            <?php echo $res;  ?>
        </p>
        
            <?=  "<p>".$tableHead."</p>" ?>
        
                    <?php
                         if(is_null($data)){
                            $data=[];
                        }

                    try{
                        foreach($data as $q){
                            echo
                            "
                            <tr>
                                <th scope='row'>".$q->id_cheatsheet."</th>
                                <td>". $q->title_cheatsheet."</td>    
                                <td>".$q->name_category."</td>
                                <td><a href='fiche.php?id=$q->id_cheatsheet'><img src='images\white-eyes-removebg-preview-ConvertImage.png' title='consulter la fiche' width=40px alt= yeux </img></a> </td>
    
                            </tr>"; 
                        }
                    }catch(Exeption $e){
                        
                    }
                    
                   
                      ?>
                    
                   
                </tbody>
        </table>
                </div>

       
    </div>

    

	
</body>

</html>

