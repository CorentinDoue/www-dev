<?php

    session_start();

    if(isset($_POST["login"]) && (isset($_SESSION["id_admin"])||isset($_SESSION["id_admin_tempo"]))){
        include ("php/connexion.php");
        
        $req = $bdd -> prepare("SELECT MAX(deadline_event) AS max FROM event WHERE is_shotgun = 0");
        $req -> execute(array());
        $donnees = $req -> fetch();
        
        $req = $bdd -> prepare("SELECT id_event FROM event WHERE deadline_event = ?");
        $req -> execute(array($donnees["max"]));
        $donnees = $req -> fetch();
        
        $idevent = $donnees["id_event"]; 
        
        $req = $bdd -> prepare("SELECT reserve.id_user, reserve.nbr_reserve FROM reserve, user WHERE user.login_user =? AND reserve.id_user = user.id_user AND reserve.id_event = ?");
        $req -> execute(array($_POST["login"], $idevent));
        $donnees = $req -> fetch();
        
        if(isset($donnees["nbr_reserve"])){
            header("Location: ../index.php?page=verif_reserve&ope=ok&n=".$donnees["nbr_reserve"]);
        }else{
            header("Location: ../index.php?page=verif_reserve&ope=no");
        }
    }

?>