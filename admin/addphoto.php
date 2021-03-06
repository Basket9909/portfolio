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
    <title>ajouter une photo</title>
</head>
<body>
<div class="container-fluid col-6 offset-3">
    <h1 class="text-center">Ajouter une photo</h1>
    <form action="treatmentaddphoto" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000000000">
        <label for="formFile" class="form-label">Image : </label>
        <input type="file" name="image" id="formFile" class="form-control">
    </div>

    <div class="mb-3">
        <label for="date">Date de la photo</label>
        <input type="date" id="date" name="date" class="form-control">
    </div>
    <div class="mb-3">
        <label for="album">Numero pour photo de couverture</label>
        <select name="album" id="album" class="form-control">
            <option selected value="0"></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" id="submit" value="Ajouter" class="form-control btn btn-success">
    </div>
    </form>
</div>
</body>
</html>