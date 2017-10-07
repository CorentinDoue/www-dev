<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte

	
	
	if(isset($_SESSION["id"]) && isset($_POST["send"]) && isset($_SESSION["id_event"])) {
        
        include ("connexion.php");
        
        $req = $bdd -> prepare("INSERT INTO participe VALUES (NULL, ?, ?, NOW())"); // on récupère l'événement le plus récent
        $req -> execute(array($_SESSION["id"], $_SESSION["id_event"]));
        
        header("Location: ../index.php?page=shotgun");
    }
	else
	{
	echo("Access denied");
	}	
		
	
?>