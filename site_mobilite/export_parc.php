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

function array_iunique($array) {
    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
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
    if (preg_match("#Stage\s*2A#i", $element))
    {
    $element='stage_2A';
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


$rep = $bdd->query('SELECT p.ID as clef, p.nom, p.prenom, p.promo, p.date_debut, p.date_fin, p.tuteur, p.type_mobilite, p.type_convention, p.remarques, d.nom as destination FROM parcours p, destinations d, mobilite m WHERE d.ID=m.ID_destination and p.ID=m.ID_parcour ORDER BY p.date_debut');
$i=0;
while ($donnees = $rep->fetch())
    {
        $req = $bdd->prepare('SELECT do.code FROM domaines do, domaineparcour dp WHERE dp.ID_domaine=do.ID AND dp.ID_parcour=?');
        $req->execute(array($donnees['clef']));
        $j=0;
        $domaines="";
        while ($donnees2 = $req->fetch())
        {
            if ($j!=0) {
            	$domaines=$domaines."/";
            }
            $domaines=$domaines."".$donnees2['code'];
            $j++;
        }
        $parcours[$i]['clef']=$donnees['clef'];
        $parcours[$i]['nom']=trim($donnees['nom']);
        $parcours[$i]['prenom']=trim($donnees['prenom']);
        $parcours[$i]['promo']=$donnees['promo'];
        $parcours[$i]['date_debut']=$donnees['date_debut'];
        $parcours[$i]['date_fin']=$donnees['date_fin'];
        $parcours[$i]['domaines']=$domaines;
        $parcours[$i]['tuteur']=trim($donnees['tuteur']);
        $parcours[$i]['types_mobilites']=$donnees['type_mobilite'];
        $parcours[$i]['type_convention']=$donnees['type_convention'];
        $parcours[$i]['remarques']=$donnees['remarques'];
        $parcours[$i]['destination']=$donnees['destination'];
        $i++;
    }

$objPHPExcel = new PHPExcel();

// Set document properties

$objPHPExcel->getProperties()->setCreator("Mobilité internationale")
							 ->setLastModifiedBy("Mobilité internationale")
							 ->setTitle("parcours")
							 ->setSubject("copie de la base de donnée des parcours")
							 ->setDescription("copie de la base de donnée des parcours")
							 ->setKeywords("mobilité destination")
							 ->setCategory("bdd excel");
$datee=date('d-m-Y_H')."h".date('i');



$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', "EXP2" )
			->setCellValue('B1', 'EXCEL TYPE  DES PARCOURS' )
			->setCellValue('C1', "Copie de la base de données des parcours du ".$datee );

$objPHPExcel->getActiveSheet()->getStyle("B1:C1")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK
        	)
       	),
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '005470'),
            'size' => 18
        )

        
    )
);

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A2', "ID" )
			->setCellValue('B2', "Nom" )
			->setCellValue('C2', "Prénom")
			->setCellValue('D2', "Promo")
			->setCellValue('E2', "Destination")
			->setCellValue('F2', "Domaines")
			->setCellValue('G2', "Date de début de séjour")
			->setCellValue('H2', "Date de fin de séjour")
			->setCellValue('I2', "Tuteur")
			->setCellValue('J2', "Type de mobilité")
			->setCellValue('K2', "Type de convention")
			->setCellValue('L2', "Remarques");

//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getFont()->setBold(true);

//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$i=3;
foreach ($parcours as $key => $value)
{	$i=$key+3;
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $value['clef'] )
				->setCellValue('B'.$i, $value['nom'] )
				->setCellValue('C'.$i, $value['prenom'] )
				->setCellValue('D'.$i, $value['promo'] )
				->setCellValue('E'.$i, $value['destination'] )
				->setCellValue('F'.$i, $value['domaines'] )
				->setCellValue('G'.$i, $value['date_debut'] )
				->setCellValue('H'.$i, $value['date_fin'] )
				->setCellValue('I'.$i, $value['tuteur'] )
				->setCellValue('J'.$i, $value['types_mobilites'] )
				->setCellValue('K'.$i, $value['type_convention'] )
				->setCellValue('L'.$i, $value['remarques'] );
}  
$objPHPExcel->getActiveSheet()->getStyle("A3:L".$i)->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        )
    )
);
$objPHPExcel->getActiveSheet()->getStyle("A2:L2")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK
        	)
       	),
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '005470'),
            'size' => 14
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        )
        
    )
);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);  
 
       
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save("documents/sav_BDD/BDD_Parcours_".$datee.".xlsx");	

header("location: documents/sav_BDD/BDD_Parcours_".$datee.".xlsx")	
?>