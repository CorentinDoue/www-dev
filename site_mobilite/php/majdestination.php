<?php
include "connection_back_office.php";
if (isset($_POST['ID']))
{
    

    if (isset($_POST['titre'])) {
        $rep = $bdd->prepare('UPDATE destinations SET nom=:titre WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'titre' => $_POST['titre']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['compl'])) {
        $rep = $bdd->prepare('UPDATE destinations SET complement_nom=:compl WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'compl' => $_POST['compl']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['site'])) {
        $rep = $bdd->prepare('UPDATE destinations SET site_internet=:site WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'site' => $_POST['site']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['desc'])) {
        $rep = $bdd->prepare('UPDATE destinations SET description=:description WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'description' => $_POST['desc']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['com'])) {
        $rep = $bdd->prepare('UPDATE destinations SET commentaires=:com WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'com' => $_POST['com']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['places'])) {
        $rep = $bdd->prepare('UPDATE destinations SET places=:places WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'places' => $_POST['places']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['types_mobilites'])) {
        $rep = $bdd->prepare('UPDATE destinations SET type_mobilite=:types_mobilites WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'types_mobilites' => $_POST['types_mobilites']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['ville'])) {
        $rep = $bdd->prepare('UPDATE destinations SET ID_Ville=:ville WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'ville' => $_POST['ville']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['ville2'])) {

        $rep = $bdd->prepare('INSERT INTO villes (nom, ID_pays) VALUES (:ville, :ID_pays)');
        $rep->execute(array(
            'ID_pays' => $_POST['pays'],
            'ville' => $_POST['ville2']        
            ));
        $rep = $bdd->prepare('SELECT ID FROM villes WHERE nom = ?');
        $rep->execute(array($_POST['ville2']));

        while ($donnees = $rep->fetch())
        {   
            $ID_villes= $donnees['ID'];
        }

        $rep = $bdd->prepare('UPDATE destinations SET ID_Ville=:ville WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'ville' => $ID_villes        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['ville3'])) {

        $rep = $bdd->prepare('INSERT INTO pays (nom, continent) VALUES (:pays, :continent)');
        $rep->execute(array(
            'pays' => $_POST['pays'],
            'continent' => $_POST['continent']        
            ));
        $rep = $bdd->prepare('SELECT ID FROM pays WHERE nom = ?');
        $rep->execute(array($_POST['pays']));

        while ($donnees = $rep->fetch())
        {   
            $ID_pays= $donnees['ID'];
        }

        $rep = $bdd->prepare('INSERT INTO villes (nom, ID_pays) VALUES (:ville, :ID_pays)');
        $rep->execute(array(
            'ID_pays' => $ID_pays,
            'ville' => $_POST['ville3']        
            ));
        $rep = $bdd->prepare('SELECT ID FROM villes WHERE nom = ?');
        $rep->execute(array($_POST['ville3']));

        while ($donnees = $rep->fetch())
        {   
            $ID_villes= $donnees['ID'];
        }

        $rep = $bdd->prepare('UPDATE destinations SET ID_Ville=:ville WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'ville' => $ID_villes        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['domaines'])) {

        
        $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domainedestination dd WHERE dd.ID_domaine= do.ID AND dd.ID_destination= ?');
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

                $rep = $bdd->prepare('SELECT ID FROM domainedestination WHERE ID_domaine=:ID_domaine AND ID_destination=:ID_destination');
                $rep->execute(array(
                    'ID_destination' => $_POST['ID'],
                    'ID_domaine' => $value
                    ));
                $i=0;
                while ($donnees = $rep->fetch())
                {   
                    $ID_suppr= $donnees['ID'];
                    $i++;
                }

                $req = $bdd->prepare('DELETE FROM domainedestination WHERE ID = ?');
                $req->execute(array($ID_suppr));
            }
        }

        foreach ($new_domaines as $key => $value) {
            if (!in_array($value, $previous_domaines)) {
                if($value!=""){
                    //Ajouter la ligne
                    $req = $bdd->prepare('INSERT INTO domainedestination (ID_destination, ID_domaine) VALUES (:ID_destination, :ID_domaine)');
                    $req->execute(array(
                        'ID_destination' => $_POST['ID'],
                        'ID_domaine' => $value
                        ));
                }
            }
        }

        
        echo "false";
    }

    if (isset($_POST['domaine'])) {
        $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domainedestination dd WHERE dd.ID_domaine= do.ID AND dd.ID_destination= ?');
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
                $req = $bdd->prepare('INSERT INTO domainedestination (ID_destination, ID_domaine) VALUES (:ID_destination, :ID_domaine)');
                $req->execute(array(
                    'ID_destination' => $_POST['ID'],
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

        $req = $bdd->prepare('INSERT INTO domainedestination (ID_destination, ID_domaine) VALUES (:ID_destination, :ID_domaine)');
        $req->execute(array(
            'ID_destination' => $_POST['ID'],
            'ID_domaine' => $ID_domaine
            ));

        echo "false";
    }

    if (isset($_POST['langues'])) {
        $rep = $bdd->prepare('UPDATE destinations SET langue_cours=:langues WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'langues' => $_POST['langues']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['convention'])) {
        if ($_POST['convention']=="null") {
           $_POST['convention']="";
        }
        $rep = $bdd->prepare('UPDATE destinations SET type_convention=:convention WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'convention' => $_POST['convention']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['activ'])) {
        $rep = $bdd->prepare('UPDATE destinations SET activ=:activ WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'activ' => $_POST['activ']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['ingenieurie'])) {
        $rep = $bdd->prepare('UPDATE destinations SET ingenieurie=:ingenieurie WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'ingenieurie' => $_POST['ingenieurie']        
            ));
        //$answer_json =json_encode('false');
        //echo $answer_json;
        echo "false";
    }

    if (isset($_POST['doc'])) {
        $rep = $bdd->prepare('UPDATE destinations SET document=:doc WHERE ID=:ID');
        $rep->execute(array(
            'ID' => $_POST['ID'],
            'doc' => $_POST['doc']        
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