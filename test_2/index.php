<?php

// On démarre la session AVANT d'écrire du code HTML

session_start();
//session_destroy()

 

// On s'amuse à créer quelques variables de session dans $_SESSION

//ouverture de la base de donée test 

error_reporting(E_ALL);

?>

 

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Home</title>

    </head>

    <body>

    <?php 
    if (isset($_POST['prenom'])AND($_POST['prenom']!=NULL))
    {
        $_SESSION['prenom'] = $_POST['prenom'];

    
    }
    if (isset($_POST['nom'])AND($_POST['nom']!=NULL))
    {
  
    $_SESSION['nom'] = $_POST['nom'];

    }
    if (isset($_POST['age'])AND($_POST['age']!=0))
    {
    $_SESSION['age'] = $_POST['age'];
    }


    if (isset($_SESSION['prenom'],$_SESSION['nom'],$_SESSION['age'])) 
    {
    ?>
        <p>

        Salut <?php echo $_SESSION['prenom']; ?> !<br />

        Tu es à l'accueil de mon site (index.php). Tu veux aller sur une autre page ?

        </p>

    

        <p>

        <a href="information.php">Lien vers mapage.php</a><br />

        <a href="information.php">Lien vers monscript.php</a><br />

        <a href="information.php">Lien vers informations.php</a>

        </p>
    <?php
    }
    else 
    {
    ?>
    <p>
    Veuillez vous identifiez :
    <form action="index.php" method="post">
    Prénom : <?php 
    if (isset($_SESSION['prenom']))
       {echo $_SESSION['prenom'];}
   else
       {echo '<input type="text" name="prenom" />';} ?>
    <br>Nom : <?php 
    if (isset($_SESSION['nom']))
       {echo $_SESSION['nom'];}
   else
       {echo '<input type="text" name="nom" />';} ?>
    
   <br>Age: <?php 
    if (isset($_SESSION['age']))
       {echo $_SESSION['age'];}
   else
       {echo '<select name="age"/>'; 
    
    for ($i = 0; $i <= 100; $i++)
{
    echo '<option value='.$i.'>'.$i.'</option>';
}

    echo '</select>';}
    ?>

     ans<br><input type="submit" value="Valider" />
    </form>

    </p>
    <?php
    }
    ?>

    </body>

</html>