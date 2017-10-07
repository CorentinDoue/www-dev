<?php
 
/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Europe/Paris');
include 'Classes/PHPExcel/IOFactory.php';
$inputFileName = 'Depart.xlsx';
 
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
 
//  Loop through each row of the worksheet in turn
/*for ($row = 1; $row <= $highestRow; $row++) {
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    print_r($rowData);
    foreach($rowData[0] as $k=>$v)
        echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";
}*/

$rowData = $sheet->rangeToArray('A1:' . $highestColumn . $highestRow, NULL, TRUE, FALSE);
    print_r($rowData);
?>