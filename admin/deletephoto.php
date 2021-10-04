<?php

session_start();

if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(!isset($_GET['id']))
{
    header('LOCATION:gphoto.php');
}else
{
    $id = htmlspecialchars($_GET['id']);
}

require '../connexion.php';

$req = $bdd->prepare("SELECT idphoto,source from photos where idphoto=?");
$req->execute([$id]);
if(!$don=$req->fetch())
{
    $req->closecursor();
    header("LOCATION:gphoto.php");
}$req->closecursor();

if(isset($_GET['delete']))
{
    if(!empty($don['source']))
    {
        unlink($don['source']);
    }
    $delete = $bdd->prepare('DELETE FROM photos where idphoto=?');
    $delete->execute([$id]);
    header('LOCATION:gphoto.php?id='.$id.'&delete=success');
}

?>