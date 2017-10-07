<?php
	include "connection_back_office.php";
	
	function correct_type_mobilite($element){
	    if (preg_match("#S\s*7#i", $element))
	    {
	    $element='S7';
	    return $element;
	    }
	    if (preg_match("#F\s*R#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#France#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#Dé?e?part/s*e?n?/s*France#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#S\s*10#i", $element))
	    {
	    $element='S10';
	    return $element;
	    }
	    if (preg_match("#Stage\s*2A#i", $element))
	    {
	    $element='stage_2A';
	    return $element;
	    }
	    if (preg_match("#D\s*D#i", $element))
	    {
	    $element='DD';
	    return $element;
	    }
	    if (preg_match("#Doubles?\s*Diplomes?#i", $element))
	    {
	    $element='DD';
	    return $element;
	    }
	    if (preg_match("#T\s*F\s*E#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    if (preg_match("#Travail\s*d?e?\s*Fin\s*d?'?é?e?tudes?#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    if (preg_match("#Stage\s*d?e?\s*Fin\s*d?'é?e?tudes?#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    return ""; 
	}

	function correct_type_mobilite2($element){
	    if (preg_match("#S\s*7#i", $element))
	    {
	    $element='S7';
	    return $element;
	    }
	    if (preg_match("#F\s*R#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#France#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#Dé?e?part/s*e?n?/s*France#i", $element))
	    {
	    $element='FR';
	    return $element;
	    }
	    if (preg_match("#S\s*10#i", $element))
	    {
	    $element='S10';
	    return $element;
	    }
	    if (preg_match("#Stage\s*2A#i", $element))
	    {
	    $element='Stage 2A';
	    return $element;
	    }
	    if (preg_match("#D\s*D#i", $element))
	    {
	    $element='Double Diplome';
	    return $element;
	    }
	    if (preg_match("#Doubles?\s*Diplomes?#i", $element))
	    {
	    $element='Double Diplome';
	    return $element;
	    }
	    if (preg_match("#T\s*F\s*E#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    if (preg_match("#Travail\s*d?e?\s*Fin\s*d?'?é?e?tudes?#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    if (preg_match("#Stage\s*d?e?\s*Fin\s*d?'é?e?tudes?#i", $element))
	    {
	    $element='TFE';
	    return $element;
	    }
	    return ""; 
	}

	function array_iunique($array) {
	    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
	}



	$rep = $bdd->prepare('SELECT p.ID as clef, d.nom as dest_nom, d.ID as ID_dest, p.nom, p.prenom, p.promo, p.date_debut, p.date_fin, p.tuteur, p.remarques, p.rapport, p.bulletin, v.nom as ville,  p.type_mobilite, p.type_convention FROM parcours p, mobilite m, destinations d, villes v WHERE d.ID_Ville=v.ID AND m.ID_destination=d.ID AND m.ID_parcour=p.ID AND p.ID=?');
	$rep->execute(array($_GET['key']));

	$i=0;
while ($donnees = $rep->fetch())
    {
        $req = $bdd->prepare('SELECT do.nom FROM domaines do, domaineparcour dp WHERE dp.ID_domaine=do.ID AND dp.ID_parcour=?');
        $req->execute(array($donnees['clef']));
        $j=0;
        $domaines=[];
        while ($donnees2 = $req->fetch())
        {
            $domaines[$j]=$donnees2['nom'];
            $j++;
        }
        $parcour['clef']=$donnees['clef'];
        $parcour['promo']=$donnees['promo'];
        $parcour['nom']=trim($donnees['nom']);
        $parcour['prenom']=trim($donnees['prenom']);
        $parcour['dest_nom']=trim($donnees['dest_nom']);
        $parcour['ID_dest']=$donnees['ID_dest'];
        $parcour['ville']=trim($donnees['ville']);
        $temp=explode("-", $donnees['date_debut']);
        $parcour['date_debut']['jour']=$temp[2];
        $parcour['date_debut']['mois']=$temp[1];
        $parcour['date_debut']['an']=$temp[0];
        $temp=explode("-", $donnees['date_fin']);
        $parcour['date_fin']['jour']=$temp[2];
        $parcour['date_fin']['mois']=$temp[1];
        $parcour['date_fin']['an']=$temp[0];
        $parcour['tuteur']=trim($donnees['tuteur']);
        $parcour['domaines']=$domaines;
        $parcour['types_mobilites']=correct_type_mobilite($donnees['type_mobilite']);
        $parcour['type_convention']=trim($donnees['type_convention']);
        $parcour['remarques']=trim($donnees['remarques']);
        $parcour['rapport']=trim($donnees['rapport']);
        $parcour['bulletin']=trim($donnees['bulletin']);
        
        $i++;
    }


	if ($i==0) {
		$rep = $bdd->prepare('SELECT ID as clef, nom, prenom, promo, date_debut, date_fin, tuteur, remarques, rapport, bulletin,  type_mobilite, type_convention FROM parcours WHERE ID=?');
		$rep->execute(array($_GET['key']));

		$i=0;
	while ($donnees = $rep->fetch())
	    {
	        $req = $bdd->prepare('SELECT do.nom FROM domaines do, domaineparcour dp WHERE dp.ID_domaine=do.ID AND dp.ID_parcour=?');
	        $req->execute(array($donnees['clef']));
	        $j=0;
	        $domaines=[];
	        while ($donnees2 = $req->fetch())
	        {
	            $domaines[$j]=$donnees2['nom'];
	            $j++;
	        }
	        $parcour['clef']=$donnees['clef'];
	        $parcour['promo']=$donnees['promo'];
	        $parcour['nom']=trim($donnees['nom']);
	        $parcour['prenom']=trim($donnees['prenom']);
	        $parcour['dest_nom']="";
	        $parcour['ID_dest']=0;
	        $parcour['ville']="";
	        $temp=explode("-", $donnees['date_debut']);
	        $parcour['date_debut']['jour']=$temp[2];
	        $parcour['date_debut']['mois']=$temp[1];
	        $parcour['date_debut']['an']=$temp[0];
	        $temp=explode("-", $donnees['date_fin']);
	        $parcour['date_fin']['jour']=$temp[2];
	        $parcour['date_fin']['mois']=$temp[1];
	        $parcour['date_fin']['an']=$temp[0];
	        $parcour['tuteur']=trim($donnees['tuteur']);
	        $parcour['domaines']=$domaines;
	        $parcour['types_mobilites']=correct_type_mobilite($donnees['type_mobilite']);
	        $parcour['type_convention']=trim($donnees['type_convention']);
	        $parcour['remarques']=trim($donnees['remarques']);
	        $parcour['rapport']=trim($donnees['rapport']);
	        $parcour['bulletin']=trim($donnees['bulletin']);
	        
	        $i++;
	    }
		
	}

$answer_json =json_encode($parcour);
echo $answer_json;
?>