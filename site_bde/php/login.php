<?php
//Si tout va bien, on inclut la page de résumé.
if(isset($_SESSION["id"])) {
    include("resume.php");
}else{
	?>

	<h1>Bienvenue sur le site du BDE de l'EMSE</h1>

	<p>Veuillez vous connecter via la plateforme de l'école.</p>
	<a href="index.php?page=resume"><div class="button" >Se connecter</div></a>
	<?php 
	if (isset($erreur)) {
		echo '<p style="color:rgba(255,0,0,1);">'.$erreur.'</p>';
		?>
		<p>Si vous êtes connecté au CAS mais que vous retombez ici :<br>
		- Vous n'avez pas de compte BDE => contacter un membre du BDE pour plus d'information<br>
		- Vous avez un compte BDE => contacter Corentin Doué pour résoudre le problème</p>
	<?php
	}

}
?>
