<?php

// On démarre la session AVANT d'écrire du code HTML

include("start.php"); 

if (isset($_GET['continue']) AND $_GET['continue']==true )
{
    
    header('Location: index.php');
    exit();

}

$new=false;

if (isset($_POST['prenom'])AND($_POST['prenom']!=NULL) AND isset($_POST['nom'])AND($_POST['nom']!=NULL) AND isset($_POST['mail'])AND($_POST['mail']!=NULL) AND isset($_POST['mdp'])AND($_POST['mdp']!=NULL) AND isset($_POST['mdp2'])AND($_POST['mdp2']!=NULL))
{
    if ($_POST['mdp']==$_POST['mdp2'])
    {
        $req = $bdd->prepare('SELECT * FROM user WHERE Mail = ?');

        $req->execute(array($_POST['mail']));
        $compteur=0;
        while ($donnees = $req->fetch())
        {   
            $message="Un compte avec cet email existe déjà, si vous ne vous souvenez plus de votre mot de passe contactez le bureau Mines'terstellar.";
            $compteur=$compteur+1;   
        }
        if ($compteur==0)
        {   
            $req = $bdd->prepare('INSERT INTO user (Prenom, Nom, Mail, Mdp) VALUES (:prenom, :nom, :mail, :mdp )');
            $req->execute(array(
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'mail' => $_POST['mail'],
                'mdp' => $_POST['mdp'],
                ));
            $new=true;

            if (isset($_POST['cookie']) AND $_POST['cookie']==true)
            {
                setcookie('mail', $_POST['mail'], time() + 365*24*3600, null, null, false, true); 
                setcookie('mdp', $_POST['mdp'], time() + 365*24*3600, null, null, false, true);
            }
        }             
    }else{ 
        $message="Les mots de passe doivent être identiques";
    }
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

        <title>Inscription</title>


    </head>
 

    <body>
    	
    	<?php include("header_connexion.php"); ?> 

        
        <div class='corps'>
        <div class='accueil'>
            <div class='image_bandeau'>
                <img src="images/bandeau_connexion.jpg" alt="bandeau_connexion" />
            </div>
            
            <?php if ($new==true)
            { ?>
                <article>
                    <h1>Inscription réussie</h1>
                    <p>
                    <?php echo "Bienvenue ".$_POST['prenom'].". Tu peux désormais accéder à toutes les fonctionalités du site."; ?>
                    </p>
                    <a href="home_inscription.php?continue=true">
                    <div class="lien_header" style="border-radius: 10px; justify-content: center;">
                        <div class="titre_bouton">
                        Continuer
                        </div>
                    </div>
                    </a>
                </article>

            <?php }else{ ?>

            <div class="formulaire"> 
                <h1>Créer votre compte</h1>
                <div class="error">
                    <?php if (isset($message))
                        {
                            echo $message ;
                        } 
                    ?>  
                </div>
                <form action="home_inscription.php" method="post">
                    <?php if (isset($_POST['mdp'])AND($_POST['mdp']!=NULL))
                        {?> 

                        <label for="prenom">Prénom :</label> <input type="text" name="prenom" id ="prenom" value= "<?php  if (isset($_POST['prenom'])) {echo htmlspecialchars($_POST['prenom'], ENT_QUOTES);} ?>" size="40" > <br />
                        
                        <label for="nom">Nom :</label> <input type='text' name='nom' id ="nom" value= "<?php  if (isset($_POST['nom'])) {echo htmlspecialchars($_POST['nom'], ENT_QUOTES);} ?>" size='40'  > <br />

                        <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php  if (isset($_POST['mail'])) {echo htmlspecialchars($_POST['mail'], ENT_QUOTES);} ?>" size="40" > <br />
                        
                        <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" value= "<?php  if (isset($_POST['mdp'])) {echo htmlspecialchars($_POST['mdp'], ENT_QUOTES);} ?>" size='40' > <br />

                        <label for="mdp2">Retappez votre mot de passe :</label> <input type='password' name='mdp2' id ="mdp2" value= "<?php  if (isset($_POST['mdp2'])) {echo htmlspecialchars($_POST['mdp2'], ENT_QUOTES);} ?>" size='40' autofocus > <br />

                    <?php }else{ if (isset($_POST['mail'])AND($_POST['mail']!=NULL))
                        { ?>
                            <label for="prenom">Prénom :</label> <input type="text" name="prenom" id ="prenom" value= "<?php  if (isset($_POST['prenom'])) {echo htmlspecialchars($_POST['prenom'], ENT_QUOTES);} ?>" size="40" > <br />
                            
                            <label for="nom">Nom :</label> <input type='text' name='nom' id ="nom" value= "<?php  if (isset($_POST['nom'])) {echo htmlspecialchars($_POST['nom'], ENT_QUOTES);} ?>" size='40' > <br />

                            <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php  if (isset($_POST['mail'])) {echo htmlspecialchars($_POST['mail'], ENT_QUOTES);} ?>" size="40"  > <br />
                            
                            <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" value= "<?php  if (isset($_POST['mdp'])) {echo htmlspecialchars($_POST['mdp'], ENT_QUOTES);} ?>" size='40' autofocus > <br />

                            <label for="mdp2">Retappez votre mot de passe :</label> <input type='password' name='mdp2' id ="mdp2" value= "<?php  if (isset($_POST['mdp2'])) {echo htmlspecialchars($_POST['mdp2'], ENT_QUOTES);} ?>" size='40' > <br />

                        <?php }else{ if (isset($_POST['nom'])AND($_POST['nom']!=NULL))
                            { ?>
                                <label for="prenom">Prénom :</label> <input type="text" name="prenom" id ="prenom" value= "<?php  if (isset($_POST['prenom'])) {echo htmlspecialchars($_POST['prenom'], ENT_QUOTES);} ?>" size="40" > <br />
                                
                                <label for="nom">Nom :</label> <input type='text' name='nom' id ="nom" value= "<?php  if (isset($_POST['nom'])) {echo htmlspecialchars($_POST['nom'], ENT_QUOTES);} ?>" size='40' > <br />

                                <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php  if (isset($_POST['mail'])) {echo htmlspecialchars($_POST['mail'], ENT_QUOTES);} ?>" size="40"  autofocus > <br />
                                
                                <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" value= "<?php  if (isset($_POST['mdp'])) {echo htmlspecialchars($_POST['mdp'], ENT_QUOTES);} ?>" size='40'  > <br />

                                <label for="mdp2">Retappez votre mot de passe :</label> <input type='password' name='mdp2' id ="mdp2" value= "<?php  if (isset($_POST['mdp2'])) {echo htmlspecialchars($_POST['mdp2'], ENT_QUOTES);} ?>" size='40' > <br />

                                <?php }else{ if (isset($_POST['prenom'])AND($_POST['prenom']!=NULL))
                                    { ?>
                                        <label for="prenom">Prénom :</label> <input type="text" name="prenom" id ="prenom" value= "<?php  if (isset($_POST['prenom'])) {echo htmlspecialchars($_POST['prenom'], ENT_QUOTES);} ?>" size="40" > <br />
                                        
                                        <label for="nom">Nom :</label> <input type='text' name='nom' id ="nom" value= "<?php  if (isset($_POST['nom'])) {echo htmlspecialchars($_POST['nom'], ENT_QUOTES);} ?>" size='40' autofocus > <br />

                                        <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php  if (isset($_POST['mail'])) {echo htmlspecialchars($_POST['mail'], ENT_QUOTES);} ?>" size="40"  > <br />
                                        
                                        <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" value= "<?php  if (isset($_POST['mdp'])) {echo htmlspecialchars($_POST['mdp'], ENT_QUOTES);} ?>" size='40'  > <br />

                                        <label for="mdp2">Retappez votre mot de passe :</label> <input type='password' name='mdp2' id ="mdp2" value= "<?php  if (isset($_POST['mdp2'])) {echo htmlspecialchars($_POST['mdp2'], ENT_QUOTES);} ?>" size='40'  > <br />

                                        <?php }else{ ?>
                                            <label for="prenom">Prénom :</label> <input type="text" name="prenom" id ="prenom" value= "<?php  if (isset($_POST['prenom'])) {echo htmlspecialchars($_POST['prenom'], ENT_QUOTES);} ?>" size="40" autofocus > <br />
                                            
                                            <label for="nom">Nom :</label> <input type='text' name='nom' id ="nom" value= "<?php  if (isset($_POST['nom'])) {echo htmlspecialchars($_POST['nom'], ENT_QUOTES);} ?>" size='40' > <br />

                                            <label for="mail">Adresse mail :</label> <input type="email" name="mail" id ="mail" value= "<?php  if (isset($_POST['mail'])) {echo htmlspecialchars($_POST['mail'], ENT_QUOTES);} ?>" size="40"  > <br />
                                            
                                            <label for="mdp">Mot de passe :</label> <input type='password' name='mdp' id ="mdp" value= "<?php  if (isset($_POST['mdp'])) {echo htmlspecialchars($_POST['mdp'], ENT_QUOTES);} ?>" size='40'  > <br />

                                            <label for="mdp2">Retappez votre mot de passe :</label> <input type='password' name='mdp2' id ="mdp2" value= "<?php  if (isset($_POST['mdp2'])) {echo htmlspecialchars($_POST['mdp2'], ENT_QUOTES);} ?>" size='40'  > <br />

                    <?php } } } }  ?>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div><input type="checkbox" name="cookie" id="cookie" checked /><label for="cookie">Se souvenir de moi</label></div>
                        <input type="submit" value="Inscription" >
                    </div>
                </form>
            </div>
            <?php } ?>
            
        </div>
        </div> 
        <?php include("footer.php"); ?>
    </body>
</html>