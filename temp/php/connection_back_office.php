<?php
require_once("CAS.php");

// -------------------------------- CASIFICATION de l'application --------------------------------
phpCAS::setDebug();
phpCAS::client(CAS_VERSION_2_0, "cas.emse.fr", 443, "");
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();
// -------------------------------- CASIFICATION de l'application --------------------------------



//L'utilisateur a choisi de se déconnecter via un bouton qui a réécrit l'URL en faisant passer le paramètre mode a true
if (isset($_GET['mode']) && $_GET['mode'] == "deco"){
    session_unset();        // On détruit les variables de session si vous les utilisez
    phpCAS::logout();    // On se déconnecte CAS
}
try{
    $bdd = new PDO('mysql:host=localhost;dbname=mobinfo;charset=utf8', "mobinfo", "SDByUkH4dXE9kGlc", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

?>