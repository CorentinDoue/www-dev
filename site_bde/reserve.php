<?php
    if(isset($_SESSION["id"])){
        
        echo "<h1>Faire une réservation</h1>";
        
        //include ("php/connexion.php");
        
        $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 0");
        $req -> execute(array());
        $donnees = $req -> fetch();
        
        if(isset($donnees["max"])){
            $req = $bdd -> prepare("SELECT * FROM event WHERE deadline_event = ?");
            $req -> execute(array($donnees["max"]));
            $donnees = $req -> fetch();
            
            $idevent = $donnees["id_event"];
            $prix = $donnees["prix"];
            $datedebut = strtotime($donnees["date_event"]);
            $datefin = strtotime($donnees["deadline_event"]);
            $now = time();
            
            if($datefin > $now && $datedebut < $now){ //si on est dans les dates
                $req = $bdd -> prepare("SELECT * FROM reserve WHERE id_event = ? AND id_user =?");
                $req -> execute(array($idevent, $_SESSION["id"]));
                $data = $req -> fetch();
                
                if(isset($data["nbr_reserve"])){ // si il a déjà réservé
                    echo "<p>Vous avez réservé pour ".$data["nbr_reserve"]." personne(s).</p>";
                }else{
                    if(isset($_POST["nbpers"])){
                        $req = $bdd -> prepare("INSERT INTO reserve VALUES (NULL, ?, ?, ?)");
                        $req -> execute(array($_SESSION["id"], $_POST["nbpers"], $idevent));
                        
                        echo "Réservation effectuée";
                        
                    }else{
?>
 
                <form action="" method="post">
                    <p>Paiement par compte BDE uniquement pour le nombre de personnes indiqué ci-dessous. Le paiement sera effectué lors de la vérification de votre réservation.</p><br>
                    <p style="display: inline;"> Réserver pour </p><input type="number" min="1" step="1" name="nbpers" value="1" style="display: inline;"><p style="display: inline;"> personnes.</p><br>
                    <input class="button" type="submit" value="Réserver">
                </form>

<?php
                        
                    }
                }
                
            }else{
                echo "<p>Aucun événement de prévu pour le moment.</p>";
            }
        }else{
            echo "<p>Aucun événement de prévu pour le moment.</p>";
        }
               
    }else{
        include("php/login.php");
    }
?>