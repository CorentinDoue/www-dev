<?php
include "connection_back_office.php";

function array_iunique($array) {
    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
}

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

$answer_json =json_encode($langues);
echo $answer_json;
?>