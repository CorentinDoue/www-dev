 <?php
		//Si tout va bien, on affiche la page
		if(isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"])) {
?>
            <h1>Vérification des réservations</h1>
<?php
            //Si le retrait s'est bien passé, on l'indique sur la page
            if(isset($_GET['ope']) && $_GET['ope']=="ok" && isset($_GET['n'])) {
                echo "<p style=\"color: #096A09;\">Réservation pour <strong>".$_GET['n']."</strong> personne(s).</p>";
            }
            if(isset($_GET['ope']) && $_GET['ope']=="no") {
                echo "<p style=\"color: red;\">Pas de réservation à ce nom.</p>";
            }
            
            //include ("php/connexion.php");

            $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 0");
            $req -> execute(array());
            $donnees = $req -> fetch();

            if(isset($donnees["max"])){
                $req = $bdd -> prepare("SELECT * FROM event WHERE deadline_event = ?");
                $req -> execute(array($donnees["max"]));
                $donnees = $req -> fetch();

                $datedebut = strtotime($donnees["date_event"]);
                $datefin = strtotime($donnees["deadline_event"]);
                $now = time();

                if($datefin > $now && $datedebut < $now){ //si on est dans les dates
?>

                    <div class="ui-widget">
                    <form action="php/checkverifreserve.php" method="post">
                      <label for="tags">Login : </label>
                      <input class="input" id="userfield" name="login" size="22" autocomplete="off" onfocus="disablesubmit()">
                        <div id="results"></div>
                       </br>
                      <input id="submit" class="button" name="send" type="submit" value="Valider"/>
                    </form>  
                    </div>
<?php
                }else{
                    echo "Pas d'événement en cours.";
                }
                
            }else{
                echo "Pas d'événement en cours.";
            }
		}else{
		  echo("Access denied");
		}
?>