<?php 

require 'connexion.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Portfolio Wilmart Romeo</title>
</head>
<body>
<div id="openLogo">
    <img id="openLogoImage" src="images/logo.svg" alt="logo_Menu1">
</div>
<div id="home">
    <nav>
    <div id="logoMenu">
        <img id="logoImage" src="images/logo.svg" alt="logo_Menu">
    </div>
    <ul>
    <li><a href="#home">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#competence">Compétences</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#contact">Contact</a></li>
    </ul>
    </nav>
    <div id="burger">
            <div class="bar ligneH"></div>
            <div class="bar ligneM"></div>
            <div class="bar ligneB"></div>
        </div>
    <img data-movey="100" data-movex="70" data-rotate="-20" class="fist_icons pict" id="photo"src="images/intro_icons/camera-solid.svg" alt="first_icons">
    <img data-movey="150" data-movex="-50" data-rotate="5" class="fist_icons pict" id="code" src="images/intro_icons/code-solid.svg" alt="first_icons">
    <img data-movey="-250" data-movex="70" data-rotate="-10"  class="fist_icons pict" id="css" src="images/intro_icons/css3-alt-brands.svg" alt="first_icons">
    <img data-movey="-120" data-movex="120" data-rotate="20"  class="fist_icons pict" id="film" src="images/intro_icons/film.svg" alt="first_icons">
    <img data-movey="-100" data-movex="-50" data-rotate="-12"  class="fist_icons pict" id="html" src="images/intro_icons/html5-brands.svg" alt="first_icons">
    <img data-movey="140" data-movex="-145"  data-rotate="15" class="fist_icons pict" id="picto" src="images/intro_icons/image-regular.svg" alt="first_icons">
    <img data-movey="110" data-movex="-100" data-rotate="-10"  class="fist_icons pict" id="js" src="images/intro_icons/js-square-brands.svg" alt="first_icons">
    <img data-movey="115" data-movex="-175" data-rotate="15"  class="fist_icons pict" id="camera" src="images/intro_icons/video-solid.svg" alt="first_icons">
    <div id="slide1Centre">
    <h1>Portfolio</h1>
    <h1 id="slide1Nom"><b>Wilmart Romeo</b></h1>
</div>
</div>
<div id="about">
    <h2 class="sous_titre" data-aos="fade-up">About</h2>
    <div class="peutetre">
    <h3 class="balise_ouvre"><</h3> <h3 class="balise_ouvre">!-- Bonjour,</h3></div>
    <h4 class="texte_about">Je m’appelle Wilmart Romeo et je suis développeur web. <br><br>
J’ai fait deux ans en vidéo à l’epse d’ enghien en Belgique. <br><br>
J’ai ensuite étudier deux ans dans cette même école le web développement. En fin de deuxiéme année, j’ai réaliser un stage de *** de semaines dans l’entreprise ****</h4>
<div class="peutetre2">
    <h3 class="balise_ferme">--</h3> <h3 class="balise_ferme">></h3></div>
</div>
<div id="competence" data-aos="fade-up">
<h2 class="sous_titre beige_clair">Compétences</h2>
<div class="wrapper">
<div class="container_slide_3">
    <div class="ligne_slide_3" data-aos="fade-right">
        <div class="petit_rec">
        <h3 class="texte_slide_3 beige">
            W <br>
            E <br>
            B
        </h3>
        <h3 class="texte_slide_3 blanc">
            F <br>
            R <br>
            O <br>
            N <br>
            T
        </h3>
        <h3 class="texte_slide_3 blanc">
            E <br>
            N <br>
            D
        </h3>
    </div>
    <h3 class="texte_slide_3 beige text_alt">WEB</h3>
    <h3 class="texte_slide_3 blanc text_alt">FRONT - END</h3>
        <div class="grand_rec">
            <div id="texte_picto1">
        <h3 class="descri blanc">Maitrise de html / css / javascript <br class="marge">
        Maitrise de logiciel de design : Photoshop / figma /  illustrator</h3>
        <img class="picto_comp" src="images/intro_icons/css3-alt-brands.svg" alt="css">
        <img class="picto_comp" src="images/intro_icons/html5-brands.svg" alt="html">
        <img class="picto_comp" src="images/intro_icons/js-square-brands.svg" alt="js">
        <img class="picto_comp" src="images/intro_icons/photoshop.svg" alt="photoshop">
        <img class="picto_comp" src="images/intro_icons/figma.svg" alt="figma">
        <img class="picto_comp" src="images/intro_icons/illustrator.svg" alt="illustrator">
            </div>
        </div>
    </div>
    <div class="ligne_slide_3" data-aos="fade-left">
    <h3 class="texte_slide_3 beige text_alt">WEB</h3>
        <h3 class="texte_slide_3 blanc text_alt">BACK - END</h3>
        <div class="grand_rec">
            <div id="texte_picto2">
        <h3 class="descri blanc">Maitrise de php + Création et gestion de base de données</h3>
        <img class="picto_comp" src="images/intro_icons/data.svg" alt="database">
        <img class="picto_comp" src="images/intro_icons/php.svg" alt="php">
            </div>
        </div>
    <div class="petit_rec_bef">
        <h3 class="texte_slide_3 blanc">
            E <br>
            N <br>
            D
        </h3>
        <h3 class="texte_slide_3 blanc">
            B <br>
            A <br>
            C <br>
            K
        </h3>
        <h3 class="texte_slide_3 beige">
            W <br>
            E <br>
            B
        </h3>
        </div>
        
    </div>
    <div class="ligne_slide_3" data-aos="fade-right">
    <div class="petit_rec">
        <h3 class="texte_slide_3 beige">
            D <br>
            I <br>
            G <br>
            I <br>
            T <br>
            A <br>
            L
        </h3>
        <h3 class="texte_slide_3 blanc">
            P <br>
            H <br>
            O <br>
            T <br>
            O
        </h3>
        <h3 class="texte_slide_3 blanc">
            V <br>
            I <br>
            D <br>
            E <br>
            O
        </h3>
        </div>
        <h3 class="texte_slide_3 beige text_alt">DIGITAL</h3>
        <h3 class="texte_slide_3 blanc text_alt">PHOTO - VIDEO</h3>
        <div class="grand_rec">
            <div id="texte_picto3">
        <h3 class="descri blanc">Prise de vues video et photo <br class="marge">
        Retouche photo avec Lightroom et Photoshop <br class="marge">
        Montage video avec Première pro <br class="marge">
        Animation vidéo avec After effect </h3>
        <img class="picto_comp" src="images/intro_icons/light.svg" alt="lightroom">
        <img class="picto_comp" src="images/intro_icons/premiere.svg" alt="premiere">
        <img class="picto_comp" src="images/intro_icons/after.svg" alt="after">
            </div>
        </div>
    </div>
    </div>
