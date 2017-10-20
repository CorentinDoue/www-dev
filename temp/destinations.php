<?php include "php/connection.php"; ?>
<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Mobilités internationales EMSE - Destinations</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
	<body ng-app="myApp"  ng-controller="mainController">
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<?php $CP=2;
							include "php/header.php"; ?>
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

					<div class="row main-row">
						<div class="12u">
							<div class="onglet_recherche">
								<div class="recherche_L1">
									<h2>Ma recherche :</h2>
									<div><input class="recherche_prio" ng-model="recherche_prio" type="text" placeholder="Tappez le nom d'une destination, d'une ville, ..."></div>
									<div></div>
								</div>
								<div class="recherche_L1">
									<h2>Filtres :</h2>
								</div>
								<div class="block_recherche">
									<div class="recherche_C1 marge">
										<div class="recherche_item">
											<div class="texte_recherche">Types de mobilité :</div>
											<div class="result_recherche5" ng-mouseover="search.mobilities.isactive=true" ng-mouseleave="search.mobilities.isactive=false">
												<div class="resume" ng-if="!search.mobilities.isactive">{{search.mobilities.resume}}</div>
												<div class="unchecked clickable" ng-click="search.mobilities.selectall()" ng-if="search.mobilities.isactive">{{search.mobilities.select}}</div>
												<div ng-repeat="mobility in search.mobilities.checkable" ng-if="search.mobilities.isactive">
													<div class="checked" ng-if="search.mobilities.isin(mobility)">
														<div class="option_texte clickable" ng-click="search.mobilities.uncheck(mobility)">{{mobility}}</div><div class="clickable" ng-click="search.mobilities.uncheck(mobility)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search.mobilities.check(mobility)" ng-if="!search.mobilities.isin(mobility)">
														<div class="option_texte">{{mobility}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="recherche_item">
											<div class="texte_recherche">Domaines d'études :</div>
											<div class="result_recherche" ng-mouseover="search.domaines.isactive=true" ng-mouseleave="search.domaines.isactive=false">
												<div class="resume" ng-if="!search.domaines.isactive">{{search.domaines.resume}}</div>
												<div class="unchecked clickable" ng-click="search.domaines.selectall()" ng-if="search.domaines.isactive">{{search.domaines.select}}</div>
												<div ng-repeat="domaine in search.domaines.checkable track by $index" ng-if="search.domaines.isactive">
													<div class="checked" ng-if="search.domaines.isin(domaine)">
														<div class="option_texte clickable" ng-click="search.domaines.uncheck(domaine)">{{domaine}}</div><div class="clickable" ng-click="search.domaines.uncheck(domaine)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search.domaines.check(domaine)" ng-if="!search.domaines.isin(domaine)">
														<div class="option_texte">{{domaine}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="recherche_item">
											<div class="texte_recherche">Langues des cours :</div>
											<div class="result_recherche4" ng-mouseover="search.langues.isactive=true" ng-mouseleave="search.langues.isactive=false">
												<div class="resume" ng-if="!search.langues.isactive">{{search.langues.resume}}</div>
												<div class="unchecked clickable" ng-click="search.langues.selectall()" ng-if="search.langues.isactive">{{search.langues.select}}</div>
												<div ng-repeat="langue in search.langues.checkable" ng-if="search.langues.isactive">
													<div class="checked" ng-if="search.langues.isin(langue)">
														<div class="option_texte clickable" ng-click="search.langues.uncheck(langue)" >{{langue}}</div><div class="clickable" ng-click="search.langues.uncheck(langue)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search.langues.check(langue)" ng-if="!search.langues.isin(langue)">
														<div class="option_texte">{{langue}}</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="recherche_C1">
										<div class="texte_recherche">Localisation :</div>
										<div class="recherche_item">
											<div class="texte_recherche">Continents :</div>
											<div>
												<div class="result_recherche6" ng-mouseover="search.continents.isactive=true" ng-mouseleave="search.continents.isactive=false">
													<div class="resume" ng-if="!search.continents.isactive">{{search.continents.resume}}</div>
													<div class="unchecked clickable" ng-click="search.continents.selectall(); search.maj_pays()" ng-if="search.continents.isactive">{{search.continents.select}}</div>
													<div ng-repeat="continent in search.continents.checkable" ng-if="search.continents.isactive">
														<div class="checked" ng-if="search.continents.isin(continent)">
															<div class="option_texte clickable" ng-click="search.continents.uncheck(continent); search.maj_pays()">{{continent}}</div><div class="clickable" ng-click="search.continents.uncheck(continent); search.maj_pays()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
														</div>
														<div class="unchecked clickable" ng-click="search.continents.check(continent); search.maj_pays()" ng-if="!search.continents.isin(continent)">
															<div class="option_texte">{{continent}}</div>
														</div>
													</div>
												</div>
											</div>
											<div class="texte_recherche">Pays :</div>
											<div>
												<div class="result_recherche2" ng-mouseover="search.pays.isactive=true" ng-mouseleave="search.pays.isactive=false" ng-if="search.pays.visible">
													<div class="resume" ng-if="!search.pays.isactive">{{search.pays.resume}}</div>
													<div class="unchecked clickable" ng-click="search.pays.selectall(); search.maj_villes()" ng-if="search.pays.isactive">{{search.pays.select}}</div>
													<div ng-repeat="pay in search.pays.checkable" ng-if="search.pays.isactive">
														<div class="checked" ng-if="search.pays.isin(pay)">
															<div class="option_texte clickable" ng-click="search.pays.uncheck(pay); search.maj_villes()">{{pay}}</div><div class="clickable" ng-click="search.pays.uncheck(pay); search.maj_villes()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
														</div>
														<div class="unchecked clickable" ng-click="search.pays.check(pay); search.maj_villes()" ng-if="!search.pays.isin(pay)">
															<div class="option_texte">{{pay}}</div>
														</div>
													</div>
												</div>
											</div>
											<div class="texte_recherche">Villes :</div>
											<div>
												<div class="result_recherche3" ng-mouseover="search.villes.isactive=true" ng-mouseleave="search.villes.isactive=false" ng-if="search.villes.visible">
													<div class="resume" ng-if="!search.villes.isactive">{{search.villes.resume}}</div>
													<div class="unchecked clickable" ng-click="search.villes.selectall()" ng-if="search.villes.isactive">{{search.villes.select}}</div>
													<div ng-repeat="ville in search.villes.checkable" ng-if="search.villes.isactive">
														<div class="checked" ng-if="search.villes.isin(ville)">
															<div class="option_texte clickable" ng-click="search.villes.uncheck(ville)">{{ville}}</div><div class="clickable" ng-click="search.villes.uncheck(ville)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
														</div>
														<div class="unchecked clickable" ng-click="search.villes.check(ville)" ng-if="!search.villes.isin(ville)">
															<div class="option_texte">{{ville}}</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="recherche_item">
											<div class="texte_recherche">Type de convention :</div>
											<div class="result_recherche4" ng-mouseover="search.conventions.isactive=true" ng-mouseleave="search.conventions.isactive=false">
												<div class="resume" ng-if="!search.conventions.isactive">{{search.conventions.resume}}</div>
												<div class="unchecked clickable" ng-click="search.conventions.selectall()" ng-if="search.conventions.isactive">{{search.conventions.select}}</div>
												<div ng-repeat="convention in search.conventions.checkable track by $index" ng-if="search.conventions.isactive">
													<div class="checked" ng-if="search.conventions.isin(convention)">
														<div class="option_texte clickable" ng-click="search.conventions.uncheck(convention)">{{convention}}</div><div class="clickable" ng-click="search.conventions.uncheck(convention)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search.conventions.check(convention)" ng-if="!search.conventions.isin(convention)">
														<div class="option_texte">{{convention}}</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--<div id="banner">
								<h2>Onglet de recherche</h2>
								<span>Création d'une barre de recherche avec de nombreux critères pour trouver les destinations correspondants à ces critères</span>
							</div>-->
						</div>
					<div style="width: 100%;">
					<div class="row main-row">
						<div class="titre_section">Résultats</div>
						<!--<div class="12u">
							<div id="banner">
								<h2>Mappemonde</h2>
								<span>Affichage des résultats sur une mappemonde</span>
							</div>
						</div>-->
					<div class="row main-row" style="width: 100%;">
						<div class="destinations">
							<div class="destination" ng-repeat="destination in destinations | filter:recherche_prio" ng-if="ischerched(destination)">
								<a href="destination.php?key={{destination.clef}}">			    
						         <div class="ID_card">
							        <div class="ID_block_C1">
							        	<h2 style="margin-bottom: 0;">{{destination.nom}}</h2>
							        	<div class="ID_card_L1">
								        	<p style="margin-bottom: 0;">Ville : <span class="blackcolor">{{destination.ville}}</span></p>					        	
								        </div>

								        <div class="ID_card_L2"><p>Pays : <span class="blackcolor">{{destination.pays}}</span></p></div>
								        <div class="ID_card_L2"><p>Domaines d'études :</p></div>
								        <div class="ID_card_L2" style="flex-wrap: wrap;">
								        	<div class="domaine_etude option_texte" ng-repeat="domaine in destination.domaines track by $index" ng-if="!$last"><span class="blackcolor">{{domaine}};</span></div>
								        	<div class="domaine_etude option_texte" ng-repeat="domaine in destination.domaines track by $index" ng-if="$last"><span class="blackcolor">{{domaine}}.</span></div>
								        </div>
								    </div>
							        <div class="ID_block_C1" style="max-width: 50%;">							     
							        	<div class="types_mobilites" >
							        		<div class="logo_type_mobilite" ng-repeat="logo in destination.types_mobilites"> 
							        			<img style="width :100%;" src="images/logo_type_mobilite/logo_{{logo}}.png">
							        		</div>
							        	</div>
							        	<p ng-if="destination.type_convention">Convention : <span class="blackcolor">{{destination.type_convention}}</span></p>
							        	<div class="ID_card_L3" ng-if="destination.site"><a href="http://{{destination.site}}">{{destination.site}}</a></div>
							        </div>
							        
							        							
								</div>
						        <!--<div class="ID_card">
							        <div class="ID_card_L1">
							        	<h2 style="margin-bottom: 0;">{{destination.nom}}</h2>
							        	<div class="types_mobilites" >
							        		<div class="logo_type_mobilite" ng-repeat="logo in destination.types_mobilites"> 
							        			<img style="width :100%;" src="images/logo_type_mobilite/logo_{{logo}}.png">
							        		</div>
							        	</div>
							        </div>

							        <div class="ID_card_L1">
							        	<p style="margin-bottom: 0;">Ville : <span class="blackcolor">{{destination.ville}}</span></p>
							        	<p ng-if="destination.type_convention">Convention : <span class="blackcolor">{{destination.type_convention}}</span></p>
							        </div>

							        <div class="ID_card_L2"><p>Pays : <span class="blackcolor">{{destination.pays}}</span></p></div>
							        <div class="ID_card_L2"><p>Domaines d'études :</p></div>
							        <div class="ID_card_L2">
							        	<div class="domaine_etude" ng-repeat="domaine in destination.domaines" ng-if="!$last"><span class="blackcolor">{{domaine}};</span></div>
							        	<div class="domaine_etude" ng-repeat="domaine in destination.domaines" ng-if="$last"><span class="blackcolor">{{domaine}}</span></div>
							        </div>
							        <div class="ID_card_L3" ng-if="destination.site"><a href="{{destination.site}}">{{destination.site}}</a></div>							
								</div>-->
								</a>	  
							</div>
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
			<script src="assets/js/angularapp.js" type="text/javascript"></script>

	</body>
</html>