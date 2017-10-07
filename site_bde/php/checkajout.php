<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte

	
	
	if(isset($_SESSION["id_admin"]) && isset($_POST["send"])) {
			
			if (!isset($_POST["login"]) || $_POST["login"] == "") {
				$erreurs[] = "Veuillez renseigner le login.";
			}
			if (!isset($_POST["montant"]) || $_POST["montant"] == "") {
				$erreurs[] = "Veuillez renseigner le montant.";
			}
			if (!isset($_POST["motif"]) || $_POST["motif"] == "") {
				$erreurs[] = "Veuillez renseigner le motif.";
			}
			if (!isset($_POST["cat"]) || $_POST["cat"] == "Sélectionner...") {
				$erreurs[] = "Veuillez renseigner le motif.";
			}
			
					$_SESSION["login_ajout"]=$_POST["login"];
					$_SESSION["motif_ajout"]=$_POST["motif"];
					$_SESSION["montant_ajout"]=$_POST["montant"];
					$_SESSION["cat_ajout"]=$_POST["cat"];
					
			if (empty($erreurs)) {
				$_POST["montant"]=str_replace(",",".",$_POST["montant"]);
				//echo($_POST["montant"]);
				include ("connexion.php");
                
                $req = $bdd -> prepare("SELECT montant_operation, date_operation FROM user, operation WHERE id_user_retire=id_user AND login_user=? AND  is_retrait=0 AND TIMESTAMPDIFF(MINUTE,date_operation,NOW())<5 AND montant_operation=?");
				$req -> execute(array($_POST["login"],$_POST["montant"]));
                $donnees = $req -> fetch();
				
                
				if($donnees && (!isset($_GET['ope'])))
				{

					header("location: ../index.php?page=verifajout" ); 
				}
				else
				{
					$req = $bdd -> prepare("SELECT id_user,solde_user FROM user WHERE login_user=?");
					$req -> execute(array($_POST["login"]));
                    $donnees = $req -> fetch();
                    
					if($donnees){
					$req2 = $bdd -> prepare("INSERT INTO operation(is_retrait, id_user_retire, id_user_retirant, montant_operation, date_operation, motif_operation, categorie_operation) VALUES(0, ?, ?, ?, NOW(), ?, ?)");
					$req2 -> execute(array($donnees["id_user"], $_SESSION["id"], $_POST["montant"], $_POST["motif"], $_POST["cat"]));
                    
					$req2 = $bdd -> prepare("UPDATE user SET solde_user=? WHERE id_user=?");
					$req2 -> execute(array(($donnees["solde_user"]+$_POST["montant"]), $donnees["id_user"]));
					
					header("location: ../index.php?page=ajout&ope=ok" );
					}else{
					header("location: ../index.php?page=ajout&ope=wronglogin" ); 
					}
					
				}
			}
			else
			{
			header("location: ../index.php?page=ajout&ope=champvide" );
			}
	}
	else
	{
	echo("Access denied");
	}	
		
	
		?>