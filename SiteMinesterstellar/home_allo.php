<?php

include("start.php");

$acc=0;

$rep = $bdd->query('SELECT * FROM allo ORDER BY clef ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $allo[]=$donnees;
    }

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

        <title>Mines'terstellar-Allo</title>
        
          
        


    </head>
 

    <body>
    	
    	<?php 

        if($_SESSION['mobile_device'])
        {
            include("header_mobile.php");
        }else{
        include("header.php"); 

    	echo "<section>";
    	} ?>
        <div class='corps'>
            <div class='accueil'>
                <div class='image_bandeau'>
                    <img src="images/bandeau_allo.jpg" alt="bandeau_allo" />
                </div>
                <script type="text/javascript">
                function tournerLaCarte() {
                    var elements = this.parentNode.querySelectorAll("div[class^='card']");
                    for (var i = 0; i < elements.length; i++) {
                        if (elements[i].className == "card-single") {
                            elements[i].className += " rotated";
                        } else {
                            elements[i].className = "card-single";
                        }
                    }
                }

                window.onload = function () {
                    buttons = document.querySelectorAll("button");
                    for (i = 0; i < buttons.length; i++) {
                        element = buttons[i];
                        element.addEventListener("click", tournerLaCarte);
                    }
                };
       
                </script>
                <h1>Allos actifs: 0 (Campagne terminée)</h1>
                <div class='galerie'>
                
                   <?php foreach ($allo as $key => $value) { 
                        if ($value['statut']==2)
                        {?>
                            <div class="carte_allo">
                            <div class="flippingcard">
                        
                            <button onclick="changeClass(this)"> 
                            <div class="card-single">
                                     
                                <div class="face-front">
                                    
                                        <img src="logo_allo/<?php echo $value['nom_logo']; ?>" alt="affiche" />
                                    
                                </div><!-- /.front -->
                                
                                <div class="face-back">
                                    <div style='color: white; 
                                    <?php 
                                        if ($_SESSION['mobile_device'])
                                        {
                                            echo "font-size: 3em;";
                                        }else{
                                            echo "font-size: 2em;";
                                        }?>

                                        text-align: center;
                                        font-weight: bold;
                                    '>
                                        <?php echo $value['nom']; ?>
                                    
                                    </div>

                                    <div style='color: white;
                                    <?php 
                                        if ($_SESSION['mobile_device'])
                                        {
                                            echo "font-size: 2em;";
                                        }else{
                                            echo "font-size: 1em;";
                                        }?>
                                        text-align: justify;
                                    '>
                                        <?php echo $value['description']; ?>
                                    </div>
                                </div><!-- /.back -->
                                     
                            </div><!-- /.card-single -->
                            </button>
                         </div><!-- /.flipcard --> 
                          

                        <?php
                        if($_SESSION['mobile_device'])
                        {
                            echo "<a href='tel:".$value['tel']."'><div class='bouton'>Appeler</div></a>";
                        }else{
                            echo "<div style='margin-top: 30px;''> <h2>Appeler au ".$value['tel']."</h2></div>";
                        }
                        echo "</div>";
                    }
                    } ?>
                    </div>
                    <h1>Les allos de la campagne</h1>
                    <div class='galerie'>
                    
                    <?php foreach ($allo as $key => $value) { 
                        if ($value['statut']==1)
                        {?>
                        <div class="carte_allo">
                        <div class="flippingcard">
                    
                        <button onclick="changeClass(this)"> 
                        <div class="card-single">
                                 
                            <div class="face-front">
                                
                                    <img src="logo_allo/<?php echo $value['nom_logo']; ?>" alt="affiche" />
                                
                            </div><!-- /.front -->
                            
                            <div class="face-back">
                                <div style='color: white; 
                                <?php 
                                    if ($_SESSION['mobile_device'])
                                    {
                                        echo "font-size: 3em;";
                                    }else{
                                        echo "font-size: 2em;";
                                    }?>

                                    text-align: center;
                                    font-weight: bold;
                                '>
                                    <?php echo $value['nom']; ?>
                                
                                </div>

                                <div style='color: white;
                                <?php 
                                    if ($_SESSION['mobile_device'])
                                    {
                                        echo "font-size: 2em;";
                                    }else{
                                        echo "font-size: 1em;";
                                    }?>
                                    text-align: justify;
                                '>
                                    <?php echo $value['description']; ?>
                                </div>
                            </div><!-- /.back -->
                                 
                        </div><!-- /.card-single -->
                        </button>
                     </div><!-- /.flipcard --> 
                      

                    <?php
                    echo "</div>";
                    }
                    } ?>
                    </div>
                 
        </div>
            <?php include("contenu/logo.php"); ?>
        </div>

        <?php

        if (!$_SESSION['mobile_device'])
        {
        include("nav.php");

    	echo "</section>";
        }
    	include("footer.php");

		?>
    </body>
</html>