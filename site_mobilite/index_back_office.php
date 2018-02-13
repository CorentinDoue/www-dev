<?php include "php/connection_back_office.php"; ?>
<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html id="test">
	<head>
		<title>Mobilités internationales EMSE - Back office accueil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/back_office.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body ng-app="myApp7"  ng-controller="mainController">
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
					<div class="titre_section">Accueil</div>
					<div class="row main-row" style="margin: 0;">

                        <div class="4u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">

                            <a href="contenu.php" class="button">Modifier le contenu</a>

                        </div>
                        <div class="4u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">

                            <a href="modif_bdd.php" class="button">Modifier la base de données</a>

                        </div>
                        <div class="4u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">

                            <a href="excel.php" class="button">Importer ou exporter un excel</a>

                        </div>
                    </div>
                    <div class="row main-row" style="margin: 0;">

                        <div class="12u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">

                            <a ng-click="lay()" class="button">Importer un nouveau guide des mobilités internationales</a>

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
        <div class="layer" ng-if="layer"></div>
        <div class="layer2" ng-if="layer2">
            <div class="dialogue" ng-if="!uploaddone">
                <div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger le nouveau guide (en .pdf)</div>
                <div  class="form_L1">
                    <div class="C1">
                        <div class="bouton" ngf-select="upload($file)">Upload file</div>
                    </div>
                    <div class="C1">
                        <div>Drop File:</div>
                        <div ngf-drop="upload($file)" class="drop-box"
                             ngf-drag-over-class="'dragover'"
                             ngf-pattern="'application/pdf'"><div>Drop</div><div>PDF file here</div></div>
                        <div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
                    </div >
                </div>
                <div  class="form_L1" ng-bind="progress"></div>
                <div class="bouton" ng-click="unlay()">Annuler</div>
            </div>
            <div class="dialogue" ng-if="uploaddone">
                <div class="C1">
                    <div style="text-align: center; width: 100%;">Tâche effectuée</div>
                    <div class="bouton" ng-click="unlay()">Ok</div>
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
            <script src="assets/js/angularapp7.js" type="text/javascript"></script>
        <script src="assets/js/main.js"></script>

	</body>
</html>