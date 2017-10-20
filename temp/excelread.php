<?php
include "php/connection_back_office.php";


error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Europe/Paris');
/** Include PHPExcel */
require_once 'php/PHPExcel.php';
//include 'Classes/PHPExcel.php';
//include 'Classes/PHPExcel/IOFactory.php';
$inputFileName = 'documents/excel/'.$_GET['excel'];
$modifiee=$_GET['modifiee'];
$ajoutee=$_GET['ajoutee'];
$ligne=$_GET['ligne'];
$answer['errorville']=false;
$answer['errormobilite']=false;
$answer['errordomaine']=false;
$answer['errordate_debut']=false;
$answer['errordate_fin']=false;
$answer['errordestination']=false;

try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
    . '": ' . $e->getMessage());
}
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();



$Data = $sheet->rangeToArray('A1:' . $highestColumn . $highestRow, NULL, TRUE, FALSE);
if ($ligne==$highestRow){
	$answer['modifiee']=$modifiee;
	$answer['ajoutee']=$ajoutee;
	$answer['statut']="terminé";
	$answer_json =json_encode($answer);
	echo $answer_json;

}else{
	function array_iunique($array) {
	    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
	}

	function correct_type_mobilite2($element){
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
	    if (preg_match("#Stage\s*2A#i", $element))
	    {
	    $element='Stage 2A';
	    return $element;
	    }
	    if (preg_match("#D\s*D#i", $element))
	    {
	    $element='Double Diplome';
	    return $element;
	    }
	    if (preg_match("#Doubles?\s*Diplomes?#i", $element))
	    {
	    $element='Double Diplome';
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

	if ($Data[0][0]=="EXD1")
	{
		$answer['type']="destinations";
		//Destinations

		if ($Data[$ligne][1]!=NULL) {

			// ID
				if ($Data[$ligne][0]==""){
					$req = $bdd->prepare('SELECT ID FROM destinations WHERE nom=?');
					$req->execute(array(trim($Data[$ligne][1])));
					$i=0;
					while ($donnees = $req->fetch())
					    {
					        $answer['ligneID']=$donnees['ID'];
							$i++;
					    }
					if($i==0)
					{
						$req = $bdd->prepare('INSERT INTO destinations (nom, complement_nom, type_mobilite, type_convention, langue_cours, site_internet, description, commentaires,activ, document) VALUES (:nom, "A compléter", "", "", "", "compléter avec l\'adresse du site internet", "A compléter", "A compléter",1, "")');
						$req->execute(array(
						    'nom' => $Data[$ligne][1]
						    ));

						$req = $bdd->prepare('SELECT ID FROM destinations WHERE nom=?');
						$req->execute(array($Data[$ligne][1]));
						while ($donnees = $req->fetch())
						    {
						        $answer['ligneID']=$donnees['ID'];
						    }
						$ajoutee++;
					}else{
						$modifiee++;
					}
				}else{
					$answer['ligneID']=$Data[$ligne][0];
					$modifiee++;
				}
			//nom
				$rep = $bdd->prepare('UPDATE destinations SET nom=:titre WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'titre' => trim($Data[$ligne][1])
		            ));
	        //complément
		        if ($Data[$ligne][2]==NULL) {
		       		$Data[$ligne][2]="";
		       	}
		        $rep = $bdd->prepare('UPDATE destinations SET complement_nom=:compl WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'compl' => trim($Data[$ligne][2])
		            ));
	        //site
		        if ($Data[$ligne][11]==NULL) {
		       		$Data[$ligne][11]="";
		       	}
		        $rep = $bdd->prepare('UPDATE destinations SET site_internet=:site WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'site' => trim($Data[$ligne][11])
		            ));
	       	//Description
		       	if ($Data[$ligne][12]==NULL) {
		       		$Data[$ligne][12]="";
		       	}
		       	$rep = $bdd->prepare('UPDATE destinations SET description=:description WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'description' => trim($Data[$ligne][12])
		            ));
	        //Commentaire
		        if ($Data[$ligne][13]==NULL) {
		       		$Data[$ligne][13]="";
		       	}
		        $rep = $bdd->prepare('UPDATE destinations SET commentaires=:com WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'com' => trim($Data[$ligne][13])
		            ));
	        //place
		        if ($Data[$ligne][10]==NULL) {
		       		$Data[$ligne][10]=0;
		       	}
		        $rep = $bdd->prepare('UPDATE destinations SET places=:places WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'places' => $Data[$ligne][10]
		            ));
	        //ingéieurie
		        if ($Data[$ligne][6]==NULL || $Data[$ligne][6]=="") {
		       		$Data[$ligne][6]=0;
		       	}
		       	if (trim($Data[$ligne][6])=="oui" || trim($Data[$ligne][6])=="Oui" || trim($Data[$ligne][6])=="OUI") {
		       		$Data[$ligne][6]=1;
		       	}
		       	 $rep = $bdd->prepare('UPDATE destinations SET ingenieurie=:ingenieurie WHERE ID=:ID');
			        $rep->execute(array(
			            'ID' => $answer['ligneID'],
			            'ingenieurie' => $Data[$ligne][6]
			            ));
	        //Ville
			    if ($Data[$ligne][3]==NULL) {
		       		$Data[$ligne][3]="";
		       	}
		        $rep = $bdd->prepare('SELECT ID FROM villes WHERE nom = ?');
		        $rep->execute(array($Data[$ligne][3]));
		        $i=0;
		        while ($donnees = $rep->fetch())
		        {
		            $ID_villes= $donnees['ID'];
		            $i++;
		        }
		        if($i==0)
		        {
		        	$answer['errorville']=true;
		        	$answer['unknowville']=$Data[$ligne][3];
		        	$answer['unknowpays']=$Data[$ligne][4];
		        }else{
			        $rep = $bdd->prepare('UPDATE destinations SET ID_Ville=:ville WHERE ID=:ID');
			        $rep->execute(array(
			            'ID' => $answer['ligneID'],
			            'ville' => $ID_villes
			            ));
			    }
		    //Domaine
			    if ($Data[$ligne][5]!="" AND $Data[$ligne][5]!=NULL) {

				    $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domainedestination dd WHERE dd.ID_domaine= do.ID AND dd.ID_destination= ?');
			        $rep->execute(array($answer['ligneID']));
			        $i=0;
			        while ($donnees = $rep->fetch())
			        {
			            $previous_domaines[$i]= $donnees['ID'];
			            $i++;
			        }
			        if ($i==0) {
			             $previous_domaines=[];
			        }

			        $new_domaines2=explode("/", $Data[$ligne][5]);
			        $new_domaines2=array_map("trim", $new_domaines2);
			        $j=0;
			        $k=0;
			       $new_domaines=[];
			        foreach ($new_domaines2 as $key => $value) {
			        	$rep = $bdd->prepare('SELECT ID FROM domaines WHERE code= ?');
				        $rep->execute(array($value));
				        $i=0;
				        while ($donnees = $rep->fetch())
				        {
				            $new_domaines[$j]= $donnees['ID'];

				            $i++;
				            $j++;
				        }
				        if ($i==0) {
				        	$answer['errordomaine']=true;
				        	$answer['unknowdomaine'][$k]=$value;
				        	$k++;
				        }
			        }
			        $answer['domaines']= $new_domaines;
			        foreach ($previous_domaines as $key => $value) {
			            if (!in_array($value, $new_domaines)) {
			                //Supprimer la ligne

			                $rep = $bdd->prepare('SELECT ID FROM domainedestination WHERE ID_domaine=:ID_domaine AND ID_destination=:ID_destination');
			                $rep->execute(array(
			                    'ID_destination' => $answer['ligneID'],
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
			                //Ajouter la ligne
			                $req = $bdd->prepare('INSERT INTO domainedestination (ID_destination, ID_domaine) VALUES (:ID_destination, :ID_domaine)');
			                $req->execute(array(
			                    'ID_destination' => $answer['ligneID'],
			                    'ID_domaine' => $value
			                    ));
			            }
			        }
			    }
	        //mobilite
		        $type_mobilite=explode("/", $Data[$ligne][7]);
		        $i=0;
		        $j=0;
		        $type_mobilites=[];
		        foreach ($type_mobilite as $key => $value) {
		        	if (correct_type_mobilite2($value)=="") {
		        		$answer['errormobilite']=true;
		        		$answer['unknowmobilite'][$i]=$value;
		        		$i++;
		        	}else{
		        		$type_mobilites[$j]=correct_type_mobilite2($value);
		        		$j++;
		        	}
		        }
		        $mobilites="";
		        for ($i=0; $i < count($type_mobilites); $i++) {
		        	$mobilites=$mobilites."".$type_mobilites[$i];
		        	if ($i<count($type_mobilites)-1) {
		        		$mobilites=$mobilites."/";
		        	}
		        }

			    $rep = $bdd->prepare('UPDATE destinations SET type_mobilite=:types_mobilites WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'types_mobilites' => $mobilites
		            ));
	        //langues
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
				$new_langues=explode("/", $Data[$ligne][9]);
				$langues_final=[];
				$i=0;
				foreach ($new_langues as $key => $value) {
					$no_match=true;
					foreach ($langues as $key2 => $value2) {
						if (preg_match("#".$value."#i", $value2) AND $no_match) {
							$langues_final[$i]=$value2;
							$i++;
							$no_match=false;
						}
					}
					if ($no_match) {
						$langues_final[$i]=$value;
						$i++;
					}
				}
				$langues="";
				for ($i=0; $i < count($langues_final); $i++) {
		        	$langues=$langues."".$langues_final[$i];
		        	if ($i<count($langues_final)-1) {
		        		$langues=$langues."/";
		        	}
		        }
		        $rep = $bdd->prepare('UPDATE destinations SET langue_cours=:langues WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'langues' => $langues
		            ));
	        //convention
		        $rep = $bdd->query('SELECT type_convention as conventions FROM destinations group by conventions');
				$conventions=[];
				while ($donnees = $rep->fetch())
				    {
				        $convention=explode("/", $donnees['conventions']);
				        $convention=array_map("trim", $convention);
				        $conventions=array_merge($conventions,$convention);
				    }
				$conventions=array_iunique($conventions);
				sort($conventions);
				$new_conventions=explode("/", $Data[$ligne][8]);
				$i=0;
				foreach ($new_conventions as $key => $value) {
					$no_match=true;
					foreach ($conventions as $key2 => $value2) {
						if (preg_match("#".$value."#i", $value2) AND $no_match) {
							$conventions_final[$i]=$value2;
							$i++;
							$no_match=false;
						}
					}
					if ($no_match) {
						$conventions_final[$i]=$value;
						$i++;
					}
				}
				$conventions="";
				for ($i=0; $i < count($conventions_final); $i++) {
		        	$conventions=$conventions."".$conventions_final[$i];
		        	if ($i<count($conventions_final)-1) {
		        		$conventions=$conventions."/";
		        	}
		        }
		        $rep = $bdd->prepare('UPDATE destinations SET type_convention=:conventions WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'conventions' => $conventions
		            ));
		}
	}elseif ($Data[0][0]=="EXP2") {

		$answer['type']="parcours";
		//Parcours
		if ($Data[$ligne][1]!="" AND $Data[$ligne][1]!=NULL) {


			//ID
				if ($Data[$ligne][0]=="" OR $Data[$ligne][0]==NULL){
					$req = $bdd->prepare('INSERT INTO parcours (nom, prenom, promo, date_debut, date_fin, tuteur, type_mobilite, type_convention, rapport, bulletin, remarques) VALUES ("NOM","PRENOM", 2000, "2017-01-01", "2017-01-01", "", "", "", "", "", "")');
					$req->execute();

					$req = $bdd->query('SELECT ID FROM parcours WHERE nom="NOM" and prenom="PRENOM"');

					$donnees = $req->fetch();

					$answer['ligneID']=$donnees['ID'];
					$Data[$ligne][0]=$donnees['ID'];

					$ajoutee++;

				}else{
					$answer['ligneID']=$Data[$ligne][0];
					$modifiee++;
				}
			//fin ID
			//Nom Prenom Promo Dates Tuteur Remarques
			  function todate_debut ($str){
					$array1=explode("/", $str);
					$array2=explode("-", $str);
					$array3=explode(":", $str);
					$ans=0;
					if (count($array1)==3) {
						$ans=$array1[2].'-'.$array1[1].'-'.$array1[0];
					}
					if (count($array2)==3) {
						$ans=$str;
					}
					if (count($array3)==3) {
						$ans=$array3[2].'-'.$array3[1].'-'.$array3[0];
					}
					if ($ans==0) {
						$ans="";
						$answer['errordate_debut']=true;
		        		$answer['unknowdate_debut']=$str;
					}
					return $ans;
				}

				function todate_fin($str){
					$array1=explode("/", $str);
					$array2=explode("-", $str);
					$array3=explode(":", $str);
					$ans=0;
					if (count($array1)==3) {
						$ans=$array1[2].'-'.$array1[1].'-'.$array1[0];
					}
					if (count($array2)==3) {
						$ans=$str;
					}
					if (count($array3)==3) {
						$ans=$array3[2].'-'.$array3[1].'-'.$array3[0];
					}
					if ($ans==0) {
						$ans="";
						$answer['errordate_fin']=true;
		        		$answer['unknowdate_fin']=$str;
					}
					return $ans;
				}

				for ($i=0; $i < 12; $i++) {
					if ($Data[$ligne][$i]==NULL) {
						$Data[$ligne][$i]="";
					}
				}

				$rep = $bdd->prepare('UPDATE parcours SET nom=:nom, prenom=:prenom, promo=:promo, date_debut=:date_debut, date_fin=:date_fin, tuteur=:tuteur, type_mobilite=:type_mobilite, remarques=:remarques  WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'nom' => trim($Data[$ligne][1]),
		            'prenom' => trim($Data[$ligne][2]),
		            'promo' => intval($Data[$ligne][3]),
		            'date_debut' => todate_debut($Data[$ligne][6]),
		            'date_fin' => todate_fin($Data[$ligne][7]),
		            'tuteur' => trim($Data[$ligne][8]),
		            'type_mobilite' => correct_type_mobilite($Data[$ligne][9]),
		            'remarques' => trim($Data[$ligne][11])
		            ));
		    //Domaine
			    if ($Data[$ligne][5]!="" AND $Data[$ligne][5]!=NULL) {

				    $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domaineparcour dp WHERE dp.ID_domaine= do.ID AND dp.ID_parcour= ?');
			        $rep->execute(array($answer['ligneID']));
			        $i=0;
			        while ($donnees = $rep->fetch())
			        {
			            $previous_domaines[$i]= $donnees['ID'];
			            $i++;
			        }
			        if ($i==0) {
			             $previous_domaines=[];
			        }

			        $new_domaines2=explode("/", $Data[$ligne][5]);
			        $new_domaines2=array_map("trim", $new_domaines2);
			        $j=0;
			        $k=0;
			       $new_domaines=[];
			        foreach ($new_domaines2 as $key => $value) {
			        	$rep = $bdd->prepare('SELECT ID FROM domaines WHERE code= ? or nom=?');
				        $rep->execute(array($value,$value));
				        $i=0;
				        while ($donnees = $rep->fetch())
				        {
				            $new_domaines[$j]= $donnees['ID'];

				            $i++;
				            $j++;
				        }
				        if ($i==0) {
				        	$answer['errordomaine']=true;
				        	$answer['unknowdomaine'][$k]=$value;
				        	$k++;
				        }
			        }
			        $answer['domaines']= $new_domaines;
			        foreach ($previous_domaines as $key => $value) {
			            if (!in_array($value, $new_domaines)) {
			                //Supprimer la ligne

			                $rep = $bdd->prepare('SELECT ID FROM domaineparcour WHERE ID_domaine=:ID_domaine AND ID_parcour=:ID_parcour');
			                $rep->execute(array(
			                    'ID_domaine' => $value,
			                    'ID_parcour' => $answer['ligneID']
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
			                //Ajouter la ligne
			                $req = $bdd->prepare('INSERT INTO domaineparcour (ID_parcour, ID_domaine) VALUES (:ID_parcour, :ID_domaine)');
			                $req->execute(array(
			                    'ID_parcour' => $answer['ligneID'],
			                    'ID_domaine' => $value
			                    ));
			            }
			        }
			    }



	        //convention
		        $rep = $bdd->query('SELECT type_convention as conventions FROM destinations group by conventions');
				$conventions=[];
				while ($donnees = $rep->fetch())
				    {
				        $convention=explode("/", $donnees['conventions']);
				        $convention=array_map("trim", $convention);
				        $conventions=array_merge($conventions,$convention);
				    }
				$conventions=array_iunique($conventions);
				sort($conventions);
				$new_conventions=explode("/", $Data[$ligne][10]);
				$i=0;
				foreach ($new_conventions as $key => $value) {
					$no_match=true;
					foreach ($conventions as $key2 => $value2) {
						if (preg_match("#".$value."#i", $value2) AND $no_match) {
							$conventions_final[$i]=$value2;
							$i++;
							$no_match=false;
						}
					}
					if ($no_match) {
						$conventions_final[$i]=$value;
						$i++;
					}
				}
				$conventions="";
				for ($i=0; $i < count($conventions_final); $i++) {
		        	$conventions=$conventions."".$conventions_final[$i];
		        	if ($i<count($conventions_final)-1) {
		        		$conventions=$conventions."/";
		        	}
		        }
		        $rep = $bdd->prepare('UPDATE parcours SET type_convention=:conventions WHERE ID=:ID');
		        $rep->execute(array(
		            'ID' => $answer['ligneID'],
		            'conventions' => $conventions
		            ));
		    //Destinations

		        if ($Data[$ligne][4]!="" AND $Data[$ligne][4]!=NULL) {

				    $rep = $bdd->prepare('SELECT ID_destination FROM mobilite WHERE ID_parcour= ?');
			        $rep->execute(array($answer['ligneID']));
			        $i=0;
			        while ($donnees = $rep->fetch())
			        {
			            $previous_destination= $donnees['ID_destination'];
			            $i++;
			        }
			        if ($i==0) {
			             $previous_destination=NULL;
			        }

			        $rep = $bdd->prepare('SELECT ID FROM destinations WHERE nom LIKE ? or complement_nom LIKE ? or ? LIKE CONCAT("%",nom, "%")');
				    $rep->execute(array('%'.$Data[$ligne][4].'%','%'.$Data[$ligne][4].'%',$Data[$ligne][4]));
			        $i=0;
			        while ($donnees = $rep->fetch())
			        {
			            $new_destination= $donnees['ID'];

			            $i++;

			        }
			        if ($i==0) {
			        	$new_destination="";

			        	$answer['errordestination']=true;
			        	$answer['unknowdestination']=$Data[$ligne][4];
			        }

			        $answer['destination']= $new_destination;

			        if ($previous_destination!=NULL and $previous_destination!=$new_destination)
			        {
		                //Supprimer la ligne

		                $rep = $bdd->prepare('SELECT ID FROM mobilite WHERE ID_destination=:ID_destination AND ID_parcour=:ID_parcour');
		                $rep->execute(array(
		                    'ID_destination' => $previous_destination,
		                    'ID_parcour' => $answer['ligneID']
		                    ));
		                $i=0;
		                while ($donnees = $rep->fetch())
		                {
		                    $ID_suppr= $donnees['ID'];
		                    $i++;
		                }

		                $req = $bdd->prepare('DELETE FROM mobilite WHERE ID = ?');
		                $req->execute(array($ID_suppr));
		            }



		            if ($new_destination!="" and $previous_destination!=$new_destination) {
		                //Ajouter la ligne
		                $req = $bdd->prepare('INSERT INTO mobilite VALUES (NULL, :ID_destination, :ID_parcour)');
		                $req->execute(array(
		                    'ID_destination' => $new_destination,
		                    'ID_parcour' => $answer['ligneID']
		                    ));
		            }

		            //autoremplissage destinations
				    if (!$answer['errordestination']) {
				    	//Domaine
					    if ($Data[$ligne][5]!="" AND $Data[$ligne][5]!=NULL) {

						    $rep = $bdd->prepare('SELECT do.ID FROM domaines do, domainedestination dd WHERE dd.ID_domaine= do.ID AND dd.ID_destination= ?');
					        $rep->execute(array($answer['destination']));
					        $i=0;
					        while ($donnees = $rep->fetch())
					        {
					            $previous_domaines[$i]= $donnees['ID'];
					            $i++;
					        }
					        if ($i==0) {
					             $previous_domaines=[];
					        }


					        $new_domaines=$answer['domaines'];
					        foreach ($new_domaines as $key => $value) {
					            if (!in_array($value, $previous_domaines)) {
					                //Ajouter la ligne
					                $req = $bdd->prepare('INSERT INTO domainedestination (ID_destination, ID_domaine) VALUES (:ID_destination, :ID_domaine)');
					                $req->execute(array(
					                    'ID_destination' => $answer['destination'],
					                    'ID_domaine' => $value
					                    ));
					            }
					        }
					    }
					    // types_mobilités
				        $new_mobilite=correct_type_mobilite($Data[$ligne][9]);
				        $find=false;

				        $rep = $bdd->prepare('SELECT type_mobilite FROM destinations WHERE ID=?');
				        $rep->execute(array($answer['destination']));

				        $donnees=$rep->fetch();

				        $type_mobilites=explode("/", $donnees['type_mobilite']);
        				$type_mobilites=array_map("correct_type_mobilite", $type_mobilites);

        				$mobilites="";
				        for ($i=0; $i < count($type_mobilites); $i++) {
				        	if ($type_mobilites[$i]==$new_mobilite){
				        		$find=true;
				        	}
				        	$mobilites=$mobilites."".$type_mobilites[$i];
				        	if ($i<count($type_mobilites)-1) {
				        		$mobilites=$mobilites."/";
				        	}
				        	if ($i==count($type_mobilites)-1 and !$find) {
				        		$mobilites=$mobilites."/".$new_mobilite;
				        	}
				        }

					    $rep = $bdd->prepare('UPDATE destinations SET type_mobilite=:types_mobilites WHERE ID=:ID');
				        $rep->execute(array(
				            'ID' => $answer['destination'],
				            'types_mobilites' => $mobilites
				            ));
				    }

			    }


		}
	}







	if (!$answer['errorville'] AND !$answer['errormobilite'] AND !$answer['errordomaine'] AND !$answer['errordate_debut'] AND !$answer['errordate_fin'] AND !$answer['errordestination']){
		$answer['modifiee']=$modifiee;
		$answer['ajoutee']=$ajoutee;
		$answer['currentligne']=$ligne;
		$answer['statut']="next";
		$answer_json =json_encode($answer);
		echo $answer_json;
	}else{
		$answer['modifiee']=$modifiee;
		$answer['ajoutee']=$ajoutee;
		$answer['currentligne']=$ligne;
		$answer['statut']="error";
		$answer_json =json_encode($answer);
		echo $answer_json;
	}
}


?>
