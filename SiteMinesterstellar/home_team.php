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
        <link rel="apple-touch-icon" href="images/appleicon.png" />

        <title>Mines'terstellar-L'équipage</title>
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
                active: null,
                collapsible: true,    
                heightStyle: "content",
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
                    <img src="images/bandeau_equipage.jpg" alt="bandeau_equipage" />
                </div>

                <div id="accordion">
                    <h3>Bureau <div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_bureau.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Pouj.jpg" title="description_Pouj">
                        <img src="equipage/Pouj.jpg" alt="description_Pouj" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Coco.jpg" title="description_Coco">
                        <img src="equipage/Coco.jpg" alt="description_Coco" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Gaby.jpg" title="description_Gaby">
                        <img src="equipage/Gaby.jpg" alt="description_Gaby" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Paulo.jpg" title="description_Paulo">
                        <img src="equipage/Paulo.jpg" alt="description_Paulo" />
                        </a>
                        </div>
                    </div>

                    <h3>Padawanim <div style="display: flex; justify-content: center;"><div style="width: 70%;" ><img src="equipage/logo_padawanim.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Robin.jpg" title="description_Robin">
                        <img src="equipage/Robin.jpg" alt="description_Robin" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Eva.jpg" title="description_Eva>">
                        <img src="equipage/Eva.jpg" alt="description_Eva" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Victor.jpg" title="description_Victor">
                        <img src="equipage/Victor.jpg" alt="description_Victor" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Julien C.jpg" title="description_Julien C">
                        <img src="equipage/Julien C.jpg" alt="description_Julien C" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Thibaut.jpg" title="description_Thibaut">
                        <img src="equipage/Thibaut.jpg" alt="description_Thibaut" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Nikolai.jpg" title="description_Nikolaï">
                        <img src="equipage/Nikolai.jpg" alt="description_Nikolaï" />
                        </a>
                        </div>
                    </div>

                    <h3>SupernoVALM <div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_supernovalm.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Paul Breugnot.jpg" title="description_Paul Breugnot">
                        <img src="equipage/Paul Breugnot.jpg" alt="description_Paul Breugnot" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Arnaud C.jpg" title="description_Arnaud C">
                        <img src="equipage/Arnaud C.jpg" alt="description_Arnaud C" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Mylene.jpg" title="description_Mylene">
                        <img src="equipage/Mylene.jpg" alt="description_Mylene" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Yvan.jpg" title="description_Yvan">
                        <img src="equipage/Yvan.jpg" alt="description_Yvan" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Sebastien.jpg" title="description_Sebastien">
                        <img src="equipage/Sebastien.jpg" alt="description_Sebastien" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Alex Pillet.jpg" title="description_Alex Pillet">
                        <img src="equipage/Alex Pillet.jpg" alt="description_Alex Pillet" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Baptiste.jpg" title="description_Baptiste">
                        <img src="equipage/Baptiste.jpg" alt="description_Baptiste" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Constantin.jpg" title="description_Constantin">
                        <img src="equipage/Constantin.jpg" alt="description_Constantin" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Gabrielle.jpg" title="description_Gabrielle">
                        <img src="equipage/Gabrielle.jpg" alt="description_Gabrielle" />
                        </a>
                        </div>
                    </div>

                    <h3>Com'smos<div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_comsmos.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Jean.jpg" title="description_Jean">
                        <img src="equipage/Jean.jpg" alt="description_Jean" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Pierre G.jpg" title="description_Pierre G">
                        <img src="equipage/Pierre G.jpg" alt="description_Pierre G" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Arnaud.jpg" title="description_Arnaud">
                        <img src="equipage/Arnaud.jpg" alt="description_Arnaud" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Sonia.jpg" title="description_Sonia">
                        <img src="equipage/Sonia.jpg" alt="description_Sonia" />
                        </a>
                        </div>
                    </div>

                    <h3>Unight'corn<div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_unightcorn.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Flora.jpg" title="description_Flora">
                        <img src="equipage/Flora.jpg" alt="description_Flora" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Lucas.jpg" title="description_Lucas">
                        <img src="equipage/Lucas.jpg" alt="description_Lucas" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Remi.jpg" title="description_Remi">
                        <img src="equipage/Remi.jpg" alt="description_Remi" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Laure.jpg" title="description_Laure">
                        <img src="equipage/Laure.jpg" alt="description_Laure" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Estelle.jpg" title="description_Estelle">
                        <img src="equipage/Estelle.jpg" alt="description_Estelle" />
                        </a>
                        </div>

                        <!-- <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Manon.jpg" title="description_Manon">
                        <img src="equipage/Manon.jpg" alt="description_Manon" />
                        </a>
                        </div> -->

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Guillaume.jpg" title="description_Guillaume">
                        <img src="equipage/Guillaume.jpg" alt="description_Guillaume" />
                        </a>
                        </div>

                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Claire.jpg" title="description_Claire">
                        <img src="equipage/Claire.jpg" alt="description_Claire" />
                        </a>
                        </div>
                    </div>

                    <h3>Gold'orak<div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_goldorak.png" alt="logo_minesterstellar" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Ralph.jpg" title="description_Ralph">
                        <img src="equipage/Ralph.jpg" alt="description_Ralph" />
                        </a>
                        </div>
                        
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Pierre M.jpg" title="description_Pierre M">
                        <img src="equipage/Pierre M.jpg" alt="description_Pierre M" />
                        </a>
                        </div>
                    </div>

                    <h3>2A<div style="display: flex; justify-content: center;"><div style="width: 50%;" ><img src="equipage/logo_2A.png" alt="logo_2A" /></div></div></h3>
                    <div class="galerie">
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Juju.jpg" title="description_Juju">
                        <img src="equipage/Juju.jpg" alt="description_Juju" />
                        </a>
                        </div>
                        
                        <?php 
                        if(!$_SESSION['mobile_device'])
                        {
                            echo '<div style="width: 45%; padding: 2.5%; ">';
                        }else{
                            echo '<div style="width: 95%; padding: 2.5%;">';
                        } ?>
                        <a class="fancybox"  rel="gallery1" href="equipage/Titi.jpg" title="description_Titi">
                        <img src="equipage/Titi.jpg" alt="description_Titi" />
                        </a>
                        </div>
                    </div>
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