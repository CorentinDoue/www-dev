 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_super_admin"])) {
		
			$indice_max=0;
			//include ("php/connexion.php");
			
            $req1 = $bdd -> prepare("SELECT id_user, solde_user, login_user, promo_user FROM user ORDER BY login_user");
            
			if(isset($_GET["order_by"]) AND $_GET["order_by"]=="solde")
			{
            $req1 = $bdd -> prepare("SELECT id_user, solde_user, login_user, promo_user FROM user ORDER BY solde_user");
			}
			if(isset($_GET["order_by"]) AND $_GET["order_by"]=="promo")
			{
            $req1 = $bdd -> prepare("SELECT id_user, solde_user, login_user, promo_user FROM user ORDER BY promo_user");
			}
			if(isset($_GET["order_by"]) AND $_GET["order_by"]=="login")
			{
            $req1 = $bdd -> prepare("SELECT id_user, solde_user, login_user, promo_user FROM user ORDER BY login_user");
			}
            
            $req1 -> execute(array());
			
			
            $req2 = $bdd -> prepare("SELECT id_user, dbt, fin FROM admin_tempo WHERE dbt<=NOW() AND NOW()<=fin");
			$req2 -> execute(array());
			
			
            $req3 = $bdd -> prepare("SELECT id_user, id_admin FROM admin");
			$req3 -> execute(array());
			
			

            $req4 = $bdd -> prepare("SELECT id_user FROM admin, super_admin WHERE super_admin.id_admin=admin.id_admin");
			$req4 -> execute(array());
			
            
			$req5 = $bdd -> prepare("SELECT SUM(solde_user) as somme FROM user WHERE solde_user < 0");
			$req5 -> execute(array());
			$donnees5 = $req5 -> fetch();
			         
			$req6 = $bdd -> prepare("SELECT SUM(solde_user) as somme FROM user WHERE solde_user > 0");
			$req6 -> execute(array());
			$donnees6 = $req6 -> fetch();
			
			$tableau=array();
			$tableau2=array();
			$k=1;
			while($donnees1 = ($req1 -> fetch())){
				$tableau2[$k]=$donnees1["id_user"];
				$tableau[$donnees1["id_user"]]=array($donnees1["solde_user"],$donnees1["login_user"],NULL,NULL,NULL,NULL,$donnees1["promo_user"],$donnees1["id_user"],NULL);
				if($indice_max<$donnees1["id_user"]){
					$indice_max=$donnees1["id_user"];
				}
				$k++;
			}
			
			while($donnees2 = ($req2 -> fetch())){
				$tableau[$donnees2["id_user"]][2]=$donnees2["dbt"];
				$tableau[$donnees2["id_user"]][3]=$donnees2["fin"];
			}
			
			while($donnees3 = ($req3 -> fetch())){
				$tableau[$donnees3["id_user"]][4]=1;
				$tableau[$donnees3["id_user"]][8]=$donnees3["id_admin"];
			}
			
			while($donnees4 = ($req4 -> fetch())){
				$tableau[$donnees4["id_user"]][5]=1;
			}
?>
        <h1>Envoyer des mails de rappel</h1>
        <a href="notifMail.php" class="button">Envoyer</a>
        
        
        <h1>Changer le fond</h1>
        <form action="changerfond.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" class="input" id="fileToUpload">
            <input type="submit" class="button" name="submit" value="Changer">
        </form>

		<h1>Super Gestion Maggle !</h1>
		<h2>Somme des comptes positifs : <?php echo (round($donnees6["somme"],2));?> €<br />Somme des comptes négatifs : <?php echo (round($donnees5["somme"],2));?> €</h2>
		<p>Trier la liste par :  <a href="index.php?page=admin&order_by=solde" class="lienClassement">Solde</a> | <a href="index.php?page=admin&order_by=promo" class="lienClassement">Promo</a> | <a href="index.php?page=admin&order_by=login" class="lienClassement">Login</a></p>
<?php

if($indice_max>0){
?>
		<div class="tab2">
   <p class="entete">
      <span class="col1">Nom :</span>
	  <span class="col2">Promo :</span>
      <span class="col2">Solde :</span>
      <span class="col2">Admin :</span>
	   <span class="col2">Big Boss :</span>
	  <span class="col4">Edit :</span>
 </p>
	<?php
	$i=0;
	$j=1;
	while($j<$k){

			if(isset($tableau[$tableau2[$j]][0])){
		?>
		 <p class=<?php if($i%2==0){?> "lipaire" <?php }else{ ?> "liimpaire" <?php }?> >
			<span class="col1"><?php echo("<a href='index.php?page=detail_ope_admin&id=".$tableau[$tableau2[$j]][7]."'>".$tableau[$tableau2[$j]][1]."</a>"); ?></span>
			<span class="col2"><?php echo($tableau[$tableau2[$j]][6]); ?></span>
			<span class="col2"><?php echo($tableau[$tableau2[$j]][0]); ?> €</span>
			<span class="col2"><?php if(isset($tableau[$tableau2[$j]][4])){echo("<img src='images/ok.png'></img>");}else{if(isset($tableau[$tableau2[$j]][2])){echo("<acronym title='Admin tempo du ".date("d/m/Y à H\hi", strtotime($tableau[$tableau2[$j]][2]))." au ".date("d/m/Y à H\hi", strtotime($tableau[$tableau2[$j]][3]))."'><img src='images/clock.png'></img></acronym>");}else{echo("<img src='images/nok.png'></img>");}}  ?></span>
			<span class="col2"><?php if(isset($tableau[$tableau2[$j]][5])){echo("<img src='images/ok.png'></img>");}else{echo("<img src='images/nok.png'></img>");}  ?></span>
			<span class="col4"><?php echo("<a href='index.php?page=edit_user&id=".$tableau[$tableau2[$j]][7]."&login=".$tableau[$tableau2[$j]][1]."&log=".$tableau[$tableau2[$j]][8]."'><img src='images/edit.png'></img></a>"); ?></span>
		 </p>

	<?php
			}
		$i++;
		$j++;
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
			include("login.php");
		}
?>
