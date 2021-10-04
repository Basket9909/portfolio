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
    <title>ajouter une video</title>
</head>
<body>
<div class="container-fluid">
<div class="col-6 offset-3">
    <h1 class="text-center">Ajouter une video</h1>
    <form action="treatmentaddvideo" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <!--<input type="hidden" name="MAX_FILE_SIZE" value="2000000">-->
        <div class="mb-3">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
        <div class="mb-3">
        <label for="Date">Date : </label>
        <input type="Date" name="Date" id="Date" class="form-control">
    </div>
        <div class="mb-3">
        <label for="descri">Description : </label>
        <input type="text" name="descri" id="descri" class="form-control">
    </div>
        <input type="file" name="video" id="formFile" class="form-control">
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" id="submit" value="Ajouter" class="form-control btn btn-success">
    </div>
    </form>
</div>
</div>
</body>
</html>