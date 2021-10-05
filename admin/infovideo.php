<?php

session_start();
if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}
if(!isset($_GET['id']))
{
    header('LOCATION:gvideo.php');
}else
{
    $id = htmlspecialchars($_GET['id']);
}
require '../connexion.php';
$req = $bdd->prepare("SELECT idvideo,nom,source,description,date_format(date,'%d/ %m/ %y') as myDate FROM videos where idvideo=?");
$req -> execute([$id]);
if(!$don = $req->fetch())
{
    $req->closecursor();
    header('LOCATION:index.php');
}
$req->closecursor();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Info sur la video : <?= $don['nom']?></title>
</head>
<body>
    <h1 class="text-center">Info sur la video : <?= $don['nom']?></h1>
    <div class="text-center">
    <a href="gvideo.php" class="btn btn-primary mx-3 my-3">Retour</a>
    <div class="container-fluid">
        <iframe src="<?=$don['source']?>" frameborder="0"></iframe>
        <h3 class='my-3 mx-3'>Date de la video : <?=$don['myDate']?></h3>
        <h4 class='my-3 mx-3'>Description : <?=nl2br($don['description'])?></h4>
</div>
</div>