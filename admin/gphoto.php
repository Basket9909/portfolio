<?php

session_start();

if(!isset($_SESSION['login'])){
    header('LOCATION:index.php');
}

require '../connexion.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Gestion des photos</title>
</head>
<body>

<div class="container-fluid">
<h1 class="text-center">Gestion des Photos</h1>
<a href="addphoto.php" class="btn btn-primary my-3 mx-3">Ajouter des photos</a>
<a href="../index.php" target="_blank" class="btn btn-secondary my-3 mx-3">Retour au site</a>
<a href="dashboard.php" class="btn btn-secondary mx-3 my-3">Retour</a>
<a href="dashboard.php?deco=ok" id="deco" class="btn btn-secondary my-3 mx-3">Deconnexion</a>

<?php
if(isset($_GET['add']))
{
    echo "<div class='alert alert-success'>La photo a été rajoutée</div>";

}
if(isset($_GET['update']))
{
    echo "<div class='alert alert-success'>La photo a été modifiée</div>";

}
if(isset($_GET['delete']))
{
    echo "<div class='alert alert-success'>La photo a été supprimée</div>";

}
?>

<div class="containerPhoto">
    <?php 
    
    $req = $bdd->query('SELECT idphoto,nom,source from photos');
    $count = $req->rowcount();
    if($count>0){
        echo "<div class='containerPhoto'>";
        while($don = $req->fetch()){
            echo "<div class='containerseul'>";
            echo "<a href='photounique.php?id=".$don['idphoto']."'><div><img class='photoadm' src='".$don['source']."' alt='image de'".$don['nom']."></div></a> ";

            echo "<a href='deletephoto.php?id=".$don['idphoto']."&delete=ok' class='btn btn-warning my-3'>Delete</a>";
        }
        echo "</div>";
        echo "</div>";
    }$req->closecursor();
    
    ?>
</div>


</div>


</body>
</html>