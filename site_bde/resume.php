 <?php

		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id"])) {
		
			$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde'); 
			//$base = mysqli_connect('localhost','root','','bde');
			$requete1 = "SELECT solde_user FROM user WHERE id_user='".$_SESSION["id"]."'";
			$retour1 = mysqli_query($base,$requete1);
			$donnees1 = mysqli_fetch_array($retour1);
			mysqli_free_result($retour1);
			
			$requete2 = "SELECT is_retrait, login_user, montant_operation, date_operation, motif_operation FROM user, operation WHERE id_user_retire='".$_SESSION["id"]."' AND id_user_retirant=id_user ORDER BY date_operation DESC";
			$retour2 = mysqli_query($base,$requete2);
			$donnees2 = mysqli_fetch_array($retour2);
			mysqli_free_result($retour2);
			
?>
		<h1>Résumé du compte</h1>
		<h3>Solde :</h3>
		Il reste <b><?php echo($donnees1["solde_user"]); ?></b> € sur ton compte BDE.
		<h3>Dernière opération :</h3>
	<?php 
	if($donnees2){
	if($donnees2["is_retrait"]){
		$montant="-".$donnees2["montant_operation"];
		}else{
		$montant="+".$donnees2["montant_operation"];
		}
	echo("Le ".date("d/m/Y à H\hi", strtotime($donnees2["date_operation"]))." : ".$montant."€ par ".$donnees2["login_user"]." (".$donnees2["motif_operation"].")");	
	}
	else
	{
	echo("Aucune opération effectuée pour le moment...");
	}
	?>
		
		
<?php 
	switch($donnees1["solde_user"]){
		case "42":
			echo "La Grande Réponse à la Vie, l'Univers et le Reste";
			break;
		case "51":
			echo "51 je t'aime !";
			break;
		}

?>


<?php		
		//Si la session n'est pas lancée, on affiche la page de connection
		}else{
			include("php/login.php");
		}
?>