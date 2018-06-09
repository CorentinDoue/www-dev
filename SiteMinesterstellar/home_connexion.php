<?php include("start.php");
if (isset($_POST['mail'])AND($_POST['mail']!=NULL)AND isset($_POST['mdp'])AND($_POST['mdp']!=NULL))
    {           //préparer une requète pour l'utilisé avec des variables
                $req = $bdd->prepare('SELECT clef, Prenom, Nom, Mail, Mdp, Droits FROM user_minesterstellar WHERE Mail = ?');
                $req->execute(array($_POST['mail']));
                $compteur=0;
                while ($donnees = $req->fetch())
                {   
                    if ($donnees['Mdp']==$_POST['mdp'])
                    {
                        $_SESSION['clef'] = $donnees['clef'];
                        $_SESSION['prenom'] = $donnees['Prenom'];
                        $_SESSION['nom'] = $donnees['Nom'];
                        $_SESSION['mail'] = $donnees['Mail'];
                        $_SESSION['droits'] = $donnees['Droits'];
                        $_SESSION['redirected'] = false;
                        if ($_POST['cookie']==true)
                        {
                            setcookie('mail', $_SESSION['mail'], time() + 365*24*3600, null, null, false, true); 
                            setcookie('mdp', $_POST['mdp'], time() + 365*24*3600, null, null, false, true);
                        }
                        header('Location: index.php');
                        exit();                        
                    }else{
                        $message="mot de passe incorrect";
                        if (isset($_POST['mdp']))
                            {$_POST['mdp']=NULL;}
                    }
                    $compteur=$compteur+1;                        
                }
                if ($compteur==0)
                {
                    $message="email non reconnu";
                } 
                $req->closeCursor();
    } ?>
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

        <title>Connexion</title>

    </head>
 

    <body>
    	
    	<?php include("header_connexion.php"); ?> 

        
        <div class='corps'>
        <div class='accueil'>
            <div class='image_bandeau'>
                <img src="images/bandeau_connexion.jpg" alt="bandeau_connexion" />
            </div>
            
            <div class="formulaire"> 
                <div class="error">
                    <?php if (isset($message))
                        {
                            echo $message ;
                        } 
                    ?>  
                </div>
                <form action="home_connexion.php" method="post">
                    <?php if (isset($_POST['mail'])AND($_POST['mail']!=NULL))
                        {?> 

                        <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php echo htmlspecialchars($_POST['mail'], ENT_QUOTES); ?>" size="40" > <br />
                        
                        <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" size='40' autofocus > <br />
                    <?php }else{ ?>
                        <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" placeholder="prenom.nom@etu.emse.fr" size="40" autofocus  > <br />
                        <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" size='40'  > <br />
                    <?php } ?>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div><input type="checkbox" name="cookie" id="cookie" checked /><label for="cookie">Se souvenir de moi</label></div>
                        <input type="submit" value="Connexion" >
                    </div>
                </form>
            </div>
            
            <article>
                <p>
                Pas encore enregistré ? Inscrivez-vous en 2 minutes
                </p>

                <a href="home_inscription.php">
                <div class="lien_header" style="border-radius: 10px; justify-content: center;">
                    <div class="titre_bouton">
                    Inscription
                    </div>
                </div>
                </a>
            </article>
        </div>
        </div>

            
        


        
    	
        <?php include("footer.php"); ?>
    </body>
</html>