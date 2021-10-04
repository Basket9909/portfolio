<?php

if(!isset($_GET['id']))
{
    header('LOCATION:index.php');
}else{
    $id = htmlspecialchars($_GET['id']);
}
require '../connexion.php';

$req = $bdd->prepare("SELECT idphoto,source, date_format(date, '%d / %m / %Y') as myDate from photos where idphoto=?");
$req->execute([$id]);
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
    <title>photo numero <?= $don['idphoto']?></title>
</head>
<body>
    <h1 class="text-center">Detail de la photo numéro <?=$don['idphoto']?></h1>
    <div class="text-center">
    <a href="gphoto.php" class="btn btn-primary mx-3 my-3">Retour</a>
    <div class="container-fluid">
        <img class='grandephotoadm my-3 mx-3' src="../images/photo/<?=$don['source']?>" alt="photo1">
        <h3 class='my-3 mx-3'>Date de la photo : <?=$don['myDate']?></h3>
</div>
</div>



</body>
</html>