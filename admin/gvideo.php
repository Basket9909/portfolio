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
    <title>Gestion des videos</title>
</head>
<body>

<div class="container-fluid">
<h1 class="text-center">Gestion des videos</h1>
<a href="addvideo.php" class="btn btn-primary my-3 mx-3">Ajouter des videos</a>
<a href="../index.php" target="_blank" class="btn btn-secondary my-3 mx-3">Retour au site</a>
<a href="dashboard.php" class="btn btn-secondary mx-3 my-3">Retour</a>
<a href="dashboard.php?deco=ok" id="deco" class="btn btn-secondary my-3 mx-3">Deconnexion</a>

<?php
if(isset($_GET['add']))
{
    echo "<div class='alert alert-success'>La vidéo a été rajoutée</div>";

}
if(isset($_GET['update']))
{
    echo "<div class='alert alert-success'>La vidéo a été modifiée</div>";

}
if(isset($_GET['delete']))
{
    echo "<div class='alert alert-success'>La video a été supprimée </div>";

}
?>
    
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Video</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                $dons = $bdd->query("SELECT idvideo , nom , source , description, date_format(date,'%d/ %m/ %y') as myDate FROM videos order by idvideo");
                while($don = $dons->fetch())
                {
                    echo "<tr>";
                    echo "<td>".$don['idvideo']."</td>";
                    echo "<td>".$don['nom']."</td>";
                    echo "<td>".$don['myDate']."</td>";
                    echo "<td class='d-flex justify-content-evenly'> <a href='infovideo.php?id=".$don['idvideo']."' class='btn btn-primary mx-2'>+ Infos</a>";
                    echo " <a href='updatevideo.php?id=".$don['idvideo']."' class='btn btn-warning mx-2'>Modifier</a>";
                    echo " <a href='deletevideo.php?id=".$don['idvideo']."' class='btn btn-danger mx-2'>Supprimer</a>";
                    echo "</td>";
                    echo "</tr>";

                }
                
                ?>
               
            </tbody>
        </table>