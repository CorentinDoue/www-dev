 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"])) {
?>

<h1>Avertissement !</h1>
<p style="color:rgba(255,0,0,1);">Attention : la même opération concernant <?php echo($_SESSION["login_retrait"]); ?> a déjà été effectuée il y a moins de 5 minutes !</p>
<p>Il s'agit probablement d'une erreur !</p>
<p>Confirmer la transaction ?</p>

<form action="php/checkretrait.php?ope=validtransac" method="post">
  
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
