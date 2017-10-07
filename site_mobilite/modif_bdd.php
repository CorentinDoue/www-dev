<?php include "php/connection_back_office.php" ;?>
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
		
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body ng-app="myApp3"  ng-controller="mainController">
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<?php $CP =2; 
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
					<div class="boite_dialogue">
						<form>
							Sélectionnez ce que vous voulez modifier :<br>
							<br>
							<div class="form_L1">
								<label><input type="radio" ng-model="search.type" value="destination" ng-click="init_destination()">Une destination</label>
								<label><input type="radio" ng-model="search.type" value="parcour" ng-click="init_parcour()">Un parcours</label>
							</div>	
													
						</form>
					</div>
					<div style="display: flex; flex-direction: column;" ng-if="search.type=='destination'">
						<div style="display: flex; justify-content: center;"><div class="button" style="margin-top: 20px; margin-bottom: 20px;" ng-click="lay(2)">Créer une nouvelle destination</div></div>
						<div style="display: flex; justify-content: center;"><div style="margin-top: 20px; margin-bottom: 20px;" >OU</div></div>
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
										<div class="result_recherche5" ng-mouseover="search_dest.mobilities.isactive=true" ng-mouseleave="search_dest.mobilities.isactive=false">
											<div class="resume" ng-if="!search_dest.mobilities.isactive">{{search_dest.mobilities.resume}}</div>
											<div class="unchecked clickable" ng-click="search_dest.mobilities.selectall()" ng-if="search_dest.mobilities.isactive">{{search_dest.mobilities.select}}</div>
											<div ng-repeat="mobility in search_dest.mobilities.checkable" ng-if="search_dest.mobilities.isactive">
												<div class="checked" ng-if="search_dest.mobilities.isin(mobility)">
													<div class="option_texte">{{mobility}}</div><div class="clickable" ng-click="search_dest.mobilities.uncheck(mobility)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_dest.mobilities.check(mobility)" ng-if="!search_dest.mobilities.isin(mobility)">
													<div class="option_texte">{{mobility}}</div>
												</div>
											</div>
										</div>
									</div>
									<div class="recherche_item">
										<div class="texte_recherche">Domaines d'études :</div>
										<div class="result_recherche" ng-mouseover="search_dest.domaines.isactive=true" ng-mouseleave="search_dest.domaines.isactive=false">
											<div class="resume" ng-if="!search_dest.domaines.isactive">{{search_dest.domaines.resume}}</div>
											<div class="unchecked clickable" ng-click="search_dest.domaines.selectall()" ng-if="search_dest.domaines.isactive">{{search_dest.domaines.select}}</div>
											<div ng-repeat="domaine in search_dest.domaines.checkable" ng-if="search_dest.domaines.isactive">
												<div class="checked" ng-if="search_dest.domaines.isin(domaine)">
													<div class="option_texte">{{domaine}}</div><div class="clickable" ng-click="search_dest.domaines.uncheck(domaine)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_dest.domaines.check(domaine)" ng-if="!search_dest.domaines.isin(domaine)">
													<div class="option_texte">{{domaine}}</div>
												</div>
											</div>
										</div>
									</div>
									<div class="recherche_item">
										<div class="texte_recherche">Langues des cours :</div>
										<div class="result_recherche4" ng-mouseover="search_dest.langues.isactive=true" ng-mouseleave="search_dest.langues.isactive=false">
											<div class="resume" ng-if="!search_dest.langues.isactive">{{search_dest.langues.resume}}</div>
											<div class="unchecked clickable" ng-click="search_dest.langues.selectall()" ng-if="search_dest.langues.isactive">{{search_dest.langues.select}}</div>
											<div ng-repeat="langue in search_dest.langues.checkable" ng-if="search_dest.langues.isactive">
												<div class="checked" ng-if="search_dest.langues.isin(langue)">
													<div class="option_texte">{{langue}}</div><div class="clickable" ng-click="search_dest.langues.uncheck(langue)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_dest.langues.check(langue)" ng-if="!search_dest.langues.isin(langue)">
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
											<div class="result_recherche6" ng-mouseover="search_dest.continents.isactive=true" ng-mouseleave="search_dest.continents.isactive=false">
												<div class="resume" ng-if="!search_dest.continents.isactive">{{search_dest.continents.resume}}</div>
												<div class="unchecked clickable" ng-click="search_dest.continents.selectall(); search_dest.maj_pays()" ng-if="search_dest.continents.isactive">{{search_dest.continents.select}}</div>
												<div ng-repeat="continent in search_dest.continents.checkable" ng-if="search_dest.continents.isactive">
													<div class="checked" ng-if="search_dest.continents.isin(continent)">
														<div class="option_texte">{{continent}}</div><div class="clickable" ng-click="search_dest.continents.uncheck(continent); search_dest.maj_pays()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_dest.continents.check(continent); search_dest.maj_pays()" ng-if="!search_dest.continents.isin(continent)">
														<div class="option_texte">{{continent}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="texte_recherche">Pays :</div>
										<div>
											<div class="result_recherche2" ng-mouseover="search_dest.pays.isactive=true" ng-mouseleave="search_dest.pays.isactive=false" ng-if="search_dest.pays.visible">
												<div class="resume" ng-if="!search_dest.pays.isactive">{{search_dest.pays.resume}}</div>
												<div class="unchecked clickable" ng-click="search_dest.pays.selectall(); search_dest.maj_villes()" ng-if="search_dest.pays.isactive">{{search_dest.pays.select}}</div>
												<div ng-repeat="pay in search_dest.pays.checkable" ng-if="search_dest.pays.isactive">
													<div class="checked" ng-if="search_dest.pays.isin(pay)">
														<div class="option_texte">{{pay}}</div><div class="clickable" ng-click="search_dest.pays.uncheck(pay); search_dest.maj_villes()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_dest.pays.check(pay); search_dest.maj_villes()" ng-if="!search_dest.pays.isin(pay)">
														<div class="option_texte">{{pay}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="texte_recherche">Villes :</div>
										<div>
											<div class="result_recherche3" ng-mouseover="search_dest.villes.isactive=true" ng-mouseleave="search_dest.villes.isactive=false" ng-if="search_dest.villes.visible">
												<div class="resume" ng-if="!search_dest.villes.isactive">{{search_dest.villes.resume}}</div>
												<div class="unchecked clickable" ng-click="search_dest.villes.selectall()" ng-if="search_dest.villes.isactive">{{search_dest.villes.select}}</div>
												<div ng-repeat="ville in search_dest.villes.checkable" ng-if="search_dest.villes.isactive">
													<div class="checked" ng-if="search_dest.villes.isin(ville)">
														<div class="option_texte">{{ville}}</div><div class="clickable" ng-click="search_dest.villes.uncheck(ville)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_dest.villes.check(ville)" ng-if="!search_dest.villes.isin(ville)">
														<div class="option_texte">{{ville}}</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="recherche_item">
										<div class="texte_recherche">Type de convention :</div>
										<div class="result_recherche4" ng-mouseover="search_dest.conventions.isactive=true" ng-mouseleave="search_dest.conventions.isactive=false">
											<div class="resume" ng-if="!search_dest.conventions.isactive">{{search_dest.conventions.resume}}</div>
											<div class="unchecked clickable" ng-click="search_dest.conventions.selectall()" ng-if="search_dest.conventions.isactive">{{search_dest.conventions.select}}</div>
											<div ng-repeat="convention in search_dest.conventions.checkable" ng-if="search_dest.conventions.isactive">
												<div class="checked" ng-if="search_dest.conventions.isin(convention)">
													<div class="option_texte">{{convention}}</div><div class="clickable" ng-click="search_dest.conventions.uncheck(convention)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_dest.conventions.check(convention)" ng-if="!search_dest.conventions.isin(convention)">
													<div class="option_texte">{{convention}}</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
											<a href="majdestination.php?key={{destination.clef}}">			    
									        <div class="ID_card">
										        <div class="ID_block_C1">
										        	<h2 style="margin-bottom: 0;">{{destination.nom}}</h2>
										        	<div class="ID_card_L1">
											        	<p style="margin-bottom: 0;">Ville : <span class="blackcolor">{{destination.ville}}</span></p>					        	
											        </div>

											        <div class="ID_card_L2"><p>Pays : <span class="blackcolor">{{destination.pays}}</span></p></div>
											        <div class="ID_card_L2"><p>Domaines d'études :</p></div>
											        <div class="ID_card_L2" style="flex-wrap: wrap;">
											        	<div class="domaine_etude option_texte" ng-repeat="domaine in destination.domaines" ng-if="!$last"><span class="blackcolor">{{domaine}};</span></div>
											        	<div class="domaine_etude option_texte" ng-repeat="domaine in destination.domaines" ng-if="$last"><span class="blackcolor">{{domaine}}.</span></div>
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
											</a>	  
										</div>
									</div>				
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; flex-direction: column;" ng-if="search.type=='parcour'">
						<div style="display: flex; justify-content: center;"><a href="newparcour.php"><div class="button" style="margin-top: 20px; margin-bottom: 20px;" >Créer un nouveau parcours</div></a></div>
						<div style="display: flex; justify-content: center;"><div style="margin-top: 20px; margin-bottom: 20px;" >OU</div></div>
						<div class="onglet_recherche">
							<div class="recherche_L1">
								<h2>Ma recherche :</h2>
								<div><input class="recherche_prio" ng-model="recherche2_prio" type="text" placeholder="Tappez le nom d'un élève, d'une ville, ..."></div>
								<div></div>
							</div>
							<div class="recherche_L1">
								<h2>Filtres :</h2>
							</div>
							<div class="block_recherche">
								<div class="recherche_C1 marge">
									<div class="recherche_item">
										<div class="texte_recherche">Types de mobilité :</div>
										<div class="result_recherche5" ng-mouseover="search_parcour.mobilities.isactive=true" ng-mouseleave="search_parcour.mobilities.isactive=false">
											<div class="resume" ng-if="!search_parcour.mobilities.isactive">{{search_parcour.mobilities.resume}}</div>
											<div class="unchecked clickable" ng-click="search_parcour.mobilities.selectall()" ng-if="search_parcour.mobilities.isactive">{{search_parcour.mobilities.select}}</div>
											<div ng-repeat="mobility in search_parcour.mobilities.checkable" ng-if="search_parcour.mobilities.isactive">
												<div class="checked" ng-if="search_parcour.mobilities.isin(mobility)">
													<div class="option_texte">{{mobility}}</div><div class="clickable" ng-click="search_parcour.mobilities.uncheck(mobility)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_parcour.mobilities.check(mobility)" ng-if="!search_parcour.mobilities.isin(mobility)">
													<div class="option_texte">{{mobility}}</div>
												</div>
											</div>
										</div>
									</div>
									<div class="recherche_item">
										<div class="texte_recherche">Promotion :</div>
										<div class="result_recherche" ng-mouseover="search_parcour.promos.isactive=true" ng-mouseleave="search_parcour.promos.isactive=false">
											<div class="resume" ng-if="!search_parcour.promos.isactive">{{search_parcour.promos.resume}}</div>
											<div class="unchecked clickable" ng-click="search_parcour.promos.selectall()" ng-if="search_parcour.promos.isactive">{{search_parcour.promos.select}}</div>
											<div ng-repeat="promo in search_parcour.promos.checkable" ng-if="search_parcour.promos.isactive">
												<div class="checked" ng-if="search_parcour.promos.isin(promo)">
													<div class="option_texte">{{promo}}</div><div class="clickable" ng-click="search_parcour.promos.uncheck(promo)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
												</div>
												<div class="unchecked clickable" ng-click="search_parcour.promos.check(promo)" ng-if="!search_parcour.promos.isin(promo)">
													<div class="option_texte">{{promo}}</div>
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
											<div class="result_recherche6" ng-mouseover="search_parcour.continents.isactive=true" ng-mouseleave="search_parcour.continents.isactive=false">
												<div class="resume" ng-if="!search_parcour.continents.isactive">{{search_parcour.continents.resume}}</div>
												<div class="unchecked clickable" ng-click="search_parcour.continents.selectall(); search_parcour.maj_pays()" ng-if="search_parcour.continents.isactive">{{search_parcour.continents.select}}</div>
												<div ng-repeat="continent in search_parcour.continents.checkable" ng-if="search_parcour.continents.isactive">
													<div class="checked" ng-if="search_parcour.continents.isin(continent)">
														<div class="option_texte">{{continent}}</div><div class="clickable" ng-click="search_parcour.continents.uncheck(continent); search_parcour.maj_pays()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_parcour.continents.check(continent); search_parcour.maj_pays()" ng-if="!search_parcour.continents.isin(continent)">
														<div class="option_texte">{{continent}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="texte_recherche">Pays :</div>
										<div>
											<div class="result_recherche2" ng-mouseover="search_parcour.pays.isactive=true" ng-mouseleave="search_parcour.pays.isactive=false" ng-if="search_parcour.pays.visible">
												<div class="resume" ng-if="!search_parcour.pays.isactive">{{search_parcour.pays.resume}}</div>
												<div class="unchecked clickable" ng-click="search_parcour.pays.selectall(); search_parcour.maj_villes()" ng-if="search_parcour.pays.isactive">{{search_parcour.pays.select}}</div>
												<div ng-repeat="pay in search_parcour.pays.checkable" ng-if="search_parcour.pays.isactive">
													<div class="checked" ng-if="search_parcour.pays.isin(pay)">
														<div class="option_texte">{{pay}}</div><div class="clickable" ng-click="search_parcour.pays.uncheck(pay); search_parcour.maj_villes()" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_parcour.pays.check(pay); search_parcour.maj_villes()" ng-if="!search_parcour.pays.isin(pay)">
														<div class="option_texte">{{pay}}</div>
													</div>
												</div>
											</div>
										</div>
										<div class="texte_recherche">Villes :</div>
										<div>
											<div class="result_recherche3" ng-mouseover="search_parcour.villes.isactive=true" ng-mouseleave="search_parcour.villes.isactive=false" ng-if="search_parcour.villes.visible">
												<div class="resume" ng-if="!search_parcour.villes.isactive">{{search_parcour.villes.resume}}</div>
												<div class="unchecked clickable" ng-click="search_parcour.villes.selectall()" ng-if="search_parcour.villes.isactive">{{search_parcour.villes.select}}</div>
												<div ng-repeat="ville in search_parcour.villes.checkable" ng-if="search_parcour.villes.isactive">
													<div class="checked" ng-if="search_parcour.villes.isin(ville)">
														<div class="option_texte">{{ville}}</div><div class="clickable" ng-click="search_parcour.villes.uncheck(ville)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
													</div>
													<div class="unchecked clickable" ng-click="search_parcour.villes.check(ville)" ng-if="!search_parcour.villes.isin(ville)">
														<div class="option_texte">{{ville}}</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
										<div class="destination" ng-repeat="parcour in parcours | filter:recherche2_prio" ng-if="ischerched2(parcour)">
											<a href="majparcour.php?key={{parcour.clef}}">			    
									        	<div class='block_parcour'>
													<div class="ID_card_L1">
														
															<div class="ID_card_L2" style="margin-bottom: 1em;">
																<div class='parcour_name'>{{parcour.prenom}}</div>
																<div class='parcour_name'>{{parcour.nom}}</div>
																<div class='parcour_name'>Promo {{parcour.promo}}</div>
																<div class="logo_type_mobilite">
																	<img style="width :100%;" src="images/logo_type_mobilite/logo_{{parcour.types_mobilites}}.png">
									        					</div>											
															</div>
														
														
													</div>
													<div class="ID_card_L1" style="margin-bottom: 1em;">
														<div>
															Destination : 
															<span class='parcour_name'>{{parcour.dest_nom}}</span>
															
														</div>
														
													</div>
													<div class="ID_card_L1" style="margin-bottom: 1em;">
														<div>
															Date de séjour : 
															<span class='blackcolor'>{{parcour.date}}</span>
														</div>
														
													</div>
													<div class="ID_card_L1" style="margin-bottom: 1em;" ng-if="parcour.type_convention">
														
														<div>
															Convention : 
															<span class='blackcolor'>{{parcour.type_convention}}</span>
														</div>
														
													</div>
													<div class="ID_card_L2" style="margin-bottom: 1.25em;" ng-if="parcour.domaines">
														<div class="titre_attribut">Domaines d'études :</div>
														<div class="ID_card_L2" style="margin-bottom: 1.25em;">
															<div class='domaine_etude' ng-repeat="domaine in parcour.domaines">
																<span ng-show='!$last'>{{domaine}}; </span>
																<span ng-show='$last'>{{domaine}}.</span>
															</div>
														</div>	
													</div>											
													
													<div class="ID_card_L2" style="margin-bottom: 1.25em;" ng-if="parcour.tuteur">
														<div class="titre_attribut">Tuteur :</div>
														<span class='blackcolor'> {{parcour.tuteur}}</span>
													</div>													
												</div>
											</a>	  
										</div>
									</div>				
								</div>
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
		<div class="layer" ng-if="layer"></div>
		<div class="layer2" ng-if="layer2">
			<div class="dialogue">
				<h2>Nouvelle destination</h1>
				<div  class="form_L1">				
					<div  style="font-size: 1.5em;">Nom :</div>
					<div class="C1">
						<input type="text" style="font-size: 1.5em; width: 400px;" ng-model="new_name" placeholder="Taper le nom de la destination" ng-class="exist_destination_class(new_name)">
						<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_destination(new_name)">{{exist_destination(new_name)}}</div>
					</div>
				</div>	
				<div  class="form_L1">
					<div class="bouton" ng-click="new_destination(new_name)">Créer</div>
					<div class="bouton" ng-click="unlay()">Annuler</div>
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
			<script src="assets/js/angularapp3.js" type="text/javascript"></script>

	</body>
</html>