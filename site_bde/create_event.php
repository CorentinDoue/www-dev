 <?php
    //Si tout va bien, on affiche la page

    if(isset($_SESSION["id_super_admin"])) {
        
        //include ("php/connexion.php");
?>


        <h1>Créer un événement (repas ...)</h1>

<?php
    if(isset($_GET["ope2"])&&$_GET["ope2"] == "ok"){
        echo "<p style=\"color: green;\">Action effectuée</p>";
    }
    
    $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 0"); // on récupère l'événement le plus récent
    $req -> execute(array());
    $data = $req -> fetch(); 
        
    if(isset($donnees) AND $donnees){
        $datefin = strtotime($data["max"]);

        if(!($datefin-time()<0)){ // si on est avant la deadline
            echo "Un événement est déjà en cours, le supprimer ?";
?>
            <form action="php/checkcreateshotgun.php" method="post">
                <input class="button" type="submit" name="delete" value="Supprimer">
            </form>
<?php
            
            
        }else{
?>
            <form action="php/checkcreateevent.php" method="post">
                Titre événement : <input class="input" type="text" name="nom"><br>
                Type événement : <input class="input" type="text" name="type"><br>
                Date de début de l'événement (format à respecter aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datedeb"><br>
                Date de fin de l'événement (format à respecter aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datefin"><br>
                Prix par personne : <input class="input" type="number" name="prix">€ <br>
                <input class="button" type="submit" name="send" value="Créer">
            </form>
<?php
        }
    }else{
?>
            <form action="php/checkcreateevent.php" method="post">
                Titre événement : <input class="input" type="text" name="nom"><br>
                Type événement : <input class="input" type="text" name="type"><br>
                Date de début de l'événement (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datedeb"><br>
                Date de fin de l'événement (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datefin"><br>
                Prix par personne : <input class="input" type="number" name="prix">€ <br>
                <input class="button" type="submit" name="send" value="Créer">
            </form>
<?php
        
    }
?>


        <h1>Créer un événement au shotgun</h1>
        
<?php
        
    if(isset($_GET["ope"])&&$_GET["ope"] == "ok"){
        echo "<p style=\"color: green;\">Action effectuée</p>";
    }
    


    $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 1"); // on récupère l'événement le plus récent shotgunable
    $req -> execute(array());
    $donnees = $req -> fetch();    
        
    if($donnees){
        $datefin = strtotime($donnees["max"]);

        if(!($datefin-time()<0)){ // si on est avant la deadline
            echo "Un événement au shotgun est déjà en cours, le supprimer ?";
?>
            <form action="php/checkcreateshotgun.php" method="post">
                <input class="button" type="submit" name="delete" value="Supprimer">
            </form>
<?php
            
            
        }else{
?>
            <form action="php/checkcreateshotgun.php" method="post">
                Titre événement : <input class="input" type="text" name="nom"><br>
                Description événement : <input class="input" type="text" name="descr"><br>
                Date de début de shotgun (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datedeb"><br>
                Date de fin de shotgun (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datefin"><br>
                <input class="button" type="submit" name="send" value="Créer">
            </form>
<?php
        }
    }else{
?>
            <form action="php/checkcreateshotgun.php" method="post">
                Titre événement : <input class="input" type="text" name="nom"><br>
                Description événement : <input class="input" type="text" name="descr"><br>
                Date de début de shotgun (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datedeb"><br>
                Date de fin de shotgun (aaaa-mm-jj hh:mm:ss) : <input class="input" type="text" name="datefin"><br>
                <input class="button" type="submit" name="send" value="Créer">
            </form>
<?php
        
    }
?>

<?php


    }else{
        if(isset($_SESSION["id"])){
            echo "Access denied";
        
        }else{
            include("php/login.php");
        }
    }
?>