<?php

session_start();
if(!isset($_SESSION['login']))
{
    header('LOCATION:index.php');
}

if(!isset($_GET['id']))
{
    header("LOCATION:gphoto.php");
}else{
    $id = htmlspecialchars($_GET['id']);
}

if(isset($_POST['date'])){
$error=0;
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

            require '../connexion.php';
            $update = $bdd->prepare("UPDATE photos SET date=:date, numCouv=:album where idphoto=:id");
            $update->execute([
                ":date"=>$date,
                ":album"=>$album,
                ":id"=>$id
            ]);
            $update->closeCursor();
            header("LOCATION:gphoto.php?update=sucess&id=".$id);
}else{
    header("LOCATION:addphoto.php?error=".$err);
}
}else{
    header("LOCATION:addphoto.php");
}



?>