 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"])) {
		
			$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
			if(isset($_GET["select_ope"])){
				$requete2 = "SELECT is_retrait, tmp2.login_user as log2, tmp1.login_user as log1, tmp1.id_user as id1, montant_operation, date_operation, motif_operation FROM user tmp1, user tmp2, operation WHERE id_user_retire=tmp1.id_user AND id_user_retirant=tmp2.id_user AND motif_operation=".$_GET["select_ope"];
				$requete3 = "SELECT COUNT(*) AS nb, SUM(montant_operation) AS montant FROM operation WHERE motif_operation=".$_GET["select_ope"];
			}else{
				$requete2 = "SELECT is_retrait, tmp2.login_user as log2, tmp1.login_user as log1, tmp1.id_user as id1, montant_operation, date_operation, motif_operation FROM user tmp1, user tmp2, operation WHERE id_user_retire=tmp1.id_user AND id_user_retirant=tmp2.id_user";
	
			}
		
			if(isset($_POST["date_min"]) && $_POST["date_min"]!='') {
				$requete2 = $requete2." AND date_operation>='".$_POST["date_min"]."'";
				if(isset($requete3))
				{
					$requete3 = $requete3." AND date_operation>='".$_POST["date_min"]."'";
				}
			}
			if(isset($_POST["date_max"]) && $_POST["date_max"]!='') {
				$requete2 = $requete2." AND date_operation<='".$_POST["date_max"]."'";
				if(isset($requete3))
				{
					$requete3 = $requete3." AND date_operation<='".$_POST["date_max"]."'";
				}
			}

			$requete2 = $requete2." ORDER BY date_operation DESC";
			if(isset($requete3))
			{
				$retour3 = mysqli_query($base,$requete3);
				$donnees3 = mysqli_fetch_array($retour3);
			}else{
				if(isset($_GET["limit"])){
					$requete2 = $requete2." LIMIT ".$_GET["limit"];
				}
			}
			
			
			$retour2 = mysqli_query($base,$requete2);
			$donnees2 = mysqli_fetch_array($retour2);
?>
		<h1>Historique des opérations</h1>
		<?php if(isset($requete3)){echo("<h3>".$_GET["select_ope"]." : ".$donnees3["nb"]." opérations trouvées pour un total de ".((-1)*$donnees2["is_retrait"]*2+1)*$donnees3["montant"]." €</h3><p><a href='index.php?page=histo_ope&limit=50'>Retour à la liste complète</a></p>");} ?>
		<form <?php if(isset($_GET["select_ope"])){echo("action='index.php?page=histo_ope&select_ope=".$_GET["select_ope"]."'");}else{echo("action='index.php?page=histo_ope'");} ?> method="post">
		<label for="date_min">Du : </label>
		<input id="date_min" type="date" max="2020-08-01" min="2014-08-01" name="date_min" <?php if(isset($_POST["date_min"]) && $_POST["date_min"]!='') {echo("value='".$_POST["date_min"])."'";} ?>>
		<label for="date_max">Au : </label>
		<input id="date_max" type="date" max="2020-08-01" min="2014-08-01" name="date_max" <?php if(isset($_POST["date_max"]) && $_POST["date_max"]!='') {echo("value='".$_POST["date_max"])."'";} ?>>
		<input name="send" type="submit"/>
		</form>
		
		<?php if(!isset($_GET["select_ope"])){ ?>
		<p>Nombre d'opérations à afficher : <a href="index.php?page=histo_ope&limit=50">50</a> | <a href="index.php?page=histo_ope&limit=100">100</a> | <a href="index.php?page=histo_ope&limit=500">500</a> | <a href="index.php?page=histo_ope">Toutes</a></p>
		<?php } ?>
		
		<?php
if($donnees2){
?>
		<div class="tab">
   <p class="entete">
      <span class="col1">Date :</span>
      <span class="col2">Montant :</span>
      <span class="col3">Login :</span>
	  <span class="col4">Motif :</span>
   </p>
	<?php
	$i=0;
	while($donnees2){
	if($donnees2["is_retrait"]){
		$montant="-".$donnees2["montant_operation"];
		}else{
		$montant="+".$donnees2["montant_operation"];
		}
		$date_operation=$donnees2["date_operation"];
		$login_user1=$donnees2["log1"];
		$login_user2=$donnees2["log2"];
		$id_user1=$donnees2["id1"];
		$motif_operation=$donnees2["motif_operation"];
		$donnees2 = mysqli_fetch_array($retour2);
		
		/*Si la ligne suivante est vide, on met les coins arrondis*/
		if(!$donnees2){
		?>
		<p class=<?php if($i%2==0){?> "lipairefinale" <?php }else{ ?> "liimpairefinale" <?php }?> >
			<span class="col1"><?php echo(date("d/m/Y H\hi", strtotime($date_operation))); ?></span>
			<span class="col2"><?php echo($montant); ?> €</span>
			<span class="col3"><?php echo("<acronym title='Transfert effectué par ".$login_user2."'><a href='index.php?page=detail_ope_admin&id=".$id_user1."'>".$login_user1."</a></acronym>"); ?></span>
			<span class="col4"><?php echo("<a href='index.php?page=histo_ope&select_ope=".'"'.$motif_operation.'"'."'>".$motif_operation."</a>"); ?></span>
		 </p>
		<?php
		/*Sinon, on est sur une ligne normale --> pas d'arrondis*/
		}else{
		?>
		 <p class=<?php if($i%2==0){?> "lipaire" <?php }else{ ?> "liimpaire" <?php }?> >
			<span class="col1"><?php echo(date("d/m/Y H\hi", strtotime($date_operation))); ?></span>
			<span class="col2"><?php echo($montant); ?> €</span>
			<span class="col3"><?php echo("<acronym title='Transfert effectué par ".$login_user2."'><a href='index.php?page=detail_ope_admin&id=".$id_user1."'>".$login_user1."</a></acronym>"); ?></span>
			<span class="col4"><?php echo("<a href='index.php?page=histo_ope&select_ope=".'"'.$motif_operation.'"'."'>".$motif_operation."</a>"); ?></span>
		 </p>

	<?php
	}
	$i+=1;
	}
	?>
	</div>	
	</br>
	</br>
	</br>
	<?php
	}else{
		echo("Aucune opération effectuée pour le moment...");
	}
	mysqli_free_result($retour2);
	?>
	
	

<?php		
		//Si la session n'est pas lancée, on affiche la page de connection
		}else{
			include("php/login.php");
		}
?>