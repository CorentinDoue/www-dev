<?php
include "php/connection_back_office.php";

$req = $bdd->prepare('INSERT INTO destinations (nom, complement_nom,  type_mobilite, type_convention, langue_cours, site_internet, description, commentaires, document) VALUES (:nom, "A compléter", "", "", "", "compléter avec l\'adresse du site internet", "A compléter", "A compléter", "")');
$req->execute(array(
    'nom' => $_GET['name']
    ));

$req = $bdd->prepare('SELECT ID FROM destinations WHERE nom=?');
$req->execute(array($_GET['name']));
while ($donnees = $req->fetch())
    {	
    	if (isset($_GET["parcour"])) {
    		$rep = $bdd->prepare('SELECT ID_destination FROM  mobilite WHERE ID_parcour= ?');
	        $rep->execute(array($_GET['parcour']));
	        $i=0;
	        while ($donnees2 = $rep->fetch())
	        {   
	            $previous_destination= $donnees2['ID_destination'];
	            $i++;
	        }
	        if ($i==0) {
	            $req = $bdd->prepare('INSERT INTO mobilite (ID_destination,ID_parcour) VALUES (:ID_destination,:ID_parcour)');
	            $req->execute(array(
	                'ID_destination' =>$donnees['ID'],
	                'ID_parcour' => $_GET['parcour']
	                ));
	        }else{
	            $rep = $bdd->prepare('UPDATE mobilite SET ID_destination=:ID_destination WHERE ID_parcour=:ID_parcour');
	            $rep->execute(array(
	                'ID_destination' =>$donnees['ID'],
	                'ID_parcour' => $_GET['parcour']       
	                ));
	        }

	        if (isset($_GET['excel'])) {
	        	header('Location: majdestination.php?key='.$donnees['ID'].'&parcour='.$_GET["parcour"].'&excel='.$_GET["excel"].'&ligne='.$_GET["ligne"].'&ajoutee='.$_GET["ajoutee"].'&modifiee='.$_GET["modifiee"]);
	        }else{
	        	header('Location: majdestination.php?key='.$donnees['ID'].'&parcour='.$_GET["parcour"]);
	        }    		
    	}else{
    		header('Location: majdestination.php?key='.$donnees['ID']);
    	}
        
    }


?>