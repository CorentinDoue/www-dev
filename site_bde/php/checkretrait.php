<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte

	
	
	if((isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"]))&& isset($_POST["send"])) {
			
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
			
					$_SESSION["login_retrait"]=$_POST["login"];
					$_SESSION["motif_retrait"]=$_POST["motif"];
					$_SESSION["montant_retrait"]=$_POST["montant"];
					$_SESSION["cat_retrait"]=$_POST["cat"];
					
			if (empty($erreurs)) {
				$_POST["montant"]=str_replace(",",".",$_POST["montant"]);
				
				//$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde'); 
				$base = mysqli_connect('localhost','root','','bde');
				$requete = "SELECT montant_operation, date_operation FROM user, operation WHERE id_user_retire=id_user AND login_user='".$_POST["login"]."' AND  is_retrait='1' AND TIMESTAMPDIFF(MINUTE,date_operation,NOW())<5 AND montant_operation='".$_POST["montant"]."';";
				
				$retour = mysqli_query($base,$requete);
				$donnees = mysqli_fetch_array($retour);
				mysqli_free_result($retour);
				
				if($donnees && (!isset($_GET['ope'])))
				{

					header("location: ../index.php?page=verifretrait" ); 
				}
				else
				{
							
						//$base = mysqli_connect('localhost','root','','bde'); 
						$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
						$requete = "SELECT id_user,solde_user FROM user WHERE login_user='".$_POST["login"]."'";
						$retour = mysqli_query($base,$requete);
						$donnees = mysqli_fetch_array($retour);
						mysqli_free_result($retour);
						if($donnees && ($donnees["solde_user"]-$_POST["montant"])<0 && (!isset($_GET['ope2']))){
							if(isset($_SESSION["id_super_admin"])){
							 header("location: ../index.php?page=verifretrait2&solde=".($_POST["montant"]-$donnees["solde_user"]));
							}
							else
							{
							header("location: ../index.php?page=retrait&ope=asec&solde=".($_POST["montant"]-$donnees["solde_user"]));
							}
						}
						else
						{
							if($donnees){
							$base2 = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
							//$base2 = mysqli_connect('localhost','root','','bde'); 
							$requete2 = "INSERT INTO operation(is_retrait,id_user_retire,id_user_retirant,montant_operation,date_operation,motif_operation,categorie_operation) VALUES('1','".$donnees["id_user"]."','".$_SESSION["id"]."','".$_POST["montant"]."',NOW(),'".$_POST["motif"]."','".$_POST["cat"]."');";
							$retour2 = mysqli_query($base2,$requete2);
							$requete3 = "UPDATE user SET solde_user='".($donnees["solde_user"]-$_POST["montant"])."' WHERE id_user='".$donnees["id_user"]."';";
							$retour3 = mysqli_query($base2,$requete3);
							header("location: ../index.php?page=retrait&ope=ok" );
							}else{
							header("location: ../index.php?page=retrait&ope=wronglogin" ); 
							}
					}
					
				}
			}
			else
			{
			header("location: ../index.php?page=retrait&ope=champvide" );
			}
	}
	else
	{
	echo("Access denied");
	}	
		
	
		?>