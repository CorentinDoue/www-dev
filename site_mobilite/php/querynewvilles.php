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




$rep = $bdd->query('SELECT v.ID, p.continent, v.nom as ville, p.nom as pays FROM villes v, pays p where v.ID_pays=p.ID order by ville');

$i=0;
while ($donnees = $rep->fetch())
    {   
        $villes[$i]['ID']= trim($donnees['ID']);
        $villes[$i]['ville']= trim($donnees['ville']);
        $villes[$i]['pays']= trim($donnees['pays']);
        $villes[$i]['continent']= trim($donnees['continent']);
        $i++;
    }

$rep = $bdd->query('SELECT ID, continent, nom as pays FROM pays order by pays');

$i=0;
while ($donnees = $rep->fetch())
    {   
        $pays[$i]['ID']= trim($donnees['ID']);
        $pays[$i]['pays']= trim($donnees['pays']);
        $pays[$i]['continent']= trim($donnees['continent']);
        $i++;
    }

$rep = $bdd->query('SELECT continent FROM pays group by continent');

$i=0;
while ($donnees = $rep->fetch())
    {   
        $continent[$i]= trim($donnees['continent']);
        $i++;
    }

$answer['villes']=$villes;
$answer['pays']=$pays;
$answer['continent']=$continent;

$answer_json =json_encode($answer);
echo $answer_json;
?>