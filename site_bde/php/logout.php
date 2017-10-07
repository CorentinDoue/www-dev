<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte
	// On efface toutes les variables de la session
	$_SESSION = array();
	// Puis on détruit la session
	session_destroy();
	// On renvoie ensuite sur la page de connection
	header("location: ../index.php" ); 
?>