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
    
    $dossier = '../images/site/';
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
            $insert = $bdd->prepare("INSERT INTO sites(nom,image,source,date,description) values(:nom,:im,:source,:date,:descri)");
            $insert->execute([
                ":nom"=>$name,
                ":im"=>$fichiercptl,
                ":source"=>$lien,
                ":date"=>$date,
                ":descri"=>$descri
            ]);
            $insert->closeCursor();

            if($extension==".png")
                    {
                        header("LOCATION:redimpng.php?site=ok&image=".$fichiercptl);
                    }
                    else
                    {
                        header("LOCATION:redim.php?site=ok&image=".$fichiercptl);
                    }
        }else{
            header("LOCATION:addsite.php?error=7&upload=echec");
        }

    }else{
        header("LOCATION:addsite.php?error=7&fich=".$erreur);
    }
    }else{
    header("LOCATION:addsite.php?error=".$error);
    }

    }else{
    header("LOCATION:addsite.php");
    }

?>