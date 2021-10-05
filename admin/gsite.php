<?php

session_start();

if(!isset($_SESSION['login']))
{
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
    <title>Gestion des sites</title>
</head>
<body>

<div class="container-fluid">
<h1 class="text-center">Gestion des sites</h1>
<a href="addsite.php" class="btn btn-primary my-3 mx-3">Ajouter des sites</a>
<a href="../index.php" target="_blank" class="btn btn-secondary my-3 mx-3">Retour au site</a>
<a href="dashboard.php" class="btn btn-secondary mx-3 my-3">Retour</a>
<a href="dashboard.php?deco=ok" id="deco" class="btn btn-secondary my-3 mx-3">Deconnexion</a>
<?php
if(isset($_GET['add']))
{
    echo "<div class='alert alert-success'>Le site a été rajouté</div>";

}
if(isset($_GET['update']))
{
    echo "<div class='alert alert-success'>Le site numero ".$_GET['id']." a été modifié</div>";

}
if(isset($_GET['delete']))
{
    echo "<div class='alert alert-success'>Le site numero ".$_GET['id']." a été supprimé</div>";

}
?>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>site</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                $dons = $bdd->query("SELECT idsite , nom , date_format(date,'%d/ %m/ %y') as myDate FROM sites order by idsite");
                while($don = $dons->fetch())
                {
                    echo "<tr>";
                    echo "<td>".$don['idsite']."</td>";
                    echo "<td>".$don['nom']."</td>";
                    echo "<td>".$don['myDate']."</td>";
                    echo "<td class='d-flex justify-content-evenly'> <a href='infosite.php?id=".$don['idsite']."' class='btn btn-primary '>+ Infos</a>";
                    echo "<a href='updatesite.php?id=".$don['idsite']."' class='btn btn-warning'>Modifier</a>";
                    echo "<a href='deletesite.php?id=".$don['idsite']."' class='btn btn-danger '>Supprimer</a>";
                    echo "</td>";
                    echo "</tr>";

                }
                
                ?>
               
            </tbody>
        </table>