<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sites</title>
</head>
<body>
    <div class="allSite">
        <h1 class="titreAllSite">Sites réalisés</h1>
        <div class="containerAllSite">
        <?php
        require 'connexion.php';
         $req = $bdd->query("SELECT nom,image,source,description,DATE_FORMAT(date,'%d / %m / %y') as myDate from sites order by idsite");
         while($don = $req->fetch()){
            echo '<div class="assemblage">
            <a href="'.$don['source'].'" target="_BLANK"><div class="test_site"><img src="images/site/'.$don['image'].'" alt="'.$don['nom'].'" class="cover"></div></a>
             <a href="'.$don['source'].'" target="_BLANK"> <h5 class="site_pour"> '.$don['nom'].'</h5></a>
             <h4 class="moreInfo">'.$don['description'].'</h4>
             <h3 class="date">Le '.$don['myDate'].'</h3>
             <div class="descri"></div></div>';
         }
        ?>
        </div>
    </div>
</body>
</html>