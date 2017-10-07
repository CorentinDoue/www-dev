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

        <title>Mines'terstellar-Galerie</title>

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
                    <img src="images/bandeau_grade.jpg" alt="bandeau_grade" />
            </div>

            <script type="text/javascript">// Activate fancyBox
            $(".fancybox")
                .attr('rel', 'gallery')
                .fancybox({
                    padding : 0
                });


            // Launch fancyBox on first element
            $(".fancybox").eq(0).trigger('click');
             </script>

                               
                <div class="grade">

                        <table>
                            <tr style="background-color:  rgba(0,0,0,0.4);">
                                <td><div class="titre_calendrier">Écusson</div></td>
                                <td><div class="titre_calendrier">Grade</div></td>
                            </tr>
                            <?php 

                            if($_SESSION['mobile_device'])
                            { ?>
                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/Amiral.png" title="Amiral"><img src="grade/moyen_Amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/Vice_amiral.png" title="Vice-Amiral"><img src="grade/moyen_Vice_amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Vice-Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/contre_amiral.png" title="Contre Amiral"><img src="grade/moyen_contre_amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Contre Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de vaisseau.png" title="Capitaine de Vaisseau"><img src="grade/moyen_capitaine de vaisseau.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Vaisseau</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de frégate.png" title="Capitaine de Frégate"><img src="grade/moyen_capitaine de frégate.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Frégate</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de corvette.png" title="Capitaine de Corvette"><img src="grade/moyen_capitaine de corvette.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Corvette</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/lieutenant.png" title="Lieutenant"><img src="grade/moyen_lieutenant.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Lieutenant</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/major.png" title="Major"><img src="grade/moyen_major.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Major</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/maitre principal.png" title="Maître Principal"><img src="grade/moyen_maitre principal.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Maître Principal</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/premier maitre.png" title="Premier Maître"><img src="grade/moyen_premier maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Premier Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/maitre.png" title="Maître"><img src="grade/moyen_maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/second maitre.png" title="Second Maître"><img src="grade/moyen_second maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Second Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/quartier maitre.png" title="Quartier Maître"><img src="grade/moyen_quartier maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Quartier Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/matelot.png" title="Matelot"><img src="grade/moyen_matelot.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Matelot</div></td>
                            </tr>

                            <?php   
                            }else{ ?>
                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/Amiral.png" title="Amiral"><img src="grade/mini_Amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/Vice_amiral.png" title="Vice-Amiral"><img src="grade/mini_Vice_amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Vice-Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/contre_amiral.png" title="Contre Amiral"><img src="grade/mini_contre_amiral.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Contre Amiral</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de vaisseau.png" title="Capitaine de Vaisseau"><img src="grade/mini_capitaine de vaisseau.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Vaisseau</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de frégate.png" title="Capitaine de Frégate"><img src="grade/mini_capitaine de frégate.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Frégate</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/capitaine de corvette.png" title="Capitaine de Corvette"><img src="grade/mini_capitaine de corvette.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Capitaine de Corvette</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/lieutenant.png" title="Lieutenant"><img src="grade/mini_lieutenant.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Lieutenant</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/major.png" title="Major"><img src="grade/mini_major.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Major</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/maitre principal.png" title="Maître Principal"><img src="grade/mini_maitre principal.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Maître Principal</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/premier maitre.png" title="Premier Maître"><img src="grade/mini_premier maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Premier Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/maitre.png" title="Maître"><img src="grade/mini_maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/second maitre.png" title="Second Maître"><img src="grade/mini_second maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Second Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/quartier maitre.png" title="Quartier Maître"><img src="grade/mini_quartier maitre.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Quartier Maître</div></td>
                            </tr>

                            <tr>
                                <td><div style="display: flex;justify-content: center;"><a class="fancybox"  rel="gallery1" href="grade/matelot.png" title="Matelot"><img src="grade/mini_matelot.png" alt="image_galerie"/></a></div></td>
                                <td><div class="texte_calendrier">Matelot</div></td>
                            </tr>

                            <?php 
                            }
                            ?>
                            
                        </table>
                
                
                
               
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