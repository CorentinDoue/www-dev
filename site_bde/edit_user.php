 <script language="JavaScript">
function calendrier() {
	alert("plop");
	if(document.getElementById('R2').checked) {
		alert("plop");
		document.getElementById('R21').style.display="block";
	}else{
		document.getElementById('R21').style.display="none";
	}
</script>
 
 
 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_super_admin"])) {
	?>
	<h1>Autorisations de <?php echo($_GET["login"]);?></h1>
	<form name="formulaire" action="php/checkedit.php" method="post" onChange="if(document.getElementById('R2').checked) {document.getElementById('ssgpe').style.display='block';}else{document.getElementById('ssgpe').style.display='none';}">
	   <p align="left">
       Niveau d'autorisation pour <?php echo($_GET["login"]);?> :<br />
       <input type="radio" name="auto" value="std" id="R1" /> <label for="R1">Utilisateur lambda</label><br />
       <input type="radio" name="auto" value="adtmp" id="R2" /> <label for="R2">Admin temporaire</label><br />
	   <span id="ssgpe" style="display: none;">Du : <input type="datetime-local" name="dbt" id="dbt" /> Au : <input type="datetime-local" name="fin" id="fin"/></span>
       <input type="radio" name="auto" value="ad" id="R3" /> <label for="R3">Admin</label><br />
       <input type="radio" name="auto" value="superadmin" id="R4" /> <label for="R4">Super administrateur</label><br />
	   <input id="id" name="id" type="hidden" value="<?php echo($_GET["id"]); ?>">
	   <!--<input id="ida" name="ida" type="hidden" value="<?php echo($_GET["ida"]); ?>">-->
	   <input name="send" type="submit"/>
   </p>
	</form>
	
	
<?php	
		
	
		}else{
			include("php/login.php");
		}
?>