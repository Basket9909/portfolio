<?php

session_start();

if(isset($_SESSION['login'])){

    header("LOCATION:dashboard.php");
}

if(isset($_POST['login'])){

    if(!empty($_POST['login']) AND !empty($_POST['password'])){

        require '../connexion.php';
        $login = htmlspecialchars($_POST['login']);
        $pass = ($_POST['password']);

        $req =  $bdd->prepare("SELECT * FROM admin where pseudo = ?");
        $req->execute([$login]);
        if($don=$req->fetch()){
            if(password_verify($pass,($don['password']))){

                $_SESSION['login'] = $don['pseudo'];
                header("LOCATION:dashboard.php");
            }else{

                $error = 'Le mot de passe est incorrect';
            }
        }else{
            $error = 'Le login est incorrect';
        }
    }else{

        $error = 'Veuillez remplir correctement le formulaire';
    }
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Connexion administration</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-3" >
                <h1>Connexion Administration</h1>
                <form action="index.php" method="POST">
                    <?php
                    
                    if(isset($error))
                    {
                        echo "<div class='alert alert-danger'>".$error."</div>";
                    }
                    
                    ?>

                    <div class="mb-3">
                        <label for="login">Login : </label>
                        <input type="text" id="login" name="login" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pass">Mot de passe : </label>
                        <input type="password" id="pass" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" id="submit" name="submit" value="Connexion" class="btn btn-primary translate-center">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>