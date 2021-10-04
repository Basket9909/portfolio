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

$req = $bdd->prepare("SELECT * from sites where idsite=?");
$req->execute([$id]);
if(!$don=$req->fetch())
{
    $req->closecursor();
    header("LOCATION:gsite.php");
}$req->closecursor();

if(isset($_GET['delete']))
{
    if(!empty($don['image']))
    {
        unlink($don['image']);
    }
    $delete = $bdd->prepare('DELETE FROM sites where idsite=?');
    $delete->execute([$id]);
    header('LOCATION:gsite.php?id='.$id.'&delete=success');
}

?>