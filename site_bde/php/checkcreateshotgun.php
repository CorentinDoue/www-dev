<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte

	if(isset($_SESSION["id_super_admin"]) && (isset($_POST["send"]) || isset($_POST["delete"]))) {
        
        include ("connexion.php");

        if(isset($_POST["send"])){
            
            try {
                $datedeb = new DateTime($_POST["datedeb"], new DateTimeZone('Europe/Paris'));
            } catch (Exception $e) {
                echo $e->getMessage();
                exit(1);
            }
            
            try {
                $datefin = new DateTime($_POST["datefin"], new DateTimeZone('Europe/Paris'));
            } catch (Exception $e) {
                echo $e->getMessage();
                exit(1);
            }
            
        
            $req = $bdd -> prepare("INSERT INTO event VALUES (NULL, ?, ?, ?, ?, 1, 0)"); // on récupère l'événement le plus récent
            $req -> execute(array($datedeb->format('Y-m-d H:i:s'), $datefin->format('Y-m-d H:i:s'), $_POST["nom"], $_POST["descr"]));
            
        }
        
        if(isset($_POST["delete"])){
        
            $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun=1"); // on récupère l'événement le plus récent
            $req -> execute(array());
            $donnees = $req -> fetch();
            
            $req = $bdd -> prepare("DELETE FROM event WHERE deadline_event = ?"); // on récupère l'événement le plus récent
            $req -> execute(array($donnees["max"]));
        }
        
        header("Location: ../index.php?page=create_event&ope=ok");
        
    }
	else
	{
	echo("Access denied");
	}	
		
	
?>