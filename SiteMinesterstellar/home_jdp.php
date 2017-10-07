<?php

include("start.php"); 



if (isset($_SESSION['clef']))
{   
    if (isset($_POST['try_code']) AND $_POST['try_code']!=NULL)
    {
        $_SESSION['balise']=$_POST['try_code'];
    }

    $req = $bdd->prepare('SELECT jeu_de_piste FROM points WHERE clef=?');
    $req->execute(array($_SESSION['clef']));

    while ($donnees = $req->fetch())
    {
        $achievment=explode(" ", $donnees['jeu_de_piste']);
        foreach ($achievment as $key => $value) {
            if ($value=='T')
            {
                $codes_trouvées[]=$achievment[$key-1];
            }
            if ($value=='C')
            {
                $code_indice=$achievment[$key-1];
            }
        }
    }

    $rep = $bdd->query('SELECT * FROM balises ');
    while ($donnees = $rep->fetch())
    {
        if (isset($code_indice) AND $donnees['code']==$code_indice)
        {
            $indice=$donnees;
        }
        elseif (isset($codes_trouvées) AND in_array($donnees['code'], $codes_trouvées)) 
        {
            $trouvée[]=$donnees;
        }
        else
        {
            $non_trouvée[]=$donnees;
        }
    }

    if(isset($_SESSION['balise']))
    {
        if ($_SESSION['balise']==$code_indice) 
        {   
            $new_achievment='';
            if (isset($codes_trouvées)) 
            {
                foreach ($codes_trouvées as $key => $value) 
                {
                    $new_achievment .= $value." T ";
                }
            }

            if (isset($non_trouvée)) 
            {
                $rand_key=array_rand($non_trouvée);
                $new_code=$non_trouvée[$rand_key]['code'];
                $new_achievment .= $code_indice." T ".$new_code." C";
            }else{
                $new_achievment .= $code_indice." T ";
            }

            $req = $bdd->prepare('UPDATE points SET points= points + 12, balises_trouvees= balises_trouvees + 1, jeu_de_piste = :jeu_de_piste WHERE clef=:clef');

            $req->execute(array(
                        'jeu_de_piste' => $new_achievment,
                        'clef' => $_SESSION['clef']
                        ));
            unset($_SESSION['balise']);
            header('Location: home_jdp.php?message=nouvel indice');
        }else{
            $message="Le code entré ne correspond pas à la balise recherchée";
            unset($_SESSION['balise']);
        }
    }

    if(isset($_GET['message']) AND $_GET['message']=="nouvel indice")
    {
        $message="Félicitations, vous avez débloqué une nouvelle balise ! <br> Voici l'indice de la balise suivante";
    }

    if(!isset($non_trouvée) AND !isset($indice))
    {
        $message='Félicitations, vous avez trouvé toutes les balises !';
    }

}


