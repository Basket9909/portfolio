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
$req = $bdd->prepare("SELECT idsite,nom,image,source,date,description FROM sites where idsite=?");
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
    <title>update : <?=$don['nom']?></title>
</head>
<body>
<div class="container-fluid">
    <a href="gsite.php" class="btn btn-secondary mx-3 my-3">Retour</a>
        <div class="row">
        <div class="col-6 offset-3">
    <h1 class="text-center">update pour le site :  <?=$don['nom']?></h1>
    <form action="treatmentupdatesite.php?id=<?= $don['idsite'] ?>" method="POST" enctype="multipart/form-data">


    <div class="mb-3">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name" value="<?=$don['nom']?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="lien">source : </label>
        <input type="text" name="lien" id="lien" class="form-control" value="<?=$don['source']?>">
    </div>
    <div class="mb-3">
        <label for="descri">description : </label>
        <textarea name="descri" id="descri" class="form-control"><?=$don['description']?></textarea>
    </div>
    <div class="mb-3">
        <label for="date">Date : </label>
        <input type="date" name="date" id="date" class="form-control" value="<?=$don['date']?>">
    </div>
    <div class="mb-3">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000000">
        <label for="formFile" class="form-label">Image : </label>
        <?php
                        if(!empty($don['image']))
                        {
                            echo ' <div class="col-2 mb-3"><img class="img-fluid" src="../images/site/mini_'.$don['image'].'" alt=""></div>';
                        }else{
                            echo "<div><strong>Aucune image</strong></div>";
                        }
                    ?>
        <input type="file" name="image" id="formFile" class="form-control">
    <div class="mb-3">
        <input type="submit" name="submit" id="submit" value="Modifier" class="form-control btn btn-success my-3">
    </div>
    
</form>
</div>
</div>
</div>
</body>
</html>