<?php

function notification($login, $solde){
	$mail = $login.'@etu.emse.fr'; // Déclaration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Votre solde de compte BDE est négatif : ".$solde." €. Merci de vous adresser au BDE pour le remboursement.";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Compte BDE négatif";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"BDE\"<bde@etu.emse.fr>".$passage_ligne;
	$header.= "Reply-to: \"BDE\"<bde@etu.emse.fr>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"utf8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	//==========

}

/*le code est exécuter tous les 14 jours */

include ("connexion.php");

$req = $bdd->prepare("SELECT MAX(date_notif) AS max FROM notifications"); //on cherche la date la plus récente
$req -> execute(array());
$data = $req->fetch();


$now = time();

if(isset($data["max"])){
    $date = strtotime($data["max"]);
}else{
    $date = 1;
}

/* on limite à une relance par semaine pour éviter les abus*/
if($now-$date>7*24*3600){


    /* on cherche ceux qui ont un solde négatif */

    $req = $bdd->prepare("SELECT login_user, solde_user FROM user WHERE solde_user<0");
    $req -> execute(array());
    
    $i = 0;
    while($donnees = ($req->fetch())) // on effectue une boucle pour obtenir les données
    {
        notification($donnees['login_user'], $donnees['solde_user']); //on envoie une notification par mail à ceux qui ont un solde négatif
        $i++;
        
    }
    
    

    $datenotif = date("Y-m-d H:i:s", $now);
  
    
    $req = $bdd->prepare("INSERT INTO notifications VALUES (NULL, ?, ?)");
    $req -> execute(array($datenotif,$i));
}

header("Location: ../admin.php");
?>
