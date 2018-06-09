<?php
include "connection_back_office.php";

if (isset($_POST['ID']))
{

    $rep = $bdd->prepare('UPDATE contenu_mob SET contenu_mob=:contenu_mob, titre=:titre WHERE ID=:ID');
    $rep->execute(array(
        'ID' => $_POST['ID'],
        'contenu_mob' => $_POST['contenu'],
        'titre' => $_POST['titre']        
        ));
    //$answer_json =json_encode('false');
    //echo $answer_json;
    echo "false";
}else{
    //$answer_json =json_encode('true');
    //echo $answer_json;
    echo "true";
}

        


?>