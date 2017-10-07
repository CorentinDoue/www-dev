<?php
include "connection_back_office.php";


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

$answer_json =json_encode($villes);
echo $answer_json;
?>