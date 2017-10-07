 <?php
        session_start();
        include ("connexion.php");
        include "functions.php";
		//Si tout va bien, on affiche la page
		if((isset($_POST["newlogin"])) && (isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"]))) {


            $req = $bdd -> prepare("SELECT droit_user, id_user FROM user WHERE login_user=?");
            $req->execute(array($_POST["newlogin"]));

            $donnees = $req->fetch();
            if (isset($donnees["droit_user"])) {
                if ($donnees["droit_user"]=="aucun") {
                    $req = $bdd->prepare('UPDATE user SET droit_user="user", solde_user=? WHERE id_user=?');
                    $req->execute(array($_POST["solde"],$donnees["id_user"]));
                
                    header("Location: ../index.php?page=ajout_compte&state=ok");
                }else{
                    header("Location: ../index.php?page=ajout_compte&state=failed");
                }   
            }else{
                $req = $bdd->prepare('INSERT into user values (null,?,"","","ICM",?,?,"user",0,"aucun")');
                $req->execute(array($_POST["newlogin"],$_POST["promo"],$_POST["solde"]));
                

                header("Location: ../index.php?page=ajout_compte&state=ok");
            }

            
                
            
		}
?>