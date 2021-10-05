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
$req = $bdd->prepare("SELECT idphoto, date,numCouv,source FROM photos where idphoto=?");
$req->execute([$id]);
if(!$don=$req->fetch())
{
    $req->closecursor();
    header("LOCATION:gphoto.php");
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
    <title>Update photo N° <?=$don['idphoto']?></title>
</head>
<body>
<div class="container-fluid">
    <a href="gphoto.php" class="btn btn-secondary mx-3 my-3">Retour</a>
        <div class="row">
        <div class="col-6 offset-3">
    <h1 class="text-center">Update photo N° <?=$don['idphoto']?></h1>
    <form action="treatmentupdatephoto.php?id=<?= $don['idphoto'] ?>" method="POST">

    <div ><img class="img-fluid" src="../images/photo/<?=$don['source']?>" alt=""></div>
    <div class="mb-3">
        <label for="date">Date : </label>
        <input type="date" name="date" id="date" class="form-control" value="<?=$don['date']?>">
    </div>
    <div class="mb-3">
        <label for="album">Numero pour photo de couverture</label>
        <select class="form-control" name="album" id="album">
            <option value="0" selected ></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" id="submit" value="Modifier" class="form-control btn btn-success my-3">
    </div>
    
</form>
</div>
</div>
</div>
</body>
</html>