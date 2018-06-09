<?php
 include "connection_back_office.php";


$rep = $bdd->query('SELECT ID, titre, contenu_mob from contenu_mob');

while ($donnees = $rep->fetch())
    {
        $contenu_mob[$donnees["ID"]]['titre']=$donnees["titre"];
        $contenu_mob[$donnees["ID"]]['contenu']=$donnees["contenu_mob"];
        $contenu_mob[$donnees["ID"]]['ID']=$donnees["ID"];
        if ($donnees["ID"]==1 OR $donnees["ID"]==8 OR $donnees["ID"]==11 OR $donnees["ID"]==17 OR $donnees["ID"]==18 OR $donnees["ID"]==19)
        {
            $contenu_mob[$donnees["ID"]]['titre_section']=true;
        }else{
            $contenu_mob[$donnees["ID"]]['titre_section']=false;
        }

        if ($donnees["ID"]==9 OR $donnees["ID"]==12)
        {
            $contenu_mob[$donnees["ID"]]['image']=true;
        }else{
            $contenu_mob[$donnees["ID"]]['image']=false;
        }
        $contenu_mob[$donnees["ID"]]['modif']=false;
    }
        

$answer[0]=$contenu_mob[1];
$answer[1]=$contenu_mob[2];
$answer[2]=$contenu_mob[8];
$answer[3]=$contenu_mob[9];
$answer[4]=$contenu_mob[10];
$answer[5]=$contenu_mob[3];
$answer[6]=$contenu_mob[4];
$answer[7]=$contenu_mob[5];
$answer[8]=$contenu_mob[6];
$answer[9]=$contenu_mob[11];
$answer[10]=$contenu_mob[12];
$answer[11]=$contenu_mob[13];
$answer[12]=$contenu_mob[7];
$answer[13]=$contenu_mob[19];
$answer[14]=$contenu_mob[14];
$answer[15]=$contenu_mob[15];
$answer[16]=$contenu_mob[16];
$answer[17]=$contenu_mob[17];
$answer[18]=$contenu_mob[18];


$answer_json =json_encode($answer);
echo $answer_json;
?>