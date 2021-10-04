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
        require "../connexion.php";
        $update = $bdd->prepare("UPDATE sites SET nom=:nom, description=:descri, source=:lien, date=:date WHERE idsite=:myId");
        $update->execute([
            ":nom"=>$nom,
            ":descri"=>$descri,
            ":lien"=>$lien,
            ":date"=>$date,
            ":myId"=>$id
        ]);
        $update->closecursor();
        header("LOCATION:gsite.php?update=success&id=".$id);
    }else{

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
                unlink("../images/".$don['image']);
                $update = $bdd->prepare("UPDATE sites SET nom=:nom, source=:lien, description=:descri, image=:img, date=:date WHERE idsite=:myId");
                $update->execute([
                ":nom"=>$nom,
                ":lien"=>$lien,
                ":descri"=>$descri,
                ":img"=>$fichier.$fichiercpt,
                ":date"=>$date,
                ":myId"=>$id
                ]);
                $update->closecursor();
                header("LOCATION:gsite.php?update=success&id=".$id);
    
                }else{
                 header("LOCATION:updatesite.php?id=".$id."upload=error");
         }
        }else{
        header("LOCATION:updatesite.php?id=".$id."&fileerror=".$fileError);
        }
    
    }
    
    
        }else{
        header("LOCATION:updatesite.php?id=".$id."&error=".$error);
        }
    
        }else{
        header("LOCATION:updatesite.php?id=".$id);
        }


?>