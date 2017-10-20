<?php
include "php/connection_back_office.php";

$req = $bdd->prepare('INSERT INTO parcours (nom, prenom, promo, date_debut, date_fin, tuteur, type_mobilite, type_convention, rapport, bulletin, remarques) VALUES ("NOM","PRENOM", 2000, "2017-01-01", "2017-01-01", "", "", "", "", "", "")');
$req->execute();

$req = $bdd->query('SELECT ID FROM parcours WHERE nom="NOM" and prenom="PRENOM"');

while ($donnees = $req->fetch())
    {	
    	
    	header('Location: majparcour.php?key='.$donnees['ID']);
    	
        
    }


?>