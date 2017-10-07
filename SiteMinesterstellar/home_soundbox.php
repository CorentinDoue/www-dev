<?php

include("start.php"); 

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css?".time()."' />";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        }?>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/appleicon.png" />

        <title>Mines'terstellar-Soundbox</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="soundManager/script/soundmanager2.js"></script>
        <script src="soundbox.js"></script>
        

    </head>
 

    <body>
    	
    	<?php 

        if($_SESSION['mobile_device'])
        {
            include("header_mobile.php");
        }else{
        include("header.php"); 

        echo "<section>";
        }
        ?>
    	
        <div class='corps'>
            <div class='accueil'>
                <div class='image_bandeau'>
                    <img src="images/bandeau_soundbox.jpg" alt="bandeau_soundbox" />
                </div>
                <div class="galerie">
                    <div class='soundbox' id="S1" onclick='Jouer(1)'> Ah ! </div>
                    <div class='soundbox' id="S1" onclick='Jouer(55)'> Ok ? </div>
                    <div class='soundbox' id="S1" onclick='Jouer(31)'> Allô </div>
                    <div class='soundbox' id="S1" onclick='Jouer(39)'> Avec un T comme t'es là </div>
                    <div class='soundbox' id="S2" onclick='Jouer(2)'> Bah ouais ma soeur </div>
                    <div class='soundbox' id="S3" onclick='Jouer(3)'> Ca me rajeunie </div>
                    <div class='soundbox' id="S3" onclick='Jouer(40)'> C'est la levrette de votre vie </div>
                    <div class='soundbox' id="S1" onclick='Jouer(54)'> Je suis pas venue ici pour souffrir </div>
                    <div class='soundbox' id="S4" onclick='Jouer(4)'> Congolexicomatisation </div>
                    <div class='soundbox' id="S4" onclick='Jouer(5)'> Crackid </div>
                    <div class='soundbox' id="S4" onclick='Jouer(48)'> Cuir et Moustache </div>
                    <div class='soundbox' id="S5" onclick='Jouer(6)'> Eddy Malou </div>
                    <div class='soundbox' id="S7" onclick='Jouer(7)'> Essaie pas d'niaiser là </div>
                    <div class='soundbox' id="S8" onclick='Jouer(8)'> Excepté une fois au chalet </div>
                    <div class='soundbox' id="S8" onclick='Jouer(33)'> Ferme ta gueule ! </div>
                    <div class='soundbox' id="S9" onclick='Jouer(9)'> Filme mes pieds </div>
                    <div class='soundbox' id="S10" onclick='Jouer(10)'> I've fallen, and I can't get up! </div>
                    <div class='soundbox' id="S11" onclick='Jouer(11)'> Jacques ! </div>
                    <div class='soundbox' id="S12" onclick='Jouer(49)'> J'ai compté les paquets de chips </div>
                    <div class='soundbox' id="S12" onclick='Jouer(12)'> J'ai jamais touché mes filles </div>
                    <div class='soundbox' id="S12" onclick='Jouer(32)'> J'aime me beurrer la biscotte </div>
                    <div class='soundbox' id="S13" onclick='Jouer(13)'> Je détruis ton vagin </div>
                    <div class='soundbox' id="S13" onclick='Jouer(38)'> Je lui ai déchargé dans la bouche </div>
                    <div class='soundbox' id="S13" onclick='Jouer(50)'> Je te lèche tout ça </div>
                    <div class='soundbox' id="S13" onclick='Jouer(34)'> Je vais vous enculer vos morts </div>
                    <div class='soundbox' id="S14" onclick='Jouer(14)'> Jeanne au secours ! </div>
                    <div class='soundbox' id="S14" onclick='Jouer(46)'> John Cena </div>
                    <div class='soundbox' id="S14" onclick='Jouer(41)'> Jt'ai cassé </div>
                    <div class='soundbox' id="S14" onclick='Jouer(35)'> La calotte de ses morts </div>
                    <div class='soundbox' id="S15" onclick='Jouer(15)'> La musique est incroyable </div>
                    <div class='soundbox' id="S16" onclick='Jouer(16)'> Lalala </div>
                    <div class='soundbox' id="S17" onclick='Jouer(17)'> L'alcool c'est de l'eau </div>
                    <div class='soundbox' id="S18" onclick='Jouer(18)'> Le rayon spectral </div>
                    <div class='soundbox' id="S18" onclick='Jouer(36)'> Le sang de leurs morts </div>
                    <div class='soundbox' id="S19" onclick='Jouer(19)'> L'évènement est incroyable ! </div>
                    <div class='soundbox' id="S19" onclick='Jouer(47)'> Leviosa </div>
                    <div class='soundbox' id="S20" onclick='Jouer(20)'> Mais oui c'est clair </div>
                    <div class='soundbox' id="S20" onclick='Jouer(51)'> Même qui te reste de la merde </div>
                    <div class='soundbox' id="S21" onclick='Jouer(21)'> Mer noire (long) </div>
                    <div class='soundbox' id="S22" onclick='Jouer(22)'> Mer noire </div>
                    <div class='soundbox' id="S22" onclick='Jouer(30)'> MMA </div>
                    <div class='soundbox' id="S23" onclick='Jouer(23)'> Moi là </div>
                    <div class='soundbox' id="S24" onclick='Jouer(24)'> Pédé ! </div>
                    <div class='soundbox' id="S25" onclick='Jouer(25)'> Popopo </div>
                    <div class='soundbox' id="S26" onclick='Jouer(26)'> Quenouille </div>
                    <div class='soundbox' id="S27" onclick='Jouer(27)'> Rouquin ! </div>
                    <div class='soundbox' id="S27" onclick='Jouer(37)'> Ta femme je l'ai prise je l'ai enculée </div>
                    <div class='soundbox' id="S28" onclick='Jouer(28)'> Tequila Heineken </div>
                    <div class='soundbox' id="S28" onclick='Jouer(42)'> Trop beau, trop merveilleux </div>
                    <div class='soundbox' id="S28" onclick='Jouer(43)'> Tu es grosse Mélisandre </div>
                    <div class='soundbox' id="S28" onclick='Jouer(44)'> Tu es mauvais Jack </div>
                    <div class='soundbox' id="S28" onclick='Jouer(52)'> Tu me fais bander comme un taureau ! </div>
                    <div class='soundbox' id="S28" onclick='Jouer(53)'> Tu me pisses dans un verre </div>
                    <div class='soundbox' id="S28" onclick='Jouer(45)'> Tu peux perdre une carte </div>
                    <div class='soundbox' id="S29" onclick='Jouer(29)'> Vib's Cartel </div>
                </div>         
            </div>
            <?php include("contenu/logo.php"); ?>
        </div>

        <?php 

        if(!$_SESSION['mobile_device'])
        {
            include("nav.php");

        echo "</section>";
        }
        

    	include("footer.php");

		?>
    </body>
</html>