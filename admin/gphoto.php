<?php

session_start();

if(!isset($_SESSION['login'])){
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
    <title>Gestion des photos</title>
</head>
<body>

<div class="container-fluid">
    <div class="text-center my-3">
<h1 class="text-center my-3">Gestion des Photos</h1>
<a href="addphoto.php" class="btn btn-primary my-3 mx-3">Ajouter des photos</a>
<a href="../index.php" target="_blank" class="btn btn-secondary my-3 mx-3">Retour au site</a>
<a href="dashboard.php" class="btn btn-secondary mx-3 my-3">Retour</a>
<a href="dashboard.php?deco=ok" id="deco" class="btn btn-secondary my-3 mx-3">Deconnexion</a>
</div>

<?php
if(isset($_GET['add']))
{
    echo "<div class='alert alert-success'>La photo a été rajoutée</div>";

}
if(isset($_GET['update']))
{
    echo "<div class='alert alert-success'>La photo a été modifiée</div>";

}
if(isset($_GET['delete']))
{
    echo "<div class='alert alert-success'>La photo numero ".$_GET['id']." a été supprimée</div>";

}
?>

<div class="container-fluid">
<table class="col-10 mx-auto my-3">
    <thead>
        <tr>
            <th>Id_Photo</th>
            <th>Photo</th>
            <th>Date</th>
            <th>N° Couv</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
<tbody>
    <?php 
    
    $req = $bdd->query("SELECT idphoto,source,date_format(date,'%d / %m / %Y') as myDate,numCouv  from photos order by idphoto");
    $count = $req->rowcount();
    if($count>0){
        while($don = $req->fetch()){
            echo "<tr class='my-3'>";
            echo '<td>'.$don['idphoto'].'</td>';
            echo "<td><img class='photoadm' src='../images/photo/mini_".$don['source']."' alt='image de'".$don['source']."></td>";
            echo '<td>'.$don['myDate'].'</td>';
            echo '<td>'.$don['numCouv'].'</td>';
            echo "<td class='text-center'><a href='deletephoto.php?id=".$don['idphoto']."' class='btn btn-warning my-3 mx-3'>Delete</a>
            <a href='photounique.php?id=".$don['idphoto']."' class='btn btn-primary my-3 mx-3'>Detail</a>
            <a href='updatephoto.php?id=".$don['idphoto']."' class='btn btn-primary my-3 mx-3'>Modifier</a>
            </td> ";
           echo '</tr>';
        }
    }$req->closecursor();
    
    ?>
    </tbody>
    </table>
</div>


</div>


</body>
</html>