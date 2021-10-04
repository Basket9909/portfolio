<?php 

session_start();
if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
}

if(isset($_POST['name']))
{
    $error = 0;

    if(empty($_POST['name']))
    {
        $error = 1;
    }else{
        $name=htmlspecialchars($_POST['name']);
    }

    if(empty($_POST['lien']))
    {
        $error = 2;
    }else{
        $lien=htmlspecialchars($_POST['lien']);
    }

    if(empty($_POST['descri']))
    {
        $error = 4;
    }else{
        $descri=htmlspecialchars($_POST['descri']);
    }

    if(empty($_POST['date']))
    {
        $error = 5;
    }else{
        $date=htmlspecialchars($_POST['date']);
    }

if($error==0)
{
    
    $dossier = "../images/site/";
    $fichier = basename($_FILES['image']['name']);
    $taillemax = 20000000000;
    $taille = filesize($_FILES['image']['tmp_name']);
    $extensions = ['.png','.jpg','.jpeg','.webp'];
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
            $insert = $bdd->prepare("INSERT INTO sites(nom,source,image,date,description) values(:nom,:source,:image,:date,:descri)");
            $insert->execute([
                ":nom"=> $name,
                ":source"=> $lien,
                ":image"=> $dossier.$fichiercpt,
                ":date"=> $date,
                ":descri"=> $descri
            ]);
            $insert->closecursor();
            header("LOCATION:gsite.php?add=success");

            }else{
             header("LOCATION:addsite.php?upload=error");
     }
    }else{
    header("LOCATION:addsite.php?fileerror=".$fileError);
    }




    }else{
    header("LOCATION:addsite.php?error=".$error);
    }

    }else{
    header("LOCATION:addsite.php");
    }

?>