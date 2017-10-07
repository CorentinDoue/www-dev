 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])) {
?>

<h1>Avertissement !</h1>
<p style="color:rgba(255,0,0,1);">Attention : la même opération concernant <?php echo($_SESSION["login_ajout"]); ?> a déjà été effectuée il y a moins de 5 minutes !</p>
<p>Confirmez-vous la transaction ?</p>

<form action="php/checkajout.php?ope=validtransac" method="post">
  
  <input id="log" name="login" type="hidden" value="<?php echo($_SESSION["login_ajout"]); ?>">
  <input id="montanti" name="montant" size="5" type="hidden" value="<?php echo($_SESSION["montant_ajout"]); ?>">
  <input id="motifi" name="motif" type="hidden" value="<?php echo($_SESSION["motif_ajout"]); ?>">
  <input id="cati" name="cat" type="hidden" value="<?php echo($_SESSION["cat_ajout"]); ?>">
  <input name="send" type="submit" value="Valider la transaction"/>
  <input name="send" type="button" value="Annuler la transaction" onclick="self.location.href='index.php?page=ajout&ope=cancel'"/>
</form>  


<?php
}else{
echo("Access denied");
}
?>
