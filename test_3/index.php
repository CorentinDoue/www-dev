<?php

// On démarre la session AVANT d'écrire du code HTML

session_start();
//session_destroy()

 

// On s'amuse à créer quelques variables de session dans $_SESSION

//ouverture de la base de donée test 

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}

catch (Exception $e)

{
 die('Erreur : ' . $e->getMessage());
}

?>

 

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Home</title>

    </head>

    <body>
    Source : <br>
    <img src="montagne.jpg" /><br>
    miniature : <br>
    <img src="miniature.php" /><br>
    <?php
    if (isset($_POST['possesseur'])AND($_POST['possesseur']!=NULL)AND isset($_POST['prix_max'])AND($_POST['prix_max']!=NULL))
        {
            //préparer une requète pour l'utilisé avec des variables
        $req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');

        $req->execute(array($_POST['possesseur'], $_POST['prix_max']));


        echo '<ul>';

        while ($donnees = $req->fetch())

        {

        echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';

        }

        echo '</ul>';


        $req->closeCursor();
        }
    else 
        {?>
        <form action="index.php" method="post">
        <?php if (isset($_POST['possesseur'])AND($_POST['possesseur']!=NULL))
            {echo 'Sélectioner le possesseur : <input type="text" name="possesseur" value="$_POST[""possesseur""]" /> <br />';}
        else
            {echo 'Sélectioner le possesseur : <input type="text" name="possesseur"  /> <br />';} 
        ?>
        Sélectioner le prix maximum : <input type="number" name="prix_max" /> <br />
        <input type="submit" value="Valider">
        </form>

        <?php }

    $reponse = $bdd->query('SELECT * FROM jeux_video');

    $reponse = $bdd->query('SELECT ROUND(AVG(prix),2) AS prix_moyen FROM jeux_video');


while ($donnees = $reponse->fetch())

{

    echo "prix moyen : ".$donnees['prix_moyen']."€";

}


$reponse->closeCursor();
/*
    // On ajoute une entrée dans la table jeux_video
    $bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');

   echo 'Le jeu a bien été ajouté !';

    //modifier une entrée

    $nb_modifs = $bdd->exec('UPDATE jeux_video SET prix = \'10\', nbre_joueurs_max=\'32\' WHERE nom=\'Battlefield 1942\'');
    echo $nb_modifs . ' entrées ont été modifiées !';

    $nb_suppr = $bdd->exec('DELETE FROM jeux_video WHERE nom=\'Battlefield 1942\'');
    echo $nb_suppr . ' entrées ont été suprimées !';
*/

    // On affiche chaque entrée une à une

    while ($donnees = $reponse->fetch())

    {

    ?>

    <p>

    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />

    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />

    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>

   </p>

<?php

}


$reponse->closeCursor(); // Termine le traitement de la requête


$reponse = $bdd->query('SELECT nom FROM jeux_video LIMIT 0, 10');


echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';

while ($donnees = $reponse->fetch())

{

    echo $donnees['nom'] . '<br />';

}


$reponse->closeCursor();



?>

    Ceci est du texte

    </body>

</html>