<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte
	// On efface toutes les variables de la session
	$_SESSION = array();
    
    include "functions.php";

	if(!isset($_SESSION["login"]) && isset($_POST["send"])) {

			if (isset($_SESSION["login"]) || $_POST["login"] == "") {
				$erreurs[] = "Veuillez renseigner le login.";
			}
			if (!isset($_POST["pwd"]) || $_POST["pwd"] == "") {
				$erreurs[] = "Veuillez renseigner le mot de passe.";
			}
			if (empty($erreurs)) {
                
                include ("connexion.php");
                
                $req = $bdd -> prepare("SELECT id_user, pwd_user FROM user WHERE login_user=?");
				$req -> execute(array($_POST["login"]));
				$donnees = $req -> fetch();
                
                
				if(!isset($donnees["id_user"]) || !user_authentication($bdd, $_POST["login"], $_POST["pwd"]))
				{
					$erreurs[] = "Couple login / mot de passe incorrect.";
					$est_dans_la_base = false;
				}
				else
				{
                    
                    
					$_SESSION["id"]=$donnees["id_user"];
					$est_dans_la_base = true;
					
					//On vérifie si l'utilisateur est un administrateur
					$req = $bdd -> prepare("SELECT id_admin FROM admin WHERE id_user=?");
				    $req -> execute(array($donnees["id_user"]));
				    $donnees2 = $req -> fetch();
					
					
					if($donnees2){
						$_SESSION["id_admin"]=$donnees2["id_admin"];
						
						//On vérifie si l'administrateur est un super administrateur
						$req = $bdd -> prepare("SELECT id_super_admin FROM super_admin WHERE id_admin=?");
				        $req -> execute(array($donnees2["id_admin"]));
				        $donnees3 = $req -> fetch();
												
						if($donnees3){
						$_SESSION["id_super_admin"]=$donnees3["id_super_admin"];
						}
					}else{
					
						//On vérifie si l'administrateur est un administrateur temporaire
						$req = $bdd -> prepare("SELECT id_admin_tempo FROM admin_tempo WHERE dbt<NOW() AND fin>NOW() AND id_user=?");
				        $req -> execute(array($donnees["id_user"]));
				        $donnees4 = $req -> fetch();
                        
						if($donnees4){
						$_SESSION["id_admin_tempo"]=$donnees4["id_admin_tempo"];
						}
					
					}
				}
			}
		}
		
		
		if(isset($_SESSION["id"])) {
			header("location: ../index.php" ); 
		}else{
			header("location: ../index.php?err=1" ); 
		}
		
		?>
