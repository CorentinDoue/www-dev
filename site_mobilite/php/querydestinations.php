<?php
include "connection_bdd.php";

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

$rep = $bdd->query('SELECT d.ID as clef, d.complement_nom, d.nom, v.nom as ville, p.nom as pays, d.langue_cours as langues, p.continent,  d.type_mobilite, d.type_convention, d.site_internet, d.activ FROM destinations d, villes v, pays p WHERE d.ID_Ville=v.ID AND v.ID_pays=p.ID order by d.nom');
$i=0;
while ($donnees = $rep->fetch())
    {
        $req = $bdd->prepare('SELECT do.nom FROM domaines do, domainedestination dd WHERE dd.ID_domaine=do.ID AND dd.ID_destination=?');
        $req->execute(array($donnees['clef']));
        $j=0;
        $domaines=[];
        while ($donnees2 = $req->fetch())
            {
                $domaines[$j]=$donnees2['nom'];
                $j++;
            }
        $destinations[$i]['clef']=$donnees['clef'];
        $destinations[$i]['complement_nom']=trim($donnees['complement_nom']);
        $destinations[$i]['nom']=trim($donnees['nom']);
        $destinations[$i]['ville']=trim($donnees['ville']);
        $destinations[$i]['pays']=trim($donnees['pays']);
        $destinations[$i]['continent']=trim($donnees['continent']);
        //$domaines=explode("/", $donnees['domaines']);
        //$domaines=array_map("trim", $domaines);
        $destinations[$i]['domaines']=$domaines;
        $type_mobilites=explode("/", $donnees['type_mobilite']);
        $type_mobilites=array_map("correct_type_mobilite", $type_mobilites);
        $destinations[$i]['types_mobilites']=$type_mobilites;
        $destinations[$i]['type_convention']=trim($donnees['type_convention']);
        $destinations[$i]['site']=trim($donnees['site_internet']);
        $langues=explode("/", $donnees['langues']);
        $langues=array_map("trim", $langues);
        $destinations[$i]['langues']=$langues;
        $destinations[$i]['activ']=$donnees['activ'];
        $i++;
    }

$answer['destinations']=$destinations;

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


$rep = $bdd->query('SELECT nom FROM domaines order by nom');
$i=0;
while ($donnees = $rep->fetch())
    {
        $domaines2[$i]=$donnees['nom'];
        $i++;
    }

$answer['domaines']=$domaines2;

$rep = $bdd->query('SELECT langue_cours as langues FROM destinations group by langues');
$langues=[];
while ($donnees = $rep->fetch())
    {
        $langue=explode("/", $donnees['langues']);
        $langue=array_map("trim", $langue);
        $langues=array_merge($langues,$langue);
    }
$langues=array_iunique($langues);
sort($langues);
$answer['langues']=$langues;

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

$rep = $bdd->query('SELECT type_convention as convention FROM destinations group by convention');
$conventions=[];

while ($donnees = $rep->fetch())
    {   
        $convention=explode("/", $donnees['convention']);
        $convention=array_map("trim", $convention);
        $conventions=array_merge($conventions,$convention);
        
    }
$conventions=array_iunique($conventions);
sort($conventions);
$answer['conventions']=$conventions;


/*function utf8_encode_array($array)
{
    if (is_array($array))
    {
        foreach ($array as $key => $value) {
            $array[$key]=utf8_encode_array($value);
        }
    }else{
        $array=utf8_encode($array);
    }
    return $array;
}
function utf8_decode_array($array)
{
    if (is_array($array))
    {
        foreach ($array as $key => $value) {
            $array[$key]=utf8_encode_array($value);
        }
    }else{
        $array=utf8_encode($array);
    }
    return $array;
}*/
//echo utf8_decode(utf8_encode('é&èàçÉ'));
//print_r(utf8_encode_array($destinations));
//$destinations = array_map('htmlentities',$destinations);utf8_encode_array
$answer_json =json_encode($answer);
echo $answer_json;
?>