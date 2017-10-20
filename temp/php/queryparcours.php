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

function nb_to_month($nb){
        if ($nb=='01') {
            return 'janvier';
        }
        if ($nb=='02') {
            return 'février';
        }
        if ($nb=='03') {
            return 'mars';
        }
        if ($nb=='04') {
            return 'avril';
        }
        if ($nb=='05') {
            return 'mai';
        }
        if ($nb=='06') {
            return 'juin';
        }
        if ($nb=='07') {
            return 'juillet';
        }
        if ($nb=='08') {
            return 'août';
        }
        if ($nb=='09') {
            return 'septembre';
        }
        if ($nb=='10') {
            return 'octobre';
        }
        if ($nb=='11') {
            return 'novembre';
        }
        if ($nb=='12') {
            return 'décembre';
        }
        return '';
    }

    function trans_date($date)
    {
        $date=explode("-", $date);
        if ($date[2]=='01') {
            $date[2]='1er';
        }
        if ($date[2]=='02') {
            $date[2]='2';
        }
        if ($date[2]=='03') {
            $date[2]='3';
        }
        if ($date[2]=='04') {
            $date[2]='4';
        }
        if ($date[2]=='05') {
            $date[2]='5';
        }
        if ($date[2]=='06') {
            $date[2]='6';
        }
        if ($date[2]=='07') {
            $date[2]='7';
        }
        if ($date[2]=='08') {
            $date[2]='8';
        }
        if ($date[2]=='09') {
            $date[2]='9';
        }
        return $date[2]." ".nb_to_month($date[1])." ".$date[0];
    }


function array_iunique($array) {
    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
}

$rep = $bdd->query('SELECT p.ID as clef, d.nom as dest_nom, p.nom, p.prenom, p.promo, p.date_debut, p.date_fin, p.tuteur, v.nom as ville,  p.type_mobilite, p.type_convention FROM parcours p, mobilite m, destinations d, villes v WHERE d.ID_Ville=v.ID AND m.ID_destination=d.ID AND m.ID_parcour=p.ID');
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
        $parcours[$i]['clef']=$donnees['clef'];
        $parcours[$i]['promo']=$donnees['promo'];
        $parcours[$i]['nom']=trim($donnees['nom']);
        $parcours[$i]['prenom']=trim($donnees['prenom']);
        $parcours[$i]['dest_nom']=trim($donnees['dest_nom']);
        $parcours[$i]['ville']=trim($donnees['ville']);
        $parcours[$i]['date']="Du ".trans_date($donnees['date_debut'])." au ".trans_date($donnees['date_fin']);
        $parcours[$i]['tuteur']=trim($donnees['tuteur']);
        $parcours[$i]['domaines']=$domaines;
        $parcours[$i]['types_mobilites']=correct_type_mobilite($donnees['type_mobilite']);
        $parcours[$i]['type_convention']=trim($donnees['type_convention']);
        
        $i++;
    }

$answer['parcours']=$parcours;

$rep = $bdd->query('SELECT type_mobilite FROM destinations group by type_mobilite');
$type_mobilites=[];
while ($donnees = $rep->fetch())
    {
        $type_mobilite=explode("/", $donnees['type_mobilite']);
        $type_mobilite=array_map("correct_type_mobilite2", $type_mobilite);
        $type_mobilites=array_merge($type_mobilites,$type_mobilite);
    }
$type_mobilites=array_unique($type_mobilites);
//sort($type_mobilites);
$type_mobilites=array_merge($type_mobilites);
$answer['mobilities']=$type_mobilites;


$rep = $bdd->query('SELECT promo FROM parcours group by promo');
$i=0;
while ($donnees = $rep->fetch())
    {
        $promos2[$i]=$donnees['promo'];
        $i++;
    }

$answer['promos']=$promos2;



$rep = $bdd->query('SELECT continent as continents FROM pays group by continents');
$continents=[];
while ($donnees = $rep->fetch())
    {
        $continent=explode("/", $donnees['continents']);
        $continent=array_map("trim", $continent);
        $continents=array_merge($continents,$continent);
    }
$continents=array_iunique($continents);
sort($continents);
$answer['continents']=$continents;

$rep = $bdd->query('SELECT continent, nom as pays FROM pays order by pays');
$authorized_pays['pays']=[];
$authorized_pays['continent']=[];
$i=0;
while ($donnees = $rep->fetch())
    {
        $authorized_pays['pays'][$i]= trim($donnees['pays']);
        $authorized_pays['continent'][$i]= trim($donnees['continent']);
        $i++;
    }

$answer['authorized_pays']=$authorized_pays;

$rep = $bdd->query('SELECT v.nom, p.nom as pays FROM villes v, pays p where v.ID_pays=p.ID order by nom');
$authorized_villes['villes']=[];
$authorized_villes['pays']=[];
$i=0;
while ($donnees = $rep->fetch())
    {
        $authorized_villes['villes'][$i]= trim($donnees['nom']);
        $authorized_villes['pays'][$i]= trim($donnees['pays']);
        $i++;
    }

$answer['authorized_villes']=$authorized_villes;


$answer_json =json_encode($answer);
echo $answer_json;
?>