<?php
 include "connection_back_office.php";


$rep = $bdd->query('SELECT ID, titre, contenu from contenu');

while ($donnees = $rep->fetch())
    {
        $contenu[$donnees["ID"]]['titre']=$donnees["titre"];
        $contenu[$donnees["ID"]]['contenu']=$donnees["contenu"];
        $contenu[$donnees["ID"]]['ID']=$donnees["ID"];
        if ($donnees["ID"]==1 OR $donnees["ID"]==8 OR $donnees["ID"]==11 OR $donnees["ID"]==17 OR $donnees["ID"]==18 OR $donnees["ID"]==19)
        {
            $contenu[$donnees["ID"]]['titre_section']=true;
        }else{
            $contenu[$donnees["ID"]]['titre_section']=false;
        }

        if ($donnees["ID"]==9 OR $donnees["ID"]==12)
        {
            $contenu[$donnees["ID"]]['image']=true;
        }else{
            $contenu[$donnees["ID"]]['image']=false;
        }
        $contenu[$donnees["ID"]]['modif']=false;
    }
        

$answer[0]=$contenu[1];
$answer[1]=$contenu[2];
$answer[2]=$contenu[8];
$answer[3]=$contenu[9];
$answer[4]=$contenu[10];
$answer[5]=$contenu[3];
$answer[6]=$contenu[4];
$answer[7]=$contenu[5];
$answer[8]=$contenu[6];
$answer[9]=$contenu[11];
$answer[10]=$contenu[12];
$answer[11]=$contenu[13];
$answer[12]=$contenu[7];
$answer[13]=$contenu[19];
$answer[14]=$contenu[14];
$answer[15]=$contenu[15];
$answer[16]=$contenu[16];
$answer[17]=$contenu[17];
$answer[18]=$contenu[18];


$answer_json =json_encode($answer);
echo $answer_json;
?>