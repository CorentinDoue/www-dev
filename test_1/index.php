<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Mon super site</title>

    </head>
 

    <body>

 

    <!-- L'en-tête -->

    

    <header>

       

    </header>

    

    <!-- Le menu -->

    
    <?php include("menus.php"); ?>
    

    <!-- Le corps -->

    

    <div id="corps">

        <h1>Mon super site</h1>

        

        <p>

            Bienvenue sur mon super site !<br />

            Vous allez adorer ici, c'est un site génial qui va parler de... euh... Je cherche encore un peu le thème de mon site. :-D

        </p>
        <p>

    Cette page ne contient que du HTML.<br />

    Veuillez taper votre prénom :

</p>


<form action="cible.php" method="post">

<p>

    <input type="text" name="prenom" />

    <input type="submit" value="Valider" />

</p>
<textarea name="message" rows="8" cols="45">

Votre message ici.

</textarea>
<select name="choix">

    <option value="choix1">Choix 1</option>

    <option value="choix2">Choix 2</option>

    <option value="choix3">Choix 3</option>

    <option value="choix4">Choix 4</option>

</select>
<input type="checkbox" name="case" id="case" /> <label for="case">Ma case à cocher</label>
<br>Aimez-vous les frites ?

<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>

<input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
<input type="hidden" name="pseudo" value="Mateo21" />
</form>
<form action="cible.php" method="post" enctype="multipart/form-data">

        <p>

                Formulaire d'envoi de fichier :<br />

                <input type="file" name="monfichier" /><br />

                <input type="submit" value="Envoyer le fichier" />

        </p>

</form>


 

        </form>
        <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>
        <p><?php

        $age_du_visiteur = 17;

        echo "Le visiteur a $age_du_visiteur ans";

        ?></p>

        <p><?php

$age_du_visiteur = 25;

echo 'Le visiteur a ' . $age_du_visiteur . ' ans';

?></p>
<?php

function DireBonjour($nom)

{

    echo 'Bonjour ' . $nom . ' !<br />';

}


DireBonjour('Marie');

DireBonjour('Patrice');

DireBonjour('Edouard');

DireBonjour('Pascale');

DireBonjour('François');

DireBonjour('Benoît');

DireBonjour('Père Noël');

?>
<br><?php

$prenoms[0] = 'François';

$prenoms[1] = 'Michel';

$prenoms[] = 'Nicole';
foreach($prenoms as $element)

{

    echo $element . '<br />';
}
echo '<pre>';

print_r($prenoms);

echo '</pre>';
?>
<br><?php

$coordonnees = array (

    'prenom' => 'François',

    'nom' => 'Dupont',

    'adresse' => '3 Rue du Paradis',

    'ville' => 'Marseille');


foreach($coordonnees as $cle => $element)

{

    echo '[' . $cle . '] vaut ' . $element . '<br />';

}

?>
    <p>
        <?php 
        $quotient=7/2;
        $reste = 7%2;
        echo "7/2 =".$quotient."*2+".$reste;
        ?>
    </p>
    </div>
    <?php

$age = 8;

 

if ($age <= 12) // SI l'âge est inférieur ou égal à 12

{

    echo "Salut gamin ! Bienvenue sur mon site !<br />";

    $autorisation_entrer = true;

}

else // SINON

{

    echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";

    $autorisation_entrer = false;

}

 

if ($autorisation_entrer)
{
    echo "Bienvenue petit nouveau. :o)";
}
else
{
    echo "T'as pas le droit d'entrer !";
}

?>
</br>
<?php
$variable=23;
if ($variable == 23)

{

?>

<strong>Bravo !</strong> Vous avez trouvé le nombre mystère !

<?php

}

?>
</br><?php

$note = 20;


switch ($note) // on indique sur quelle variable on travaille

{ 

    case 0: // dans le cas où $note vaut 0

        echo "Tu es vraiment un gros nul !!!";

    break;

    

    case 5: // dans le cas où $note vaut 5

        echo "Tu es très mauvais";

    break;

    

    case 7: // dans le cas où $note vaut 7

        echo "Tu es mauvais";

    break;

    

    case 10: // etc. etc.

        echo "Tu as pile poil la moyenne, c'est un peu juste…";

    break;

    

    case 12:

        echo "Tu es assez bon";

    break;

    

    case 16:

        echo "Tu te débrouilles très bien !";

    break;

    

    case 20:

        echo "Excellent travail, c'est parfait !";

    break;

    

    default:

        echo "Désolé, je n'ai pas de message à afficher pour cette note";

}

?>
<?php

$age = 24;


$majeur = ($age >= 18) ? true : false;

?>
</br><?php

$phrase = 'Bonjour tout le monde ! Je suis une phrase !';

$longueur = strlen($phrase);

 

 

echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br />' . $phrase;

?>

 </br><?php

$nombre_de_lignes = 1;


while ($nombre_de_lignes <= 100)

{

    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';

    $nombre_de_lignes++;

}

?><?php
for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
}
?>   

    <!-- Le pied de page -->

    

    <?php include("footers.php"); ?>

    

</body>

</html>