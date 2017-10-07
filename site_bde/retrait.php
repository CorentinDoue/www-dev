 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"])) {
?>
		<h1>Retirer de l'argent d'un compte</h1>
		 <?php
		//Si le retrait s'est bien passé, on l'indique sur la page
		if(isset($_GET['ope']) && $_GET['ope']=="ok") {
		?>
		<p style="color:rgba(0,255,0,1);">Retrait d'argent effectué avec succès !</p>
		<?php
		}
		?>
		
		<?php
		//Si un champ n'était pas rempli, on l'indique sur la page
		if(isset($_GET['ope']) && $_GET['ope']=="champvide") {
		?>
		<p style="color:rgba(255,0,0,1);">Erreur : Champ manquant, l'opération n'a PAS été effectuée !</p>
		<?php
		}
		?>
		
		<?php
		//Si le login n'est pas connu dans la base, on l'indique sur la page
		if(isset($_GET['ope']) && $_GET['ope']=="wronglogin") {
		?>
		<p style="color:rgba(255,0,0,1);">Erreur : Login incorrect, l'opération n'a PAS été effectuée !</p>
		<?php
		}
		?>
		
		<?php
		//Si l'opération est redondante et est annulée par l'admin, on l'indique sur la page
		if(isset($_GET['ope']) && $_GET['ope']=="cancel") {
		?>
		<p style="color:rgba(255,0,0,1);">Erreur : Transaction annulée, l'opération n'a PAS été effectuée !</p>
		<?php
		}
		?>
		
		<?php
		//Si il ne reste pas assez d'argent sur le compte
		if(isset($_GET['ope']) && isset($_GET['solde']) && $_GET['ope']=="asec") {
		?>
		<p style="color:rgba(255,0,0,1);">Pas assez d'argent sur le compte (il manque <?php echo($_GET['solde']); ?> €) !</p>
		<p style="color:rgba(255,0,0,1);">Transaction annulée, l'opération n'a PAS été effectuée !</p>
		<?php
		}
		?>
<div class="ui-widget">
<form action="php/checkretrait.php" method="post">
  <label for="tags">Login : </label>
  <input class="input" id="userfield" name="login" size="22" autocomplete="off" onfocus="disablesubmit()">
    <div id="results"></div>
  </br>
  
  
  <label for="montanti">Montant : </label>
  <?php if(!isset($_SESSION["montant_retrait"])){ ?>
  <input class="input" type="number" step="0.01" min="0.01" max="200" id="montanti" name="montant" size="3"> €
  <?php }else{ ?>
  <input class="input" type="number" step="0.01" min="0.01" max="200" id="montanti" name="montant" size="3" value=<?php echo('"'.$_SESSION["montant_retrait"]).'"';?>> €
  <?php } ?>
  </br>
  
  
  <label for="motifi">Motif : </label>
  <?php if(!isset($_SESSION["motif_retrait"])){ ?>
  <input class="input" id="motifi" name="motif" maxlength="22" size="23">
  <?php }else{ ?>
  <input class="input" id="motifi" name="motif" maxlength="22" size="23" value=<?php echo('"'.$_SESSION["motif_retrait"]).'"';?>>
  <?php } ?>
  
  </br>
  <label for="cati">Catégorie : </label>
  <?php if(!isset($_SESSION["cat_retrait"])){ ?>
  <SELECT class="input" id="cati" name="cat" size="1">
	<OPTION>Sélectionner...</OPTION>
	<OPTION>Repas</OPTION>
	<OPTION>Perm viennoiserie</OPTION>
	<OPTION>Perm marché</OPTION>
	<OPTION>Perm (autre)</OPTION>
	<OPTION>Anim/Soirées BDE</OPTION>
	<OPTION>Anim/Soirées BDA</OPTION>
	<OPTION>Anim/Soirées (autre)</OPTION>
	<OPTION>Mines Shop</OPTION>
	</SELECT>
   <?php }else{ ?>
     <SELECT class="input" id="cati" name="cat" size="1">
	<OPTION>Sélectionner...</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Repas"){ echo(" selected"); } ?>>Repas</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Perm viennoiserie"){ echo(" selected"); } ?>>Perm viennoiserie</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Perm marché"){ echo(" selected"); } ?>>Perm marché</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Perm (autre)"){ echo(" selected"); } ?>>Perm (autre)</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Anim/Soirées"){ echo(" selected"); } ?>>Anim/Soirées BDE</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Anim/Soirées BDA"){ echo(" selected"); } ?>>Anim/Soirées BDA</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Anim/Soirées (autre)"){ echo(" selected"); } ?>>Anim/Soirées (autre)</OPTION>
	<OPTION <?php if($_SESSION["cat_retrait"]=="Mines Shop"){ echo(" selected"); } ?>>Mines Shop</OPTION>
	</SELECT>
	<?php } ?>	
   </br>
  <input  class="button" value="Valider" name="send" type="submit" />
</form>  
</div>
<?php
		}else{
		echo("Access denied");
		}
?>