?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/touchicon.png" />
        <?php 
        if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $date_decryptage_jeu_de_piste<=time())
        {   
            echo "<title>Mines'terstellar-Jeu de piste</title>";
        }else{
            echo "<title>Mines'terstellar-Classified projet</title>";
        }   
            ?>
        
            
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
            $( "#tabs" ).tabs();
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
                
            </div>

                <?php 
        if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $date_decryptage_jeu_de_piste<=time())
            {   ?>
                <div class='image_bandeau'>
                    <img src="images/bandeau_jdp.jpg" alt="bandeau_jdp" />
                </div>
            <?php 
                if (isset($_SESSION['clef']))
                    {?>
                <div id="tabs">
                            <ul>
                                <li><a href="#tabs-0"><div class="titre_onglet">Carnet de route</div></a></li>
                                <li><a href="#tabs-1"><div class="titre_onglet">Règles du jeu</div></a></li>
                            </ul> 
                            <div id="tabs-0">
                            <?php
                            if (isset($message))
                            {
                                echo "<article><h1>".$message."</h1></article>";
                            }

                            if(isset($non_trouvée) OR isset($indice))
                            { ?>
                                <form action="home_jdp.php" method="post">
                                    <h1>Vous avez trouvé la prochaine balise ?</h1>
                                    <label for="try_code">Insérer le code de la balise :</label><input type='text' name='try_code' id ="try_code" size='40' ><br/>

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Valider" >
                                    </div>
                                </form>
                             <?php }

                            if (isset($indice))
                            {
                                echo '<table>
                                        <tr>
                                            <td><div class="titre_calendrier" style="width: 400px;">Indice menant à la prochaine balise</div></td>
                                            <td><div class="titre_calendrier" style="width: 400px;">Description de la balise</div></td>                              
                                        </tr>
                                        <tr>
                                            <td><div class="texte_calendrier">'.$indice["indice"].'</div></td>
                                            <td><div style="display: flex;justify-content: center;"><img src="images/cube description inconnu.png" alt="description inconnu"/></div></td>

                                        <tr>
                                    </table> <br> <br>';
                            } 

                            if(isset($trouvée))
                            {   
                                echo '  <h1>Balises trouvées</h1>
                                        <table>
                                        <tr>
                                            <td><div class="titre_calendrier" style="width: 400px;">Indice de la balise</div></td>
                                            <td><div class="titre_calendrier" style="width: 400px;">Description de la balise</div></td>                              
                                        </tr>';
                                foreach ($trouvée as $key => $value) 
                                {
                                    echo '
                                        <tr>
                                            <td><div class="texte_calendrier">'.$value["indice"].'</div></td>
                                            <td><div class="texte_calendrier">'.$value["description"].'</div></td>
                                        <tr>';
                                    
                                }
                                echo '</table>';
                            }
                            

                            ?>
                            </div>
                            <div id="tabs-1">
                    <?php }else{echo "<article>";} ?>
                            <h1>Jeu de piste</h1>
                            <p>Mines'terstellar vous propose un jeu de piste géant à travers la ME et les lieux que nous cotoyons à Saint-Étienne. Il fait partie du fil rouge Mines'terstellar et vous apportera donc des points pour gagner un des cadeaux ( pour plus d'info :<a href="home_jeux_s1.php">cliquez ici</a> )<br>
                            <br>
                            <u><strong>Régles du jeu :</strong></u> <br><br>
                            Dans l'onglet jeu de piste du site vous trouverez un indice qui vous menera à une balise placée à la ME, dans les batiments de l'école ou dans certain lieux connus de sainté.<br><br>
                            Une fois la balise trouvée, deux choix s'offrent à vous :<br>
                            - flasher le QRcode qui s'y trouve.<br>
                            ou<br>
                            - noter le code à 6 chiffres qui y est inscrit puis le retranscrir sur le site dans l'onglet jeu de piste.<br><br>
                            Un message s'affichera alors, il vous expliquera si vous avez, ou non, trouvé la balise correspondant à votre indice.<br>
                            Si c'est le cas, un autre indice vous est donné aléatoirement parmis les balises qu'il vous reste à trouver.<br>
                            <br>
                            <strong><u>Bonne chasse !</u></strong>
                            </p>
                    <?php if (isset($_SESSION['clef']))
                    { ?>                            
                            </div>
                </div>
                    <?php }else{echo "</article>";} 

            }else{

                ?>
                <div class='image_bandeau'>
                    <img src="images/bandeau crypte.jpg" alt="bandeau_galerie" />
                </div>
            <?php

                        
                if (isset($_SESSION['clef']))
                    { ?>
                        <div id="tabs">
                            <ul>
                                <li><a href="#tabs-0"><div class="titre_onglet"><?php echo crypter2("Carnet de route"); ?></div></a></li>
                                <li><a href="#tabs-1"><div class="titre_onglet"><?php echo crypter2("Règles du jeu"); ?></div></a></li>
                            </ul> 
                            <div id="tabs-0">
                            <?php
                            if (isset($message))
                            {
                                echo "<article><h1>".crypter2($message)."</h1></article>";
                            }

                            if(isset($non_trouvée) OR isset($indice))
                            { ?>
                                <form action="home_jdp.php" method="post">
                                    <h1><?php echo crypter2("Vous  avez  trouvé  la prochaine balise ?"); ?></h1>
                                    <label for="try_code"><?php echo crypter("Insérer le code de la balise :"); ?></label><input type='text' name='try_code' id ="try_code" size='40' ><br/>

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="F(éà§p\ " >
                                    </div>
                                </form>
                             <?php }

                            if (isset($indice))
                            {
                                echo '<table>
                                        <tr>
                                            <td><div class="titre_calendrier" style="width: 400px;"><?php echo crypter2("Indice menant à la prochaine balise"); ?></div></td>
                                            <td><div class="titre_calendrier" style="width: 400px;"><?php echo crypter2("Description de la balise"); ?></div></td>                              
                                        </tr>
                                        <tr>
                                            <td><div class="texte_calendrier">'.crypter($indice["indice"]).'</div></td>
                                            <td><div style="display: flex;justify-content: center;"><img src="images/cube description inconnu.png" alt="description inconnu"/></div></td>

                                        <tr>
                                    </table> <br> <br>';
                            } 

                            if(isset($trouvée))
                            {   
                                echo '  <h1><?php echo crypter2("Balises trouvées"); ?></h1>
                                        <table>
                                        <tr>
                                            <td><div class="titre_calendrier" style="width: 400px;"><?php echo crypter2("Indice de la balise"); ?></div></td>
                                            <td><div class="titre_calendrier" style="width: 400px;"><?php echo crypter2("Description de la balise"); ?></div></td>                              
                                        </tr>';
                                foreach ($trouvée as $key => $value) 
                                {
                                    echo '
                                        <tr>
                                            <td><div class="texte_calendrier">'.crypter($value["indice"]).'</div></td>
                                            <td><div class="texte_calendrier">'.crypter($value["description"]).'</div></td>
                                        <tr>';
                                    
                                }
                                echo '</table>';
                            }
                            

                            ?>
                            </div>
                            <div id="tabs-1">
                    <?php }else{echo "<article>";} ?>
                            <h1><?php echo crypter2("Jeu de piste"); ?> </h1>
                            <p>
                            <?php echo crypter("Laïus d'introduction.<br>
                            <br>
                            <u><strong>Régles du jeu :</strong></u> bla bla <br>
                            blablabla"); ?>
                            </p>
                    <?php if (isset($_SESSION['clef']))
                    { ?>                            
                            </div>
                </div>
                    <?php }else{echo "</article>";} 
            }    ?>                   

            

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