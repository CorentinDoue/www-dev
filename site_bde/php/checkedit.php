<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte
	

	if(isset($_SESSION["id_super_admin"]) && isset($_POST["send"])) {
		//On supprime tout de la base : admin tempo, admin et/ou super admin
		include ("connexion.php");
        
        $req = $bdd -> prepare("SELECT id_admin FROM admin,user WHERE user.id_user=? AND user.id_user=admin.id_user");
        $req -> execute(array($_POST["id"]));
		$donnees = $req -> fetch();
        
		if($donnees){
			$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
			
            $req = $bdd -> prepare("DELETE FROM admin WHERE id_user=?");
            $req -> execute(array($_POST["id"]));
			
			$req = $bdd -> prepare("DELETE FROM super_admin WHERE id_admin=?");
            $req -> execute(array($_POST[$donnees["id_admin"]]));
		}
			$req = $bdd -> prepare("DELETE FROM admin_tempo WHERE id_user=?");
            $req -> execute(array($_POST["id"]));
			
		//Ensuite on remplit la base avec les nouveaux niveaux d'autorisation	
		switch($_POST["auto"]){
		 
		case "std":
			break;
		case "adtmp":
			$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
			$req = $bdd -> prepare("INSERT INTO admin_tempo(id_user, dbt, fin) VALUES(?, ?, ?)");
            $req -> execute(array($_POST["id"], $_POST["dbt"], $_POST["fin"]));    
			break;
                
		case "ad":
			$req = $bdd -> prepare("INSERT INTO admin(id_user) VALUES(?)");
            $req -> execute(array($_POST["id"]));
			break;
		case "superadmin":
			$req = $bdd -> prepare("INSERT INTO admin(id_user) VALUES(?)");
            $req -> execute(array($_POST["id"]));
			
            $req = $bdd -> prepare("SELECT id_admin FROM admin,user WHERE user.id_user=? AND user.id_user=admin.id_user");
            $req -> execute(array($_POST["id"]));
            $donnees = $req -> fetch();
            
            $req = $bdd -> prepare("INSERT INTO super_admin(id_admin) VALUES(?);");
            $req -> execute(array($donnees["id_admin"]));
			break;
		}
		//Si l'utilisateur vient de modifier ses propres droits (ce qui en soit est bizarre...) on le déconnecte pour l'obliger à se reconnecter
		//Gniark Gniark Gniark !
		if($_POST["id"]==$_SESSION["id"]){
		$_SESSION = array();
		session_destroy();
		}
	//Dans tous les cas, on redirige vers la page de super gestion
	header("location: ../index.php?page=admin" ); 
	}
	else
	{
		echo("Access denied");	
	}
		

		
?>
