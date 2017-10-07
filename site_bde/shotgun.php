 <?php
		//Si tout va bien, on affiche la page
        
		
		if(isset($_SESSION["id"])) {
		
            //include ("php/connexion.php");

				
            $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 1"); // on récupère l'événement le plus récent
            $req -> execute(array());
            $donnees = $req -> fetch();
            
            if($donnees){
                $datefin = strtotime($donnees["max"]);
                
                $req = $bdd -> prepare("SELECT id_event, date_event, deadline_event, nom_event, description_event FROM event WHERE deadline_event = ? AND is_shotgun = 1");
                $req -> execute(array($donnees["max"]));
                $donnees = $req -> fetch();


                echo "<h1>".$donnees["nom_event"]."</h1>";
                echo "<p>".$donnees["description_event"]."</p>";
                
                
                if(!($datefin-time()<0)){ // si on est avant la deadline
                    
                    $datedebut = strtotime($donnees["date_event"]);
                    
                    if($datedebut-time()<=0){ // si on est après la date de début
                        $req = $bdd -> prepare("SELECT id_participation FROM participe WHERE id_event = ? AND id_user = ?");
                        $req -> execute(array($donnees["id_event"], $_SESSION["id"]));
                        $data = $req -> fetch();
                        
                        
                        if(!$data){
                            $_SESSION["id_event"] = $donnees["id_event"];
?>
                            <form action="php/checkshotgun.php" method="post">
                                <input class="button" type="submit" name="send" value="Shotgun Now !">
                            </form>

<?php
                        }
                        

                        echo "<br><h2 style=\"color: #002fa7;\">Voici la liste des inscrits :</h2>";

                        $req = $bdd -> prepare("SELECT user.login_user, participe.id_user, user.id_user, participe.date_inscription  FROM participe,user WHERE id_event = ? AND user.id_user = participe.id_user ORDER BY participe.date_inscription");
                        $req -> execute(array($donnees["id_event"]));
                        
                        $i = 1;

                        while($data2 = ($req->fetch())){
                            echo "<p>".$i."- <strong>".$data2["login_user"]."</strong> le ".$data2["date_inscription"]."</p>";
                            $i++;
                        }
                        
                        
                    }else{
                        echo "Ouverture du shotgun dans :";
                        
                        $tempsrestant = $datedebut;
                        

                        echo "<p id=\"decompte\" style=\"font-size: 25px; color: #002fa7; display: block;\"></p>";
                        
                        echo "<p id=\"datedeb\" style=\"visibility: collapse;\">".$datedebut."</p>";
?>

                        <script type="text/javascript">
                            function refresh(){
                                var datedeb = document.getElementById("datedeb"), decompte = document.getElementById("decompte");
                                var date = parseInt(datedeb.textContent);
                                var now = Math.floor(Date.now()/1000); // converti en s
                                var interv = date - now;
                                
                                
                                if(interv<=0){
                                    location.href = "index.php?page=shotgun";
                                }
                                    
                                //var jours = Math.floor(interv/(3600*24)), heures = Math.floor((interv-3600*24*jours)/3600), minutes = Math.floor((interv-3600*24*jours-3600*heures)/60), secondes = interv-3600*24*jours-3600*heures-60*minutes;
                                //alert(jours);
                                var jours = Math.floor(interv/(3600*24)), heures = Math.floor((interv-3600*24*jours)/3600), minutes = Math.floor((interv-3600*24*jours-3600*heures)/60), secondes = interv-3600*24*jours-3600*heures-60*minutes;
                                
                                if(heures<10){
                                    heures = "0"+heures;
                                }else{
                                    heures = ""+heures;
                                }
                                if(minutes<10){
                                    minutes = "0"+minutes;
                                }else{
                                    minutes = ""+minutes;
                                }
                                if(secondes<10){
                                    secondes = "0"+secondes;
                                }else{
                                    secondes = ""+secondes;
                                }
                                decompte.innerHTML = jours+" j "+heures+":"+minutes+":"+secondes;
                    
                            }
                            
                            setInterval("refresh()",950);
                            
                        </script>
<?php
                    }
                }else{
                    echo "<p style=\"color: #c60800;\"> Shotgun fermé </p>";
                    
                    echo "<br><h2 style=\"color: #002fa7;\">Voici la liste des inscrits :</h2><br>";

                    $req = $bdd -> prepare("SELECT user.login_user, participe.id_user, user.id_user, participe.date_inscription  FROM participe,user WHERE id_event = ? AND user.id_user = participe.id_user");
                    $req -> execute(array($donnees["id_event"]));

                    $i = 1;

                    while($data2 = ($req->fetch())){
                        echo "<p>".$i."- <strong>".$data2["login_user"]."</strong> le ".$data2["date_inscription"]."</p>";
                        $i++;
                    }
                }
                
            }
			else{
                echo "Aucun shotgun planifié pour le moment";
            }	
?>
		
<?php		
		//Si la session n'est pas lancée, on affiche la page de connection
		}else{
			include("php/login.php");
		}
?>