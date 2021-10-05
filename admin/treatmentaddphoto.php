<?php

session_start();
if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(isset($_FILES['image'])){

    $error = 0;

    if(empty($_FILES['image'])){
        $error = 1;
    }
    else{
        $error = 0;
    }

    if(empty($_POST['date']))
    {
        $error = 2;
    }else{
        $date = $_POST['date'];
    }

    if($_POST['album'] > 6 OR $_POST['album'] < 0 )
    {
        $error = 3;
    }else{
        $album = htmlspecialchars($_POST['album']);
    }

if($error==0)
{
    $dossier = '../images/photo/';
    $fichier = basename($_FILES['image']['name']);
    $taille_maxi = 2000000;
    $taille = filesize($_FILES['image']['tmp_name']);
    $extensions = array('.png','.jpg','.jpeg, jpe');
    $extension = strrchr($_FILES['image']['name'], '.');

    if(!in_array($extension , $extensions))
    {
        $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg'; 
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier dépasse la taille autorisée';
    }

    if(!isset($erreur))
    {
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        $fichiercptl=rand().$fichier;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichiercptl))
        {
            require '../connexion.php';
            $insert = $bdd->prepare("INSERT INTO photos(source,date,numCouv) values(:source,:date,:album)");
            $insert->execute([
                ":source"=>$fichiercptl,
                ":date"=>$date,
                ":album"=>$album
            ]);
            $insert->closeCursor();

            if($extension==".png")
                    {
                        header("LOCATION:redimpng.php?image=".$fichiercptl);
                    }
                    else
                    {
                        header("LOCATION:redim.php?image=".$fichiercptl);
                    }
        }else{
            header("LOCATION:addphoto.php?error=7&upload=echec");
        }

    }else{
        header("LOCATION:addphoto.php?error=7&fich=".$erreur);
    }
}else{
    header("LOCATION:addphoto.php?error=".$err);
}
}else{
    header("LOCATION:addphoto.php");
}



?>