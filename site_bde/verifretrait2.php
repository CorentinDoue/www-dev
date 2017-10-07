 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_super_admin"])) {
?>

<h1>Avertissement !</h1>
<p style="color:rgba(255,128,0,1);">Pas assez d'argent sur le compte (il manque <?php echo($_GET['solde']); ?> €) !</p>
<p>Confirmez-vous la transaction ?</p>

<form action="php/checkretrait.php?ope=validtransac&ope2=validtransac" method="post">
  
  <input id="log" name="login" type="hidden" value="<?php echo($_SESSION["login_retrait"]); ?>">
  <input id="montanti" name="montant" size="5" type="hidden" value="<?php echo($_SESSION["montant_retrait"]); ?>">
  <input id="motifi" name="motif" type="hidden" value="<?php echo($_SESSION["motif_retrait"]); ?>">
  <input id="cati" name="cat" type="hidden" value="<?php echo($_SESSION["cat_retrait"]); ?>">
  <input class="button" name="send" type="submit" value="Valider la transaction"/>
  <input class="button" name="send" type="button" value="Annuler la transaction" onclick="self.location.href='index.php?page=retrait&ope=cancel'"/>
</form>  


<?php
}else{
echo("Access denied");
}
?>
