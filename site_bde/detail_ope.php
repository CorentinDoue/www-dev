 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id"])) {
		  
			//include ("php/connexion.php");

            $req1 = $bdd -> prepare("SELECT solde_user FROM user WHERE id_user=?");
            $req1 -> execute(array($_SESSION["id"]));
            $donnees1 = $req1 -> fetch();
            
			$req2 = $bdd -> prepare("SELECT is_retrait, login_user, montant_operation, date_operation, motif_operation FROM user, operation WHERE id_user_retire=? AND id_user_retirant=id_user ORDER BY date_operation DESC");
            $req2 -> execute(array($_SESSION["id"]));
            $donnees2 = $req2 -> fetch();		
?>

		<h1>Détail des opérations</h1>
		<h3>Solde :</h3>
		Il reste <b><?php echo($donnees1["solde_user"]); ?></b> € sur ton compte BDE.
		<h3>Liste des opérations :</h3>
<?php
           
if($donnees2){
?>
		<div class="tab">
   <p class="entete">
      <span class="col1">Date :</span>
      <span class="col2">Montant :</span>
      <span class="col3">Respo :</span>
	  <span class="col4">Motif :</span>
   </p>
	<?php
	$i=0;
    $req2 = $bdd -> prepare("SELECT is_retrait, login_user, montant_operation, date_operation, motif_operation FROM user, operation WHERE id_user_retire=? AND id_user_retirant=id_user ORDER BY date_operation DESC");
    $req2 -> execute(array($_SESSION["id"]));
    
	while($donnees2 = $req2 -> fetch()){
	if($donnees2["is_retrait"]){
        
		$montant="-".$donnees2["montant_operation"];
		}else{
		$montant="+".$donnees2["montant_operation"];
		}
		$date_operation=$donnees2["date_operation"];
		$login_user=$donnees2["login_user"];
		$motif_operation=$donnees2["motif_operation"];
		
		?>
		 <p class=<?php if($i%2==0){?> "lipaire" <?php }else{ ?> "liimpaire" <?php }?> >
			<span class="col1"><?php echo(date("d/m/Y H\hi", strtotime($date_operation))); ?></span>
			<span class="col2"><?php echo($montant); ?> €</span>
			<span class="col3"><?php echo($login_user); ?></span>
			<span class="col4"><?php echo($motif_operation); ?></span>
		 </p>

	<?php
	
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
	?>
	
	

<?php		
		//Si la session n'est pas lancée, on affiche la page de connection
		}else{
			include("php/login.php");
		}
?>