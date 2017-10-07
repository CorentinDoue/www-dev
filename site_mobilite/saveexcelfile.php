<?php
	
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