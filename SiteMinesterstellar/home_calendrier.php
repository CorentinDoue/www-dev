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

        <title>Mines'terstellar-Calendrier</title>


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
                    <img src="images/bandeau_calendrier.jpg" alt="bandeau_calendrier" />
                </div>
                <?php
                        if($_SESSION['mobile_device'])
                {
                    echo "<iframe src=\"https://calendar.google.com/calendar/embed?title=Mines%27terstellar&amp;showCalendars=0&amp;showTz=0&amp;height=800&amp;wkst=2&amp;hl=fr&amp;bgcolor=%23FFFFFF&amp;src=eqitjh4hvqe9q0evr38l248sig%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=Europe%2FParis\" style=\"border-width:0\" width=\"650\" height=\"650\" frameborder=\"0\" scrolling=\"no\"></iframe>";
                }else{
                    echo "<iframe src=\"https://calendar.google.com/calendar/embed?title=Mines%27terstellar&amp;showCalendars=0&amp;showTz=0&amp;height=800&amp;wkst=2&amp;hl=fr&amp;bgcolor=%23FFFFFF&amp;src=eqitjh4hvqe9q0evr38l248sig%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=Europe%2FParis\" style=\"border-width:0\" width=\"1000\" height=\"800\" frameborder=\"0\" scrolling=\"yes\"></iframe>";
                }
                ?>
                            
                  
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