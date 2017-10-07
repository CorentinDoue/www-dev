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


$rep = $bdd->query('SELECT d.ID as clef, d.complement_nom, d.nom, v.nom as ville, p.nom as pays, d.langue_cours as langues, p.continent, d.type_mobilite, d.type_convention, d.site_internet, d.activ, d.ingenieurie, d.places, d.commentaires, d.description FROM destinations d, villes v, pays p WHERE d.ID_Ville=v.ID AND v.ID_pays=p.ID');
$i=0;
while ($donnees = $rep->fetch())
    {
        $req = $bdd->prepare('SELECT do.code FROM domaines do, domainedestination dd WHERE dd.ID_domaine=do.ID AND dd.ID_destination=?');
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
        $destinations[$i]['clef']=$donnees['clef'];
        $destinations[$i]['complement_nom']=trim($donnees['complement_nom']);
        $destinations[$i]['nom']=trim($donnees['nom']);
        $destinations[$i]['ville']=trim($donnees['ville']);
        $destinations[$i]['pays']=trim($donnees['pays']);
        $destinations[$i]['continent']=trim($donnees['continent']);
        //$domaines=explode("/", $donnees['domaines']);
        //$domaines=array_map("trim", $domaines);
        $destinations[$i]['domaines']=$domaines;
        $destinations[$i]['types_mobilites']=$donnees['type_mobilite'];
        $destinations[$i]['type_convention']=$donnees['type_convention'];
        $destinations[$i]['site']=$donnees['site_internet'];
        $destinations[$i]['langues']=$donnees['langues'];
        $destinations[$i]['activ']=$donnees['activ'];
        if ($donnees['ingenieurie']==1){
        	$destinations[$i]['ingenieurie']="oui";
        }else{
        	$destinations[$i]['ingenieurie']="";
        }       
        $destinations[$i]['places']=$donnees['places'];
        $destinations[$i]['commentaires']=$donnees['commentaires'];
        $destinations[$i]['description']=$donnees['description'];
        $i++;
    }

$objPHPExcel = new PHPExcel();

// Set document properties

$objPHPExcel->getProperties()->setCreator("Mobilité internationale")
							 ->setLastModifiedBy("Mobilité internationale")
							 ->setTitle("Destinations")
							 ->setSubject("copie de la base de donnée des destinations")
							 ->setDescription("copie de la base de donnée des destinations")
							 ->setKeywords("mobilité destination")
							 ->setCategory("bdd excel");
$datee=date('d-m-Y_H')."h".date('i');



$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', "EXD1" )
			->setCellValue('B1', 'EXCEL TYPE  DES DESTINATIONS' )
			->setCellValue('C1', "Copie de la base de données des destinations du ".$datee );

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
			->setCellValue('B2', "Établissement" )
			->setCellValue('C2', "Complément sur l'établissement")
			->setCellValue('D2', "Ville")
			->setCellValue('E2', "Pays")
			->setCellValue('F2', "Domaines")
			->setCellValue('G2', "Ingénieurie (oui ou rien)")
			->setCellValue('H2', "Types de mobilité")
			->setCellValue('I2', "Types de convention")
			->setCellValue('J2', "Langues des cours")
			->setCellValue('K2', "Place (nombre)")
			->setCellValue('L2', "Site internet")
			->setCellValue('M2', "Description")
			->setCellValue('N2', "Commentaire");

//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getFont()->setBold(true);

//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
//$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->getBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$i=3;
foreach ($destinations as $key => $value)
{	$i=$key+3;
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $value['clef'] )
				->setCellValue('B'.$i, $value['nom'] )
				->setCellValue('C'.$i, $value['complement_nom'] )
				->setCellValue('D'.$i, $value['ville'] )
				->setCellValue('E'.$i, $value['pays'] )
				->setCellValue('F'.$i, $value['domaines'] )
				->setCellValue('G'.$i, $value['ingenieurie'] )
				->setCellValue('H'.$i, $value['types_mobilites'] )
				->setCellValue('I'.$i, $value['type_convention'] )
				->setCellValue('J'.$i, $value['langues'] )
				->setCellValue('K'.$i, $value['places'] )
				->setCellValue('L'.$i, $value['site'] )
				->setCellValue('M'.$i, $value['description'] )
				->setCellValue('N'.$i, $value['commentaires'] );
}  
$objPHPExcel->getActiveSheet()->getStyle("A3:N".$i)->applyFromArray(
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
$objPHPExcel->getActiveSheet()->getStyle("A2:N2")->applyFromArray(
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
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);  
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);  
       
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file

$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save("documents/sav_BDD/BDD_Destinations_".$datee.".xlsx");	

header("location: documents/sav_BDD/BDD_Destinations_".$datee.".xlsx")	
?>