<?php

session_start();
if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(isset($_FILES['image'])){

    if(empty($_FILES['image'])){
        $error = 1;
    }
    else{
        $error = 0;
    }
}
if($error==0)
{
$dossier = "../images/photo/";
$fichier = basename($_FILES['image']['name']);
$taillemax = 2000000000000;
$taille = filesize($_FILES['image']['tmp_name']);
$extensions = ['.png','.jpg','.jpeg','.webp','.JPG'];
$extension = strrchr($_FILES['image']['name'],'.');

if(!in_array($extension,$extensions))
{
    $fileError = "Mauvaise extension";
}

if($taille > $taillemax)
{
    $fileError = "Fichier trop volumineux";
}

if(!isset($fileError))
{

    $fichier = strrchr($fichier,            
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

    $fichier = preg_replace('/([^.a-z0-9]+)/i','-',$fichier);

    $fichiercpt = rand().$fichier;

    if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier.$fichiercpt))
    {

        require "../connexion.php";
        $insert = $bdd->prepare("INSERT INTO photos(source,nom) values(:source,:nom)");
        $insert->execute([
            ":source"=> $dossier.$fichiercpt,
            ":nom"=> $fichiercpt
        ]);
        $insert->closecursor();
        header("LOCATION:gphoto.php?add=success");
    
        }else{
         header("LOCATION:addphoto.php?upload=error");
 }
}else{
header("LOCATION:addphoto.php?fileerror=".$fileError);
}
}



?>