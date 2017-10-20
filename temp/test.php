<?php include "php/connection_back_office.php" ;?>
<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html id="test">
	<head>
		<title>Mobilités internationales EMSE - Test</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body  ng-app="myApptest"  ng-controller="mainController">
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
							
							<?php $CP =0; 
							include "php/header_back_office.php" ?>

						</div>
					</div>
				</div>
			</div>
			<!--<div id="banner-wrapper">
				<div class="container">

					<div id="banner">
						<h2>Here, the video</h2>
						<span>Video of presentation of the international mobility proposed by the EMSE </span>
					</div>

				</div>
			</div>-->
			<div id="main">
				<div class="container">
					<div style="display: flex; justify-content: center; width: 100%" ng-if="error">
						<div class="C1" >
							<div class="titre_section">Une erreur est survenue</div>
							<div>{{errormessage}}</div>
							<div>Appuyez sur recommencer pour recharger le contenu du dossier test</div>
							<a href="test.php"><div class="button">Recommencer</div></a>
						</div>
					</div>

					<div style="display: flex; justify-content: center; width: 100%" ng-if="done">
						<div class="C1" ng-if="done">
							<div class="titre_section">Le document a été enregistrer</div>
							<div>/!\ Pensez à vérifier néanmoins l'intégrité du fichier /!\</div>
							<div>Appuyez sur recommencer pour recharger le contenu du dossier test</div>
							<a href="test.php"><div class="button">Recommencer</div></a>
						</div>
					</div>
					<div class="titre_section">Test upload</div>
					<div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger un document</div>
					<div  class="form_L1">
						<div class="C1">
							<div class="bouton" ngf-select="upload($file)">Upload file</div>
						</div>
						<div class="C1">
							<div>Drop File:</div>
							<div ngf-drop="upload($file)" class="drop-box" ngf-drag-over-class="'dragover'"><div>Drop</div><div>file here</div></div>
							<div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
						</div >
					</div>
					<div  class="form_L1" ng-bind="progress"></div>
					<div style="display: flex; justify-content: center; width: 100%">
						<div class="C1">
							<div class="titre_section">Contenu du dossier test</div>
							<div>Le dossier test se trouve à l'adresse /documents/test du dossier html du compte mobinter.asso :</div>
							<?php 
							$dir = "documents/test";

							// Ouvre un dossier bien connu, et liste tous les fichiers
							if (is_dir($dir)) {
							    if ($dh = opendir($dir)) {
							        $filename = readdir($dh);
							        echo '<a href="documents/test/'.$filename.'" target="_blank"><div>Dossier test</div></a><div><br></div>';
							        $filename = readdir($dh);
							        while (($file = readdir($dh)) !== false) {
							        	$filename="documents/test/".$file;
							        	echo '<a href="'.$filename.'" target="_blank"><div>'.$file . ': ' . filesize($filename) . ' bytes </div></a>';
							 
							        }
							        closedir($dh);
							    }
							}
							
							
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="footer-wrapper">
				<div class="container">					
					<div class="row">
						<div class="12u">

							<div id="copyright">
								&copy; Mobilités internationales pour les nuls. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/angularjs.js" type="text/javascript"></script>
			<script src="assets/js/sanitize.js" type="text/javascript"></script>
			<script src="assets/js/ng-file-upload-shim.js"></script>
			<script src="assets/js/ng-file-upload.js"></script>
			<script src="assets/js/angularapptest.js" type="text/javascript"></script>
	</body>
</html>