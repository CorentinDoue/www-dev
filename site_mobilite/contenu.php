<?php include "php/connection_back_office.php"; ?>
<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Mobilités internationales EMSE - Mise à jour des contenus</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body ng-app="myApp2"  ng-controller="mainController">
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<?php $CP =1; 
							include "php/header_back_office.php" ?>
							

						</div>
					</div>
				</div>
			</div>
			<div id="main">
				<div class="container">
					<div class="row main-row" ng-repeat="contenu in contenus">
						<div ng-if="!contenu.modif">
							<div class="titre_section" ng-if="contenu.titre_section">{{contenu.titre}}</div>
							<div class="titre_section" ng-if="contenu.ID==2">Quand partir ?</div>
							<div class="12u" ng-if="contenu.contenu">							
								<section>
									<h2 ng-if="!contenu.titre_section">{{contenu.titre}}</h2>
									<p ng-if="!contenu.image" ng-bind-html="contenu.contenu"></p>
									<div style="display: flex; justify-content: center; width: 100%;" ng-if="contenu.image">
										<img src="images/{{contenu.contenu}}">
									</div>								
								</section>
							</div>
							<button class="button" ng-click="modif(contenu)">Modifier</button>	
						</div>
						<div ng-if="contenu.modif" style="width: 100%;">
							<form class="form_modif">
								<textarea class="titre_modif" ng-model="contenu.titre"> </textarea>
								<textarea class="text_modif" ng-model="contenu.contenu"></textarea>
								<button class="button" ng-click="save(contenu)">Enregistrer</button>
							</form>
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
			<script src="assets/js/angularapp2.js" type="text/javascript"></script>

	</body>
</html>