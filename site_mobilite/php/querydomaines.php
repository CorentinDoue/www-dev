<?php
include "connection_back_office.php";


$rep = $bdd->query('SELECT ID, nom  FROM domaines order by nom');
$i=0;
while ($donnees = $rep->fetch())
    {   
        $domaines[$i]['nom']= trim($donnees['nom']);
        $domaines[$i]['ID']= $donnees['ID'];
        $i++;
    }

$answer_json =json_encode($domaines);
echo $answer_json;
?>