<?php
include "connection_back_office.php";

function array_iunique($array) {
    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
}

$rep = $bdd->query('SELECT type_convention as convention FROM destinations group by convention');
$i=0;
while ($donnees = $rep->fetch())
    {
        if (trim($donnees['convention'])!="") {
            $conventions[$i]=trim($donnees['convention']);
            $i++;
        }
        
    }

sort($conventions);

$answer_json =json_encode($conventions);
echo $answer_json;
?>