<?php
include "connection_back_office.php";


$rep = $bdd->query('SELECT code, nom  FROM domaines order by nom');
$i=0;
while ($donnees = $rep->fetch())
    {   
        $domaines['domaine'][$i]= trim($donnees['nom']);
        $domaines['code'][$i]= $donnees['code'];
        $i++;
    }

$answer_json =json_encode($domaines);
echo $answer_json;
?>