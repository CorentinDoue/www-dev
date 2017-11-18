<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'bde', 'Dd1&aa1&hob1cjp');
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
}catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
//identification via le CAS
require_once("CAS.php");

// -------------------------------- CASIFICATION de l'application --------------------------------
phpCAS::setDebug();
phpCAS::client(CAS_VERSION_2_0, "cas.emse.fr", 443, "");
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();
// -------------------------------- CASIFICATION de l'application --------------------------------



// Connexion a la BDD via l'id du CAS
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
		$_SESSION["droit_cercle"]=$donnees["droit_cercle"];
		
		
	}else{
		header("location: index.php?erreur=Connexion_impossible" );
	}
}
?>