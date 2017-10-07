<?php

include("start.php");

$acc=0;

$rep = $bdd->query('SELECT * FROM event ORDER BY date_event ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $event[]=$donnees;
    }

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/touchicon.png" />

        <title>Mines'terstellar-Événements</title>
         <!-- Add jQuery library -->
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

        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        
        <?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css' />";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        }?>
          
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script>
        $( function() {
            $( "#accordion" ).accordion({

                collapsible: true,    
                heightStyle: "content",
                <?php
                    echo "active:".$acc;
                ?>
                });
        } );
        </script>


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
                    <img src="images/bandeau_event.jpg" alt="bandeau_event" />
                </div>
                <div id="accordion">

                    <?php 
                    foreach ($event as $key => $value) 
                        {   
                            if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $value['date_decryptage']<=time())
                            {
                            echo "<h3>".$value['titre']." - ".date("d/m/y",$value['date_event'])."</h3>";
                            ?>
                            <div style="display: flex; ">
                                <div>
                                <?php
                                    echo '<a class="fancybox"  rel="gallery1" href="affiches/'.$value['nom_image'].'" title="'.$value['titre'].'">';
                                    ?>
                                    <img src="affiches/mini<?php echo $value['nom_image']; ?>" alt="affiche" />
                                    </a>
                                </div>
                                <div style="display: flex; flex-direction: column; justify-content: center;padding: 10px;">
                                    <div>
                                    <?php
                                        echo $value['contenu'];
                                    ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }else{
                                echo "<h3>".$value['titre_cryptee']." - ".date("d/m/y",$value['date_event'])."</h3>";
                            ?>
                            <div style="display: flex;">
                                <div>
                                <?php
                                    echo '<a class="fancybox"  rel="gallery1" href="affiches/'.$value['nom_image_cryptee'].'" title="'.$value['titre_cryptee'].'">';
                                    ?>
                                    <img src="affiches/mini<?php echo $value['nom_image_cryptee']; ?>" alt="affiche" />
                                    </a>
                                </div>
                                <div style="display: flex; flex-direction: column; justify-content: flex-start; padding: 10px;">
                                    <div>
                                    <?php
                                        echo crypter($value['contenu']);
                                    ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                        }
                    ?>
                    
            
                
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