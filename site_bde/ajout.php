 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])) {
?>
		<h1>Ajouter de l'argent sur un compte</h1>
		 <?php
		//Si l'ajout s'est bien passé, on l'indique sur la page
		if(isset($_GET['ope']) && $_GET['ope']=="ok") {
		?>
		<p style="color:rgba(0,255,0,1);">Ajout d'argent effectué avec succès !</p>
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
<div class="ui-widget">
<form action="php/checkajout.php" method="post">
  <label for="tags">Login : </label>
  <input class="input" id="userfield" name="login" size="22" autocomplete="off" onfocus="disablesubmit()">
   <div id="results"></div>

  </br>
  
  
  <label for="montanti">Montant : </label>
  <?php if(!isset($_SESSION["montant_ajout"])){ ?>
  <input type="number" step="0.01" min="0.01" max="200" id="montanti" name="montant" size="3" class="input"> €
  <?php }else{ ?>
  <input type="number" step="0.01" min="0.01" max="200" id="montanti" name="montant" size="3" class="input" value=<?php echo('"'.$_SESSION["montant_ajout"]).'"';?> onFocus="this.value= '';"> €
  <?php } ?>
  </br>
  
  
  <label for="motifi">Motif : </label>
  <?php if(!isset($_SESSION["motif_ajout"])){ ?>
  <input class="input" id="motifi" name="motif" maxlength="22" size="23">
  <?php }else{ ?>
  <input class="input" id="motifi" name="motif" maxlength="22" size="23" value=<?php echo('"'.$_SESSION["motif_ajout"]).'"';?> onFocus="this.value= '';">
  <?php } ?>
  
  </br>
  <label for="cati">Catégorie : </label>
  <?php if(!isset($_SESSION["cat_ajout"])){ ?>
  <SELECT class="input" id="cati" name="cat" size="1">
	<OPTION>Sélectionner...</OPTION>
	<OPTION>Remise de chèque</OPTION>
	<OPTION>Remise de cash</OPTION>
	<OPTION>Payement CB</OPTION>
	<OPTION>Remboursement</OPTION>
	</SELECT>
   <?php }else{ ?>
     <SELECT class="input" id="cati" name="cat" size="1">
	<OPTION>Sélectionner...</OPTION>
	<OPTION <?php if($_SESSION["cat_ajout"]=="Remise de chèque"){ echo(" selected"); } ?>>Remise de chèque</OPTION>
	<OPTION <?php if($_SESSION["cat_ajout"]=="Remise de cash"){ echo(" selected"); } ?>>Remise de cash</OPTION>
	<OPTION <?php if($_SESSION["cat_ajout"]=="Payement CB"){ echo(" selected"); } ?>>Payement CB</OPTION>
	<OPTION <?php if($_SESSION["cat_ajout"]=="Remboursement"){ echo(" selected"); } ?>>Remboursement</OPTION>
	</SELECT>
	<?php } ?>	
   </br>
  <input class="button" value="Ajouter" name="send" type="submit"/>
</form>  
</div>
<?php
		}else{
		echo("Access denied");
		}
?>