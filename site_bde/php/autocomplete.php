<?php
include ("connexion.php");

$term = $_GET['text'];
$req = $bdd->prepare("SELECT login_user FROM user WHERE login_user LIKE ? ORDER BY login_user");
$req -> execute(array("%".$term."%"));

$list = ""; // on créé une liste sous forme de texte

while($donnee = $req->fetch()) // on effectue une boucle pour obtenir les données
{
    $list = $list.$donnee['login_user']."|"; // et on ajoute celles-ci à notre tableau
}

echo $list;

?>