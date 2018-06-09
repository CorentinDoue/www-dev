<?php
include("start.php");
if (isset($_GET['logout']) AND $_GET['logout']==true )
{    
    $_SESSION['logout']=true;
}
if (isset($_GET['droits']) AND $_GET['droits']=='ADMIN' AND isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD')
{
    $_SESSION['droits']='ADMIN';
}
if (isset($_GET['droits']) AND $_GET['droits']=='MOD' AND isset($_SESSION['droits']) AND $_SESSION['droits']=='ADMIN')
{
    $_SESSION['droits']='MOD';
}
if (!isset($_SESSION['clef']) AND isset($_COOKIE['mail']) AND isset($_COOKIE['mdp']) AND !isset($_SESSION['logout']))
{
    $req = $bdd->prepare('SELECT clef, Prenom, Nom, Mail, Mdp, Droits FROM user_minesterstellar WHERE Mail = ?');
    $req->execute(array($_COOKIE['mail']));
    while ($donnees = $req->fetch())
    {   
        if ($donnees['Mdp']==$_COOKIE['mdp'])
        {
        $_SESSION['clef'] = $donnees['clef'];
        $_SESSION['prenom'] = $donnees['Prenom'];
        $_SESSION['nom'] = $donnees['Nom'];
        $_SESSION['mail'] = $donnees['Mail'];
        $_SESSION['droits'] = $donnees['Droits'];
        $_SESSION['redirected'] = false;
        }
    }
}
if (isset($_GET['balise']))
{
    $_SESSION['balise']=$_GET['balise'];
}
if(isset($_SESSION['balise']) AND !isset($_SESSION['clef']))
{
    header('Location: home_connexion.php');
}
if(isset($_SESSION['balise']) AND isset($_SESSION['clef']))
{
    header('Location: home_jdp.php');
}
if (isset($_SESSION['redirected']) AND $_SESSION['redirected']==false AND $_SESSION['droits']=="USER")
{
    $_SESSION['redirected']=true;
    header('Location: home_actualite.php');
    exit();
}

if($_SESSION['mobile_device'] AND !isset($_SESSION['redirected_mobile']))
{
    $_SESSION['redirected_mobile']=true;
    header('Location:index.php#accueil');
}
?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css?".time()."'/>";
        }else{
            echo "<link rel='stylesheet' href='style_web.css?".time()."' />";
        } ?>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/appleicon.png" />
        <title>Mines'terstellar-Accueil</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript">// Activate fancyBox
            $(".fancybox")
                .attr('rel', 'gallery')
                .fancybox({
                    padding : 0
                });


            // Launch fancyBox on first element
            $(".fancybox").eq(0).trigger('click');
             </script>
        

    </head>
 

    <body>
    	
    	<?php 
        if($_SESSION['mobile_device'])
        {?>
            <div  style="margin: 5px">
            <a href="index.php">
                <img src="images/logo_minesterstellar.png" alt="logo_minesterstellar"/>
            </a> 
            </div>
            <div class="index_mobile">
                
                <?php 
                if (!isset($_SESSION['clef']))
                {?>
                    <div class="lien_mobile">
                    <a href="home_connexion.php">
                        <div>
                            <img src="images/login.png" alt="login"/>
                        </div>
                        <div class="titre_bouton">
                            Connexion
                        </div>
                    </a> 
                    </div>
                <?php } ?>

                <div class="lien_mobile">
                <a href="home_actualite.php">
                    <div>
                        <img src="images/logo-livre.png" alt="actualite"/>
                    </div>
                    <div class="titre_bouton">
                        Journal de bord
                    </div>
                </a> 
                </div>

                <?php 
                if (isset($_SESSION['droits']) AND ($_SESSION['droits']=='ADMIN' OR $_SESSION['droits']=='MOD'))
                    { ?>
                    
                    <div class="lien_mobile">
                    <a href="home_points.php">

                        <div>
                            <img src="images/logo-config.png" alt="config"/>
                        </div>
                        <div class="titre_bouton">
                        <?php
                        if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){
                            echo "Configuration";
                        }else{
                            echo "Points";
                        }
                        ?>              
                        </div>
                    </a>
                    </div>
                    
                <?php } ?>

                <div class="lien_mobile">
                <a href="home_galerie.php">
                    <div>
                        <img src="images/logo-galerie.png" alt="galerie"/>
                    </div>
                    <div class="titre_bouton">
                        Galerie
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_jdp.php">
                    <div>
                        <img src="images/jeu de piste.png" alt="Jeu de piste"/>
                    </div>
                    <div class="titre_bouton">
                        Jeu de piste
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_allo.php">
                    <div>
                        <img src="images/logo-allo.png" alt="allo"/>
                    </div>
                    <div class="titre_bouton">
                        Allo
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_classement.php">
                    <div>
                        <img src="images/logo-classement.png" alt="allo"/>
                    </div>
                    <div class="titre_bouton">
                        Classements
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_team.php">
                    <div>
                        <img src="images/logo-team.png" alt="team"/>
                    </div>
                    <div class="titre_bouton">
                        Équipage
                    </div>
                </a> 
                </div>            

                

                <div class="lien_mobile">
                <a href="home_event.php">
                    <div>
                        <img src="images/logo-event.png" alt="event"/>
                    </div>
                    <div class="titre_bouton">
                        Événements
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_calendrier.php">
                    <div>
                        <img src="images/logo-calendrier.png" alt="Calendrier"/>
                    </div>
                    <div class="titre_bouton">
                        Calendrier
                    </div>
                </a> 
                </div>

                <div class="lien_mobile">
                <a href="home_soundbox.php">
                    <div>
                        <img src="images/logo-soundbox.png" alt="Soundbox"/>
                    </div>
                    <div class="titre_bouton">
                        Soundbox
                    </div>
                </a> 
                </div>



                <?php 
                if (isset($_SESSION['clef']))
                {?>
                    <div class="lien_mobile">
                    <a href="logout.php">
                        <div>
                            <img src="images/logout.png" alt="logout"/>
                        </div>
                        <div class="titre_bouton">
                            Déconnexion
                        </div>
                    </a> 
                    </div>
                <?php } ?>

                                  
            </div>
            <article id="accueil">
                <h1>Bienvenue sur le site de Mines'terstellar</h1>
                <p>
                Mines'terstellar est une liste BDE de l'école Nationale Supérieure des Mines de Saint-Etienne.<br>
                <br>
                Mais plus encore qu'une liste, Minesterstellar c'est avant tout :<br>
                
                 - des animations d'une autre planète<br>
                 - des soirées stratosphériques<br>
                 - des repas d'une nouvelle dimension<br>
                 - une équipe d'extraterrestres pour vous faire vivre des moments inoubliables<br>

                <br>
                Vous trouverez sur ce site toutes les informations importantes relatives à notre liste.<br><br> 
                N'hésitez pas à consulter nos différentes rubriques pour profiter pleinement de la mission Mines'terstellar.<br>
                <br>
                Retrouvez nous également sur :<br>
                <br>
                 - <a href="https://www.facebook.com/Minesterstellar/" target="_blank"> <span style="color: white; width: 20px;">Facebook </span> <span ><img class="logolien" src="logo/logo fb.png" alt="logo facebook"/></span></a><br><br>
                 - <a href="https://www.youtube.com/channel/UCcEpj3I3LtTfgQGJdy6NmYQ/" target="_blank"> <span style="color: white;">Youtube </span> <span><img class="logolien" src="logo/logo youtube.png" alt="logo youtube"/></span></a><br><br>
                 - <a class="fancybox"  rel="gallery1" href="logo/snapcode.png"> <span style="color: white;">Snapchat </span><img class="logolien" src="logo/logo snap.png" alt="logo youtube"/></span></a><br>
                <br>
                <h2>Mines'terstellar, notre univers, votre campagne.</h2>
                </p>
            </article>
        <?php 
        }else{



            include("header.php"); ?>

        	<section>
        	
            <div class='corps'>
                <div class='accueil'>
                    <div class='image_bandeau'>
                        <img src="images/bandeau_accueil.jpg" alt="bandeau_accueil" />
                    </div>

                   

                    <article>
                        <h1>Bienvenue sur le site de Mines'terstellar</h1>
                        <p>
                        Mines'terstellar est une liste BDE de l'école Nationale Supérieure des Mines de Saint-Etienne.<br> 
                        Mais plus encore qu'une liste, Minesterstellar c'est avant tout :<br>
                         - des animations d'une autre planète<br>
                         - des soirées stratosphériques<br>
                         - des repas d'une nouvelle dimension<br>
                         - une équipe d'extraterrestres pour vous faire vivre des moments inoubliables<br>
                        <br>
                        Vous trouverez sur ce site toutes les informations importantes relatives à notre liste.<br> 
                        N'hésitez pas à consulter nos différentes rubriques pour profiter pleinement de la mission Mines'terstellar.<br>
                        <br>
                        Retrouvez nous également sur :<br><br>
                         - <a href="https://www.facebook.com/Minesterstellar/" target="_blank"> <span style="color: white; width: 20px;">Facebook </span> <span ><img class="logolien" src="logo/logo fb.png" alt="logo facebook"/></span></a><br><br>
                         - <a href="https://www.youtube.com/channel/UCcEpj3I3LtTfgQGJdy6NmYQ/" target="_blank"> <span style="color: white;">Youtube </span> <span><img class="logolien" src="logo/logo youtube.png" alt="logo youtube"/></span></a><br><br>
                         - <a class="fancybox"  rel="gallery1" href="logo/snapcode.png"> <span style="color: white;">Snapchat </span><img class="logolien" src="logo/logo snap.png" alt="logo youtube"/></span></a><br>
                        <br>
                        <h2>Mines'terstellar, notre univers, votre campagne.</h2>
                        </p>
                    </article>
                    
                    
                        
                    <?php
                    
                         
                    if (!isset($_SESSION['clef']))
                    {?>
                        <article>
                            <a href='home_connexion.php'><h1>Connectez vous pour accéder à toutes nos activités de campagne</h1></a>
                        </article>
                    <?php } ?>
                    <!--<div class="affiche_accueil">
                    <?php 
                        //include("contenu/affiche.php");
                    ?>
                        
                    </div> -->
                </div>

                <?php include("contenu/logo.php"); ?>
            </div>

            <?php include("nav.php");

        	echo "</section>";
        }
    	include("footer.php");

		?>

        

    </body>
</html>