<?php 
session_start();

if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
}

if(isset($_GET['deco']))
{
    session_destroy();
    header("LOCATION:index.php"); 
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Administration</title>
</head>
<body>

    <h1 class="text-center">Bienvenue dans votre administration</h1>
    <a href="../index.php" target="_blank" class="btn btn-secondary position-absolute mt-5  start-50 translate-middle">Accéder au site</a>
    <a href="dashboard.php?deco=ok" id='deco' class="btn btn-secondary position-absolute start-50 translate-middle">Déconnexion</a>
    <a href="gphoto.php" id='gphoto' class="btn btn-secondary position-absolute start-50 translate-middle">Gestion des photos</a>
    <a href="gvideo.php" id='gvideo' class="btn btn-secondary position-absolute start-50 translate-middle">Gestion des videos</a>
    <a href="gsite.php" id='gsite' class="btn btn-secondary position-absolute start-50 translate-middle">Gestion des sites</a>
</body>
</html>