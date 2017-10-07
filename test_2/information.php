<?php

session_start(); // On démarre la session AVANT toute chose

?>

 

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Titre de ma page</title>

    </head>

    <body>

 

    <p>Re-bonjour !</p>

 

    <p>

        Je me souviens de toi ! Tu t'appelles <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> !<br />

        Et ton âge hummm... Tu as <?php echo $_SESSION['age']; ?> ans, c'est ça ? :-D

    </p>

    

    </body>

</html>