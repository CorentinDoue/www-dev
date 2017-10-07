<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Europe/Paris');
/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';
//include 'Classes/PHPExcel.php';
//include 'Classes/PHPExcel/IOFactory.php';
$inputFileName = 'offre.xlsx';

echo date('H:i:s') , "Load Document" , EOL;
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
    . '": ' . $e->getMessage());
}
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(1);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
 
//  Loop through each row of the worksheet in turn
/*for ($row = 1; $row <= $highestRow; $row++) {
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    print_r($rowData);
    foreach($rowData[0] as $k=>$v)
        echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";
}*/
echo date('H:i:s') , " Put data in array" , EOL;
$Data = $sheet->rangeToArray('A1:' . $highestColumn . $highestRow, NULL, TRUE, FALSE);
//print_r($Data);

/** Include PHPExcel */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
//include 'Classes/PHPExcel.php';

// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Corentin Doué")
							 ->setLastModifiedBy("Corentin Doué")
							 ->setTitle("Modification de offre")
							 ->setSubject("Modification de offre")
							 ->setDescription("Mise sur une ligne des info sur 2 lignes")
							 ->setKeywords("mobilité offre")
							 ->setCategory("modified excel");
// Add some data
echo date('H:i:s') , " Add data" , EOL;
for ($row = 1; $row <= ($highestRow/2); $row++) {
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$row, $Data[2*$row-2][1] )
				->setCellValue('B'.$row, $Data[2*$row-1][0] )
				->setCellValue('C'.$row, $Data[2*$row-1][1] )
				->setCellValue('D'.$row, $Data[2*$row-1][2] )
				->setCellValue('E'.$row, $Data[2*$row-1][3] )
				->setCellValue('F'.$row, $Data[2*$row-1][4] )
				->setCellValue('G'.$row, $Data[2*$row-1][5] );
}          
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;
?>