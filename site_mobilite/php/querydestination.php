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



	$rep = $bdd->prepare('SELECT  d.ID_Ville, d.nom, d.complement_nom, v.nom as ville, p.nom as pays, d.langue_cours as langues, d.type_mobilite, d.type_convention, d.site_internet, d.places,  d.description, d.commentaires, d.activ, d.document, d.ingenieurie FROM destinations d, villes v, pays p WHERE d.ID = ? AND d.ID_Ville=v.ID AND v.ID_pays=p.ID');
	$rep->execute(array($_GET['key']));
	$i=0;
	while ($donnees = $rep->fetch())
	    {	
	    	$req = $bdd->prepare('SELECT do.nom FROM domaines do, domainedestination dd WHERE dd.ID_domaine=do.ID AND dd.ID_destination=?');
	        $req->execute(array($_GET['key']));
	        $j=0;
	        while ($donnees2 = $req->fetch())
	            {
	                $domaines[$j]=$donnees2['nom'];
	                $j++;
	            }
	        if ($j==0) {
	        	$domaines=[];
	        }
	    	$i=1;
	        $destination['clef']=$_GET['key'];
	        $destination['complement_nom']=trim($donnees['complement_nom']);
	        $destination['nom']=trim($donnees['nom']);
	        $destination['ville']=trim($donnees['ville']);
	        $destination['pays']=trim($donnees['pays']);
	        $destination['domaines']=$domaines;
	        $type_mobilites=explode("/", $donnees['type_mobilite']);
	        $type_mobilites=array_map("correct_type_mobilite", $type_mobilites);
	        $destination['types_mobilites']=$type_mobilites;
	        $destination['type_convention']=trim($donnees['type_convention']);
	        $destination['site']=trim($donnees['site_internet']);
	        $langues=explode("/", $donnees['langues']);
	        $langues=array_map("trim", $langues);
	        $destination['langues']=$langues;
	        $destination['places']=trim($donnees['places']);
	        $destination['description']=trim($donnees['description']);
	        $destination['commentaires']=trim($donnees['commentaires']);
	        $destination['ID_Ville']=trim($donnees['ID_Ville']);
	        $destination['document']=trim($donnees['document']);
	        $destination['activ']=$donnees['activ'];
	        $destination['ingenieurie']=$donnees['ingenieurie'];
	    }
	if ($i==0) {
		$rep = $bdd->prepare('SELECT  nom, complement_nom, langue_cours as langues, type_mobilite, type_convention, site_internet, places,  description, commentaires, activ, document, ingenieurie FROM destinations  WHERE ID = ?');
		$rep->execute(array($_GET['key']));
		$i=0;
		while ($donnees = $rep->fetch())
		    {	
		    	$req = $bdd->prepare('SELECT do.nom FROM domaines do, domainedestination dd WHERE dd.ID_domaine=do.ID AND dd.ID_destination=?');
		        $req->execute(array($_GET['key']));
		        $j=0;
		        while ($donnees2 = $req->fetch())
		            {
		                $domaines[$j]=$donnees2['nom'];
		                $j++;
		            }
		        if ($j==0) {
		        	$domaines=[];
		        }
		    	$i=1;
		        $destination['clef']=$_GET['key'];
		        $destination['complement_nom']=trim($donnees['complement_nom']);
		        $destination['nom']=trim($donnees['nom']);
		        $destination['ville']="A définir";
		        $destination['pays']="A définir";
		        $destination['domaines']=$domaines;
		        $type_mobilites=explode("/", $donnees['type_mobilite']);
		        $type_mobilites=array_map("correct_type_mobilite", $type_mobilites);
		        $destination['types_mobilites']=$type_mobilites;
		        $destination['type_convention']=trim($donnees['type_convention']);
		        $destination['site']=trim($donnees['site_internet']);
		        $langues=explode("/", $donnees['langues']);
		        $langues=array_map("trim", $langues);
		        $destination['langues']=$langues;
		        $destination['places']=trim($donnees['places']);
		        $destination['description']=trim($donnees['description']);
		        $destination['commentaires']=trim($donnees['commentaires']);
		        $destination['ID_Ville']=0;
		        $destination['activ']=0;
		        $destination['document']=trim($donnees['document']);
		        $destination['ingenieurie']=$donnees['ingenieurie'];
            
		    }
	}

$answer_json =json_encode($destination);
echo $answer_json;
?>