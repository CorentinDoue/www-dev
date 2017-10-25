<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', "Coco", "0386479877", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
}

// try{
//     $bdd = new PDO('mysql:host=https://webeleves.emse.fr/;dbname=bde;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//     $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
// }
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

$_SESSION["phpCAS"]=Array (
	"user" => "corentin.doue",
	"attributes" => Array (
		"uid" => "corentin.doue",
		"mail" => "corentin.doue@etu.emse.fr",
		"displayName" => "Corentin DOUE",
		"givenName" => "Corentin",
		"sn" => "DOUE"
	)
);
if (!isset($_SESSION["id_cercle"]))
{
	$req = $bdd -> prepare("SELECT id_user, droit_cercle FROM user WHERE login_user=?");
	$req -> execute(array($_SESSION['phpCAS']['user']));
	$donnees = $req -> fetch();


	if(isset($donnees["id_user"]) AND $donnees["droit_cercle"]!="aucun")
	{

		$rep = $bdd->prepare('UPDATE user SET prenom=:prenom, nom=:nom WHERE id_user=:ID');
        $rep->execute(array(
            'ID' => $donnees["id_user"],
            'prenom' => $_SESSION['phpCAS']['attributes']["givenName"],
            'nom' => $_SESSION['phpCAS']['attributes']["sn"]
            ));

		$_SESSION["id_cercle"]=$donnees["id_user"];
		$_SESSION["prenom"]=$_SESSION['phpCAS']['attributes']["givenName"];
		$_SESSION["nom"]=$_SESSION['phpCAS']['attributes']["sn"];
		$_SESSION["droit"]=$donnees["droit_cercle"];


	}else{
		header("location: index.php?erreur=Connexion_impossible" );
	}
}
