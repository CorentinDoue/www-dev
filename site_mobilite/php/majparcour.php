<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include "connection_back_office.php";
if (isset($_POST['ID']))
{
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
    if (preg_match("#Stage_?\s*2A#i", $element))
    {
    $element='stage 2A';
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


    if (isset($_POST['prenom'])) {
        $rep = $bdd->prepare('UPDATE parcours SET prenom=:prenom WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'prenom' => $_POST['prenom']        
            ));
        
        echo "false";
    }

    if (isset($_POST['nom'])) {
        $rep = $bdd->prepare('UPDATE parcours SET nom=:nom WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'nom' => $_POST['nom']        
            ));
        
        echo "false";
    }

    if (isset($_POST['tuteur'])) {
        $rep = $bdd->prepare('UPDATE parcours SET tuteur=:tuteur WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'tuteur' => $_POST['tuteur']        
            ));
        
        echo "false";
    }

    if (isset($_POST['remarques'])) {
        $rep = $bdd->prepare('UPDATE parcours SET remarques=:remarques WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'remarques' => $_POST['remarques']        
            ));
        
        echo "false";
    }

    if (isset($_POST['promo'])) {
        $rep = $bdd->prepare('UPDATE parcours SET promo=:promo WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'promo' => $_POST['promo']        
            ));
        
        echo "false";
    }

    if (isset($_POST['date_debut'])) {
        $rep = $bdd->prepare('UPDATE parcours SET date_debut=:date_debut WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'date_debut' => $_POST['date_debut']        
            ));
        
        echo "false";
    }

    if (isset($_POST['date_fin'])) {
        $rep = $bdd->prepare('UPDATE parcours SET date_fin=:date_fin WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'date_fin' => $_POST['date_fin']        
            ));
        
        echo "false";
    }

    if (isset($_POST['types_mobilites'])) {
        $rep = $bdd->prepare('UPDATE parcours SET type_mobilite=:types_mobilites WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'types_mobilites' => correct_type_mobilite($_POST['types_mobilites'])        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    

    

    if (isset($_POST['domaines'])) {

        
        $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domaineparcour dp WHERE dp.ID_domaine= do.ID AND dp.ID_parcour= ?');
        $rep->execute(array($_POST['ID']));
        $i=0;
        while ($donnees = $rep->fetch())
        {   
            $previous_domaines[$i]= $donnees['ID'];
            $i++;
        }
        if ($i==0) {
             $previous_domaines=[];
        }

        $new_domaines=explode(",", $_POST['domaines']);
        
        foreach ($previous_domaines as $key => $value) {
            if (!in_array($value, $new_domaines)) {
                //Supprimer la ligne

                $rep = $bdd->prepare('SELECT ID FROM domaineparcour WHERE ID_domaine=:ID_domaine AND ID_parcour=:ID_parcour');
                $rep->execute(array(
                    'ID_parcour' => $_POST['ID'],
                    'ID_domaine' => $value
                    ));
                $i=0;
                while ($donnees = $rep->fetch())
                {   
                    $ID_suppr= $donnees['ID'];
                    $i++;
                }

                $req = $bdd->prepare('DELETE FROM domaineparcour WHERE ID = ?');
                $req->execute(array($ID_suppr));
            }
        }

        foreach ($new_domaines as $key => $value) {
            if (!in_array($value, $previous_domaines)) {
                if($value!=""){
                    //Ajouter la ligne
                    $req = $bdd->prepare('INSERT INTO domaineparcour (ID_parcour, ID_domaine) VALUES (:ID_parcour, :ID_domaine)');
                    $req->execute(array(
                        'ID_parcour' => $_POST['ID'],
                        'ID_domaine' => $value
                        ));
                }
            }
        }

        
        echo "false";
    }

    if (isset($_POST['domaine']) and !isset($_POST['code'])) {

        
        $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domaineparcour dp WHERE dp.ID_domaine= do.ID AND dp.ID_parcour= ?');
        $rep->execute(array($_POST['ID']));
        $i=0;
        while ($donnees = $rep->fetch())
        {   
            $previous_domaines[$i]= $donnees['ID'];
            $i++;
        }
        if ($i==0) {
             $previous_domaines=[];
        }

        

       
            if (!in_array($_POST['domaine'], $previous_domaines)) {
                if($_POST['domaine']!=""){
                    //Ajouter la ligne
                    $req = $bdd->prepare('INSERT INTO domaineparcour (ID_parcour, ID_domaine) VALUES (:ID_parcour, :ID_domaine)');
                    $req->execute(array(
                        'ID_parcour' => $_POST['ID'],
                        'ID_domaine' => $_POST['domaine']
                        ));
                }
            }
        

        
        echo "false";
    }

    if (isset($_POST['code'])) {

        $req = $bdd->prepare('INSERT INTO domaines (nom, code) VALUES (:nom, :code)');
        $req->execute(array(
            'nom' => $_POST['domaine'],
            'code' => $_POST['code']
            ));
        

        $req = $bdd->prepare('SELECT ID FROM domaines WHERE nom=:nom AND code=:code');
        $req->execute(array(
            'nom' => $_POST['domaine'],
            'code' => $_POST['code']
            ));
        
        while ($donnees = $req->fetch())
            {   
                $ID_domaine= $donnees['ID'];
                
            }

        $rep = $bdd->prepare('INSERT INTO domaineparcour (ID_parcour, ID_domaine) VALUES (:ID_parcour, :ID_domaine)');
        $rep->execute(array(
            'ID_parcour' => $_POST['ID'],
            'ID_domaine' => $ID_domaine
            ));

        echo "false";
    }

    

    if (isset($_POST['convention'])) {
        if ($_POST['convention']=="null") {
           $_POST['convention']="";
        }
        $rep = $bdd->prepare('UPDATE parcours SET type_convention=:convention WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'convention' => $_POST['convention']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['destination'])) {
        $rep = $bdd->prepare('SELECT ID_destination FROM  mobilite WHERE ID_parcour= ?');
        $rep->execute(array($_POST['ID']));
        $i=0;
        while ($donnees = $rep->fetch())
        {   
            $previous_destination= $donnees['ID_destination'];
            $i++;
        }
        if ($i==0) {
            $req = $bdd->prepare('INSERT INTO mobilite (ID_destination,ID_parcour) VALUES (:ID_destination,:ID_parcour)');
            $req->execute(array(
                'ID_destination' =>$_POST['destination'],
                'ID_parcour' => $_POST['ID']
                ));
        }else{
            $rep = $bdd->prepare('UPDATE mobilite SET ID_destination=:ID_destination WHERE ID_parcour=:ID_parcour');
            $rep->execute(array(
                'ID_destination' =>$_POST['destination'],
                'ID_parcour' => $_POST['ID']        
                ));
        }

        echo "false";
    }

    

    if (isset($_POST['rapport'])) {
        $rep = $bdd->prepare('UPDATE parcours SET rapport=:rapport WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'rapport' => $_POST['rapport']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['plan'])) {
        $rep = $bdd->prepare('UPDATE parcours SET bulletin=:bulletin WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'bulletin' => $_POST['plan']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

}else{
    //$answer_json =json_encode('true');
    //echo $answer_json;
    echo "true";
}

        


?>