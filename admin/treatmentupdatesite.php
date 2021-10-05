<?php 

session_start();

if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(!isset($_GET['id']))
{
    header('gsite.php');
}else{
    $id=htmlspecialchars($_GET['id']);
}

require "../connexion.php";
$req = $bdd->prepare("SELECT * FROM sites WHERE idsite=?");
$req->execute([$id]);
if(!$don=$req->fetch())
{
    $req->closecursor();
    header('LOCATION:gsite.php');
}$req->closecursor();

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
    if(empty($_FILES['image']['tmp_name']))
    {
        $update = $bdd->prepare("UPDATE sites SET nom=:nom, description=:descri, source=:lien, date=:date WHERE idsite=:myId");
        $update->execute([
            ":nom"=>$name,
            ":descri"=>$descri,
            ":lien"=>$lien,
            ":date"=>$date,
            ":myId"=>$id
        ]);
        $update->closecursor();
        header("LOCATION:gsite.php?update=success&id=".$id);
    }else{

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
            unlink("../images/site/".$don['image']);
            unlink("../images/site/mini_".$don['image']);
            $update = $bdd->prepare("UPDATE sites SET nom=:nom, description=:descri, source=:lien, date=:date , image=:img WHERE idsite=:myId");
        $update->execute([
            ":nom"=>$name,
            ":descri"=>$descri,
            ":lien"=>$lien,
            ":date"=>$date,
            ":img"=>$fichiercptl,
            ":myId"=>$id
        ]);
        $update->closecursor();

            if($extension==".png")
                    {
                        header("LOCATION:redimpng.php?site=ok&update=".$id."&image=".$fichiercptl);
                    }
                    else
                    {
                        header("LOCATION:redim.php?site=ok&update=".$id."&image=".$fichiercptl);
                    }
        }else{
            header("LOCATION:addsite.php?error=7&upload=echec");
        }

    }else{
        header("LOCATION:addsite.php?error=7&fich=".$erreur);
    }
    
    }
    
    
        }else{
        header("LOCATION:updatesite.php?id=".$id."&error=".$error);
        }
    
        }else{
        header("LOCATION:updatesite.php?id=".$id);
        }


?>