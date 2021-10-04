<?php 

session_start();
if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
}
require "../connexion.php"



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Ajouter un site</title>
</head>
<body>
    <div class="container-fluid">
    <a href="gsite.php" class="btn btn-secondary mx-3 my-3">Retour</a>
        <div class="row">
        <div class="col-6 offset-3">
    <h1 class="text-center">Ajouter un site</h1>
    <form action="treatmentaddsite.php" method="POST" enctype="multipart/form-data">

    <?php 
    
    if(isset($_GET['error']))
    {
        echo "<div class='alert alert-danger'>Code erreur".$_GET['error']."</div> ";
    }
    ?>
    
    <div class="mb-3">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="lien">source : </label>
        <input type="text" name="lien" id="lien" class="form-control">
    </div>
    <div class="mb-3">
        <label for="descri">description : </label>
        <textarea name="descri" id="descri" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="date">Date : </label>
        <input type="date" name="date" id="date" class="form-control">
    </div>
    <div class="mb-3">
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000000">
        <label for="formFile" class="form-label">Image : </label>
        <input type="file" name="image" id="formFile" class="form-control">
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" id="submit" value="Ajouter" class="form-control btn btn-success">
    </div>
    
</form>
</div>
</div>
</div>
</body>
</html>