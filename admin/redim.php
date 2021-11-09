<?php

session_start();

if(!isset($_SESSION['login']))
{
    header("LOCATION:index.php");
}
	
if(isset($_GET['site']))
{
    $source = imagecreatefromjpeg("../images/site/".$_GET['image']);
}else{

    $source = imagecreatefromjpeg("../images/photo/".$_GET['image']); // La photo est la source
}




// getimagesize retourne un array contenant la largeur [0] et la hauteur [1]

if(isset($_GET['site']))
{
    $TailleImageChoisie = getimagesize("../images/site/".$_GET['image']);

}else{

    $TailleImageChoisie = getimagesize("../images/photo/".$_GET['image']);
}

// je définis la largeur de l'image.

$NouvelleLargeur = 500;

 

//  je calcule le pourcentage de réduction qui correspond au quotient de l'ancienne largeur par la nouvelle.

$Reduction = ( ($NouvelleLargeur * 100)/$TailleImageChoisie[0] );

 

//  je détermine la hauteur de la nouvelle image en appliquant le pourcentage de réduction à l'ancienne hauteur.

$NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction)/100 );


$destination =  imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur"); // On crée la miniature vide



// On crée la miniature

imagecopyresampled($destination, $source, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);


// On enregistre la miniature sous le nom "mini_"

if(isset($_GET['site']))
{
    $rep_nom="../images/site/mini_".$_GET['image'];

}else{

    $rep_nom="../images/photo/mini_".$_GET['image'];
}


imagejpeg($destination,$rep_nom,80);

// redirection


if(isset($_GET['site']))
{
    if(isset($_GET['update']))
    {
    header("LOCATION:gsite.php?update=success&id=".$_GET['update']);
    }else{

    header("LOCATION:gsite.php?add=success");
}

}else{

    if(isset($_GET['update']))
    {
    header("LOCATION:gphoto.php?update=success&id=".$_GET['update']);
    }else{

    header("LOCATION:gphoto.php?add=success");
}
}



?>