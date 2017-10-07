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
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body  ng-app="myApp5"  ng-controller="mainController">
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
							
							<?php $CP =3; 
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
					<div class="titre_section">Gestion des Excels</div>
					<div class="row main-row" style="margin: 0;">

						<div class="6u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">
								
							<div class="button" ng-click="lay(2)">Importer un Excel</div>
								
						</div>
						<div class="6u 12u(mobile)" style="padding: 50px 0 0 0; display: flex; justify-content: center;">
								
							<div class="button" ng-click="lay(3)">Exporter un Excel</div>
								
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
			<div class="dialogue" ng-if="excel.upload">
				<div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger l'excel</div>
					<div  class="form_L1">
						<div class="C1">
							<div class="bouton" ngf-select="upload($file)">Upload file</div>
						</div>
						<div class="C1">
							<div>Drop File:</div>
							<div ngf-drop="upload($file)" class="drop-box"
							  ngf-drag-over-class="'dragover'"  
							  ngf-pattern="'.xls,.xlsx'"><div>Drop</div><div>excel file here</div></div>
							<div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
						</div >
					</div>
					<div  class="form_L1" ng-bind="progress"></div>
					<div class="bouton" ng-click="unlay()">Annuler</div>
				</div>
				<div class="dialogue" ng-if="excel.confirm">
					<div class="C1">
						<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Excel téléchargé</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">Il contient des {{excel.type}}</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">Il a {{excel.ligne}} lignes</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">Il a été modifié le {{excel.date}}</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">Souhaitez vous continuer ?</div>
						<div class="bouton" ng-click="next()">Continuer</div>
					</div>
				</div>
				<div class="dialogue" ng-if="excel.errorexcel">
					<div class="C1">
						<div style="text-align: center; width: 100%;">L'excel téléchargé ne correspond pas à un excel type.</div>
						<div style="text-align: center; width: 100%;">Assurez vous d'avoir téléchargé un excel type.</div>
						<div class="bouton" ng-click="unlay()">Ok</div>
					</div>
				</div>
				<div class="dialogue" ng-if="excel.resume">
					<div class="C1">
						<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Base de donnée mise à jour</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">{{excel.modifiee}} lignes modifiées</div>
						<div style="text-align: center; width: 100%; margin-bottom: 5px;">{{excel.ligne}} lignes crées</div>
						<div class="bouton" ng-click="unlay()">Terminer</div>
					</div>
				</div>
				<div class="dialogue" ng-if="excel.ville">
					<div class="C1">
						<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">La ville {{excel.unknowville}} n'est pas dans la base de donnée</div>
						<div style="text-align: center; width: 100%;  margin-bottom: 5px;">Si cela vient d'une faute de frappe, veuillez sélectionner la ville dans la liste</div>
						<div style="text-align: center; width: 100%;  margin-bottom: 5px;">Sinon veuillez créer la ville</div>
					</div>
					<div class="form_L1">
						<label><input type="radio" ng-model="modif_ville.type" value="selection" ng-click="init_ville()">Selectionner une ville</label>
						<label><input type="radio" ng-model="modif_ville.type" value="new" ng-click="init_new_ville()">Créer une ville</label>
					</div>
					<div  class="form_L1" ng-if="modif_ville.type=='selection'">				
						<select ng-model="modif_ville.selection" ng-options="item.ville for item in villes"></select>
						<div ng-if="modif_ville.selection">Pays : {{modif_ville.selection.pays}}</div>
						<div ng-if="modif_ville.selection">Continent :{{modif_ville.selection.continent}}</div>
						<!--<div ng-if="modif_ville.selection">ID :{{modif_ville.selection.ID}}</div>-->
					</div>		
					<div class="bouton" ng-click="sav_ville(modif_ville.selection)" ng-if="modif_ville.type=='selection'">Enregistrer</div>

					<div  class="form_L1" ng-if="modif_ville.type=='new'">				
						
						<div class="C1">
							<input type="text" ng-model="modif_new_ville.ville" placeholder="Taper le nom de la ville" ng-class="exist_ville_class(modif_new_ville.ville)">
							<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_ville(modif_new_ville.ville)">{{exist_ville(modif_new_ville.ville)}}</div>
						</div>
						<div class="C1">
							<select ng-model="modif_new_ville.pays" ng-options="item.pays for item in pays" ng-if="!modif_new_ville.new_pays"><option value="">--sélectionner un pays--</option></select>
							<input type="text" ng-model="modif_new_ville.pays" ng-if="modif_new_ville.new_pays" placeholder="Taper le nom du pays" ng-class="exist_pays_class(modif_new_ville.pays)">
							<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_pays(modif_new_ville.pays) && modif_new_ville.new_pays">{{exist_pays(modif_new_ville.pays)}}</div>
							<div style="font-size: 0.8em; margin-top: 10px; text-align: center;">ou</div>
							<div class="bouton" style="font-size: 0.8em; margin-top: 10px;" ng-click="modif_new_ville.new_pays=true;" ng-if="!modif_new_ville.new_pays">Créer un pays</div>
							<div class="bouton" style="font-size: 0.8em; margin-top: 10px;" ng-click="modif_new_ville.new_pays=false;" ng-if="modif_new_ville.new_pays">Sélectionner un pays</div>
						</div>
						<div>
							<div ng-if="modif_new_ville.pays && !modif_new_ville.new_pays">Continent :{{modif_new_ville.pays.continent}}</div>
							<select ng-model="modif_new_ville.continent" ng-options="item for item in continent" ng-if="modif_new_ville.new_pays"><option value="">--sélectionner un continent--</option></select>
						</div>

					</div>		
					<div class="bouton" ng-click="sav_new_ville(modif_new_ville.ville, modif_new_ville.pays, modif_new_ville.continent, modif_new_ville.new_pays)" ng-if="modif_ville.type=='new'">Créer</div>
				</div>
			
			<div class="dialogue" ng-if="excel.mobilite">
				<div class="form_L1">
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Certain types de mobilités n'ont pas été reconnus :</div>
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;" ng-repeat="type_mobilite in excel.unknowmobilite">{{type_mobilite}}</div>
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Veuillez sélectionnez ceux à quoi ils correspondent</div>
				</div>
				<div class="ID_block_C1">
					<div class="ID_card_L2">
		        		<div class="logo_type_mobilite" ng-if="destination.type_S7">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_S7.png">
		        		</div>
		        		<div class="logo_type_mobilite" ng-if="destination.type_stage_2A">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_stage_2A.png">
		        		</div>
		        		<div class="logo_type_mobilite" ng-if="destination.type_FR">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_FR.png">
		        		</div>
		        		<div class="logo_type_mobilite" ng-if="destination.type_S10">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_S10.png">
		        		</div>
		        		<div class="logo_type_mobilite" ng-if="destination.type_DD">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_DD.png">
		        		</div>
		        		<div class="logo_type_mobilite" ng-if="destination.type_TFE">
		        			<img style="width :100%;" src="images/logo_type_mobilite/logo_TFE.png">
		        		</div>
					</div>
					
					<div class="ID_card_L1" >
						<label><input type="checkbox" ng-model="destination.type_S7">S7</label>
						<label><input type="checkbox" ng-model="destination.type_stage_2A">Stage 2A</label>
						<label><input type="checkbox" ng-model="destination.type_FR">FR</label>
						<label><input type="checkbox" ng-model="destination.type_S10">S10</label>
						<label><input type="checkbox" ng-model="destination.type_DD">DD</label>
						<label><input type="checkbox" ng-model="destination.type_TFE">TFE</label>
					</div>
					<div class="bouton" ng-click="sav_type_mobilite()">Enregistrer</div>
				</div>	
			</div>
			<div class="dialogue" ng-if="excel.domaine">
				<div class="C1">
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Un domaine d'étude n'a pas été reconnu :</div>
					<div style="text-align: center; width: 100%;  margin-bottom: 5px;">{{excel.unknowdomaine[0]}}</div>
					<div style="text-align: center; width: 100%;  margin-bottom: 5px;">Veuillez sélectionnez celui à quoi il correspond ou le créer</div>
				</div>
				<div class="form_L1">
					<label><input type="radio" ng-model="modif_domaine.type" value="selection" ng-click="init_domaine()">Selectionner un domaine d'étude</label>
					<label><input type="radio" ng-model="modif_domaine.type" value="new" ng-click="init_new_domaine()">Créer un domaine d'étude</label>
				</div>
				<div  class="form_L1" ng-if="modif_domaine.type=='selection'">
					<div class="C1">
						<select ng-model="modif_domaine.selection" ng-options="item.nom for item in domaines"></select>
					</div>
				</div>		
				<div class="bouton" ng-click="sav_domaine_dest(modif_domaine.selection)" ng-if="modif_domaine.type=='selection' && excel.type=='destinations'">Enregistrer</div>
				<div class="bouton" ng-click="sav_domaine_parc(modif_domaine.selection)" ng-if="modif_domaine.type=='selection' && excel.type=='parcours'">Enregistrer</div>

				<div  class="form_L1" ng-if="modif_domaine.type=='new'">				
					<div>Nom du domaine :</div>
					<div class="C1">
						<input type="text" ng-model="modif_new_domaine.domaine" placeholder="Taper le nom du domaine" ng-class="exist_domaine_class(modif_new_domaine.domaine)">
						<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_domaine(modif_new_domaine.domaine)">{{exist_domaine(modif_new_domaine.domaine)}}</div>
					</div>
					<div>Code du domaine :</div>
					<div class="C1">
						<input type="text" ng-model="modif_new_domaine.code" placeholder="Taper le code du domaine" ng-class="exist_code_class(modif_new_domaine.code)">
						<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_code(modif_new_domaine.code)">{{exist_code(modif_new_domaine.code)}}</div>
					</div>
				</div>
						
				<div class="bouton" ng-click="sav_new_domaine_dest(modif_new_domaine.domaine, modif_new_domaine.code)" ng-if="modif_domaine.type=='new' && excel.type=='destinations'">Créer</div>
				<div class="bouton" ng-click="sav_new_domaine_parc(modif_new_domaine.domaine, modif_new_domaine.code)" ng-if="modif_domaine.type=='new' && excel.type=='parcours'">Créer</div>
			</div>
			<div class="dialogue" ng-if="excel.destination">
				<div class="C1">
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Une destination n'a pas été reconnue :</div>
					<div style="text-align: center; width: 100%;  margin-bottom: 5px;">{{excel.unknowdestination}}</div>
					<div style="text-align: center; width: 100%;  margin-bottom: 5px;">Veuillez sélectionnez celle à quoi elle correspond ou la créer</div>
				</div>
				<div class="form_L1">
					<label><input type="radio" ng-model="modif_destination.type" value="selection" ng-click="init_destination()">Selectionner une destination </label>
					<label><input type="radio" ng-model="modif_destination.type" value="new" ng-click="init_new_destination()">Créer une destination </label>
				</div>
				<div  class="form_L1" ng-if="modif_destination.type=='selection'">
					Destination :
					<select ng-model="modif_destination.selection" ng-options="item.nom for item in destinations"><option value="">--sélectionner une destination--</option></select>
				</div>		
				<div class="bouton" ng-click="sav_destination(modif_destination.selection)" ng-if="modif_destination.type=='selection'">Enregistrer</div>

				<div  class="form_L1" ng-if="modif_destination.type=='new'">
					<div class="C1">			
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
			</div>
			<div class="dialogue" ng-if="excel.loading">
				<div class="C1">
					<div style="text-align: center; width: 100%; font-size: 1.2em; margin-bottom: 5px;">Traitement des données en cours</div>
					
					<div style="text-align: center; width: 100%;  margin-bottom: 5px;">{{excel.curentligne}}/{{excel.ligne}}</div>
				</div>
			</div>
		</div>

			
		
		<div class="layer2" ng-if="layer3">
			<div class="dialogue">
				<div class="form_L1">
					<a href="export_dest.php"><div class="button">Exporter les destinations</div></a>
					<a href="export_parc.php"><div class="button">Exporter les parcours élèves</div></a>
				</div>
				<div class="bouton" style="text-align: center; width: 100%; font-size: 1.2em; margin-top: 20px;" ng-click="unlay()">Annuler</div>
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
			<?php 
			if (isset($_GET['excel'])){
				echo '<script type="text/javascript">var donext = true;
				var excelname="'.$_GET['excel'].'";
				var excelcurentligne='.$_GET['ligne'].';
				var excelajoutee='.$_GET['ajoutee'].';
				var excelmodifiee='.$_GET['modifiee'].';
				</script>';
			}else{
				echo '<script type="text/javascript">var donext = false;</script>';
			}
			?>
			<script src="assets/js/angularapp5.js" type="text/javascript"></script>
			
	</body>
</html>