 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"])) {
?>

    <h1>Ajouter un compte</h1>

    <?php
            if(isset($_GET["state"])){
                if($_GET["state"] == "ok"){
                    echo "<p style=\"color:rgba(0,255,0,1);\">Le compte a bien été créé.</p>";
                }elseif($_GET["state"] == "failed"){
                    echo "<p style=\"color:rgba(255,0,0,1);\">Echec de la création du compte.<br>Ce compte existe déjà.</p>";
                }
            }
    ?>
    <form action="php/checkajoutcompte.php" method="post">
        Login : <input class="input" type="text" name="newlogin" required /><br>
        Promo (année) : <input class="input" type="text" name="promo" required/><br>
        Solde : <input class="input" type="number" name="solde" value="0"/>€<br>

        <input class="button" type="submit" value="Créer"/> 
    </form>
<?php
		//Si la session n'est pas lancée, on affiche la page de connexion
		}else{
			include("php/login.php");
		}
?>