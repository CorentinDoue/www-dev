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
            echo "<link rel='stylesheet' href='style_mobile.css' />";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        }?>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/touchicon.png" />

        <title>Mines'terstellar-Jeux Semaine 1</title>
        

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
                    <img src="images/bandeau_s1.jpg" alt="bandeau_entrainement" />
                </div>              

            </div>

            <article>
                <h1>Préparez-vous pour un voyage interstellaire !</h1>
                <p>
                    Retouvez-nous pendant nos afterworks, nos perms et nos annimations pour participer à de nombreux jeux qui testeront vos aptitudes à voyager dans l'espace.<br><br>
                    <u><strong>Déroulement :</strong></u><br><br>
                    Vous recevez des points pour chaque jeu auquel vous participez. <br><br>
                    Vous pouvez consulter les classements de chaque jeu ainsi que le classement général en temps réel.<br><br>
                    A la fin de la campagne, les <u>trois premiers au classement général</u> recevront un prix parmi :<br></p>
                      <p>- Une enceinte JBL flip 3</p>
                      <div style="width: 50%;"><img src="images/FLIP3.png" alt="flip3" /></div>
                      <p><br>- Un mini drone Parrot Airborne Night Blaze</p>
                      <div style="width: 50%;"><img src="images/drone.png" alt="mini_drone" /></div>
                      <p><br>- Un pack soda stream</p><div style="width: 50%;"><img src="images/sodastream.png" alt="sodastream" /></div>
                
            </article>
            <a href="home_classement.php">
                 <div class='bouton'>
                    Voir les classements
                 </div>
            </a>
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