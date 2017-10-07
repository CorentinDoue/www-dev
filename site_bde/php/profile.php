<!doctype html>
<html lang="fr-FR">
<head>

  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Default functionality</title>

</head>
<body>
 <h1>Accéder aux informations d'un compte</h1>
<div class="ui-widget">

      	<?php
				$decoupe_login = explode(".",$_POST["login"]);
				//$base = mysqli_connect('localhost','root','','bde'); 
				$base = mysqli_connect('localhost','bde','Dd1&aa1&hob1cjp','bde');
				$requete = "SELECT id_user, promo_user, solde_user FROM user WHERE nom_user='".$decoupe_login[1]."' AND prenom_user='".$decoupe_login[0]."'";
				$retour = mysqli_query($base,$requete);
				$donnees = mysqli_fetch_array($retour);
				mysqli_free_result($retour);
				if(!$donnees)
				{
				$est_dans_la_base = false;
				echo("Compte inexistant");
				}
				else
				{
				$est_dans_la_base = true;
				echo("<h2>".ucwords($decoupe_login[0]." ".$decoupe_login[1])."</h2>");
				echo("<b>Promo :</b> ".$donnees["promo_user"]."A</br>");
				echo("<b>Solde :</b> ".$donnees["solde_user"]."€");
				}
			

	?>


</div>
 
 
</body>
</html>