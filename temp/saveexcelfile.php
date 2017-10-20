<?php
include "php/connection_back_office.php";

if (isset($_POST['file']) and $_POST['file']=="null")
	$answer['statut']="error_type_fichier";
else{
	$name='EXCEL'.time();
	$infosfichier = pathinfo($_FILES['file']['name']);

	$extension_upload = $infosfichier['extension'];
	move_uploaded_file($_FILES['file']['tmp_name'], 'documents/excel/' . basename($name.".".$extension_upload));

	$answer['statut']="ok";
	$answer['name']=$name.".".$extension_upload;

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
	$inputFileName = 'documents/excel/'.$answer['name'];


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
	$answer['ligne']=$highestRow;
	$answer['date']=date('d-M-Y',$objPHPExcel->getProperties()->getModified());

	//try {
		$sheet2 = $objPHPExcel->getSheet(1);
		$highestRow2 = $sheet2->getHighestRow();
		$highestColumn2 = $sheet2->getHighestColumn();

		$Data2 = $sheet2->rangeToArray('A1:' . $highestColumn2 . $highestRow2, NULL, TRUE, FALSE);

		if ($Data2[0][0]=="DOM")
		{
			for ($ligne=2; $ligne < $highestRow2; $ligne++) {
				if ($Data2[$ligne][0]==""){
					$req = $bdd->prepare('SELECT ID FROM domaines WHERE nom=?');
					$req->execute(array(trim($Data2[$ligne][1])));
					$i=0;
					while ($donnees = $req->fetch())
					    {
					        $ligneID=$donnees['ID'];
							$i++;
					    }
					if($i==0)
					{
						$req = $bdd->prepare('INSERT INTO domaines VALUES (NULL,:nom,:code)');
						$req->execute(array(
						    'nom' => $Data2[$ligne][1],
								'code' => $Data2[$ligne][2]
						    ));
						$new=true;
					}else{
						$new=false;
					}
				}else{
					$ligneID=$Data2[$ligne][0];
					$new=false;
				}
				if (!$new) {
					$rep = $bdd->prepare('UPDATE domaines SET nom=:nom, code=:code WHERE ID=:ID');
	        $rep->execute(array(
	            'ID' => $ligneID,
	            'nom' => trim($Data2[$ligne][1]),
	            'code' => trim($Data2[$ligne][2]),
	            ));
				}
			}
		}
	//} catch (Exception $e) {
	//}



	$Data = $sheet->rangeToArray('A1:' . $highestColumn . $highestRow, NULL, TRUE, FALSE);
	if ($Data[0][0]=="EXD1")
	{
		$answer['type']="destinations";
	}elseif ($Data[0][0]=="EXP2") {
		$answer['type']="parcours";
	}else{
		$answer['statut']='error_excel';
	}

}
$answer_json =json_encode($answer);
echo $answer_json;
?>
