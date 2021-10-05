<?php

session_start();

if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(!isset($_GET['id']))
{
    header('LOCATION:gsite.php');
}else
{
    $id = htmlspecialchars($_GET['id']);
}
    require '../connexion.php';
    
    $req = $bdd->prepare("SELECT idsite,image,nom,source,description,date_format(date, '%d / %m / %Y') as myDate from sites where idsite=?");
    $req->execute([$id]);
    if(!$don=$req->fetch())
    {
        $req->closecursor();
        header("LOCATION:gsite.php");
    }$req->closecursor();
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Info sur le site : <?= $don['nom']?></title>
</head>
<body>
    <h1 class="text-center">Info sur le site : <?= $don['nom']?></h1>
    <div class="text-center">
    <a href="gsite.php" class="btn btn-primary mx-3 my-3">Retour</a>
    <div class="container-fluid">
        <img class='grandephotoadm my-3 mx-3' src="../images/site/<?=$don['image']?>" alt="<?= $don['nom']?>">
        <h3 class='my-3 mx-3'>Date du site : <?=$don['myDate']?></h3>
        <h3 class='my-3 mx-3'>Source : <?=$don['source']?></h3>
        <h4 class='my-3 mx-3'>Description : <?=nl2br($don['description'])?></h4>
</div>
</div>