</div>
</div>

<div id="portfolio">
<h2 class="sous_titre"  data-aos="fade-up">Portfolio</h2>
<div class="wrapper">
    <h4 class="realise">Sites réalisé</h4>
    <a class="voir_plus" href="#" >Voir plus</a>
    <div class="container_site">
        <div class="assemblage">
        <div class="test_site" ></div> <h5 class="site_pour">Site réalisé pour : </h5></div>
        <div class="assemblage">
        <div class="test_site"></div> <h5 class="site_pour">Site réalisé pour : </h5></div>
        <div class="assemblage">
        <div class="test_site"></div> <h5 class="site_pour">Site réalisé pour : </h5></div>
    </div>  
    <a class=" voir_plus_alt" href="#" >Voir plus</a>
    <h4 class="realise long">Vidéos réalisée</h4>
    <a class="voir_plus" href="#" >Voir plus</a>
    <div class="container_site">
        <div class="test_site video"></div>
        <div class="test_site video"></div> 
        <div class="test_site video"></div>
    </div>
    <a class=" voir_plus_alt" href="#" >Voir plus</a>
    <h4 class="realise long">Photos réalisée</h4>
    <a class="voir_plus" href="#" >Voir plus</a>
    <div class="container_photo">
        <?php
        $req1 = $bdd->query("SELECT source,numCouv from photos where numCouv=1");
        if($don1 = $req1->fetch())
        {
            echo '<div id="i1"><img id="img1" class="img gauche" src="images/photo/'.$don1['source'].'" alt="val"></div>';
        }
        $req2 = $bdd->query("SELECT source,numCouv from photos where numCouv=2");
        if($don2 = $req2->fetch())
        {
            echo '<div id="i2"><img id="img2" class="img"  src="images/photo/'.$don2['source'].'" alt="val"></div>';
        }
        $req3 = $bdd->query("SELECT source,numCouv from photos where numCouv=3");
        if($don3 = $req3->fetch())
        {
        echo '<div id="i3"><img id="img3" class="img gauche" src="images/photo/'.$don3['source'].'" alt="val"></div>';
        }
        $req4 = $bdd->query("SELECT source,numCouv from photos where numCouv=4");
        if($don4 = $req4->fetch())
        {
            echo '<div id="i4"><img id="img4" class="img" src="images/photo/'.$don4['source'].'" alt="val"></div>';
        }
        $req5 = $bdd->query("SELECT source,numCouv from photos where numCouv=5");
        if($don5 = $req5->fetch())
        {
            echo '<div id="i5"><img id="img5" class="img " src="images/photo/'.$don5['source'].'" alt="val"></div>';
        }
        $req6 = $bdd->query("SELECT source,numCouv from photos where numCouv=6");
        if($don6 = $req6->fetch())
        {
            echo '<div id="i6"><img id="img6" class="img gauche" src="images/photo/'.$don6['source'].'" alt="val"></div>';
        }
        ?>
        
    </div>
    <a class="voir_plus_alt pourquoi" href="#" >Voir plus</a>
</div>
</div>
<div id="contact" data-aos="fade-up">
    <h2 class="sous_titre beige_clair">Contact</h2>
    <div class="wrapper">
    <form action="#">
        <input type="text" id="name" class="input" placeholder="Nom">
        <input type="text" id="firstname" class="input" placeholder="Prénom">
        <textarea name="com" id="commentaire" class="input" placeholder="Votre message"></textarea>
        <input type="button" id="button" value="Envoyer">
    </form>
    <h4 class="resaux">Mes résaux</h4>
    <div class="container_icon_resaux">
    <a href="#"><img class="icons_resaux" src="images/intro_icons/insta.svg" alt="insta"></a>
    <a href="#"><img class="icons_resaux" src="images/intro_icons/youtube.svg" alt="youtube"></a>
    <a href="#"><img  class="icons_resaux" src="images/intro_icons/facebook.svg" alt="facebook"></a>
</div>
</div>
</div>
<footer>
    <img src="images/logo.svg" alt="logo">
</footer>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript">
AOS.init()
</script>
<script type="text/javascript" src="js/mouse.js"></script>
</body>
</html>