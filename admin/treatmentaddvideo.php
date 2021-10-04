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

    if(empty($_POST['Date']))
    {
        $error = 2;
    }else{
        $date=htmlspecialchars($_POST['Date']);
    }

    if(empty($_POST['descri']))
    {
        $error = 3;
    }else{
        $descri=htmlspecialchars($_POST['descri']);
    }
if($error==0)
{
    
    $dossier = "../videos/";
    $fichier = basename($_FILES['video']['name']);
    $taillemax = 2000000;
    $taille = filesize($_FILES['video']['tmp_name']);
    $extensions = ['.mp4','.mov'];
    $extension = strrchr($_FILES['video']['name'],'.');

    if(!in_array($extension,$extensions))
    {
        $fileError = "Mauvaise extension";
    }

   // if($taille > $taillemax)
   // {
     //   $fileError = "Fichier trop volumineux";
    //}

    if(!isset($fileError))
    {

        $fichier = strrchr($fichier,            
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

        $fichier = preg_replace('/([^.a-z0-9]+)/i','-',$fichier);

        $fichiercpt = rand().$fichier;

        if(move_uploaded_file($_FILES['video']['tmp_name'],$dossier.$fichiercpt))
        {

            require "../connexion.php";
            $insert = $bdd->prepare("INSERT INTO videos(nom,source,description,date,) values(:nom,:source,:description,:date)");
            $insert->execute([
                ":nom"=> $name,
                ":description"=> $descri,
                ":date"=> $date,
                ":source"=> $fichiercpt
            ]);
            $insert->closecursor();
            header("LOCATION:gvideo.php?add=success");

            }else{
             header("LOCATION:addvideo.php?upload=error");
     }
    }else{
    header("LOCATION:addvideo.php?fileerror=".$fileError);
    }




    }

    }else{
    header("LOCATION:addvideo.php?ici");
    }

?>