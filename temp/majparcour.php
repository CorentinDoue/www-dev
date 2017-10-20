<?php
 include "php/connection_back_office.php";
if (!isset($_GET['key'])) {
	$erreur="Pas de clef de parcour entrée";
	$parcour["nom"]="Erreur";
}else{
	$parcour["nom"]="Parcours ".$_GET['key'];
}
?>

<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html id="test">
	<head>
		<title>Mobilités internationales EMSE - <?php echo $parcour["nom"]; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
	<body ng-app="myApp6"  ng-controller="mainController">
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
					<div style="width: 100%;">
					<div class="row main-row" style="margin: 0;">
						<?php 
						if (isset($erreur) and $erreur!=Null) {
							echo "<div class=\"titre_section\">Erreur</div>";
							echo "<div class=\"erreur\">".$erreur."</div>";
						}else{
						?>
							<div class="ID_block">							
								<div class="ID_card_L1">								
									<div>
										Prénom : 
										<span class='parcour_name' ng-if="!modif.prenom">{{parcour.prenom}}</span>
										<span class="bouton" ng-click="modif_prenom()" ng-if="!modif.prenom">Modifier</span>
										<textarea style="width: 100%;" ng-model="parcour.prenom" ng-if="modif.prenom"></textarea>
										<div class="bouton" ng-click="sav_prenom()" ng-if="modif.prenom">Enregistrer</div>
									</div>	
									
									<div class="C1">
										<div class="logo_type_mobilite">
											<img style="width :100%;" src="images/logo_type_mobilite/logo_{{parcour.types_mobilites}}.png">				
			        					</div>
			        					<div class="bouton" ng-if="!modif.type_mobilite" ng-click="modif_type_mobilite()">Modifier</div>
			        					<div class="ID_card_L1" ng-if="modif.type_mobilite">
			        						<label><input type="radio" ng-model="parcour.types_mobilites" value="S7" ng-click="sav_type_mobilite()">S7</label>
											<label><input type="radio" ng-model="parcour.types_mobilites" value="stage_2A" ng-click="sav_type_mobilite()">Stage 2A</label>
											<label><input type="radio" ng-model="parcour.types_mobilites" value="FR" ng-click="sav_type_mobilite()">FR</label>
											<label><input type="radio" ng-model="parcour.types_mobilites" value="S10" ng-click="sav_type_mobilite()">S10</label>
											<label><input type="radio" ng-model="parcour.types_mobilites" value="DD" ng-click="sav_type_mobilite()">DD</label>
											<label><input type="radio" ng-model="parcour.types_mobilites" value="TFE" ng-click="sav_type_mobilite()">TFE</label>
										</div>
			        				</div>
		        				</div>
		        				<div class="ID_card_L1" style="margin-bottom: 1em;">
									<div>
										Nom : 
										<span class='parcour_name' ng-if="!modif.nom">{{parcour.nom}}</span>
										<span class="bouton" ng-click="modif_nom()" ng-if="!modif.nom">Modifier</span>
										<textarea style="width: 100%;" ng-model="parcour.nom" ng-if="modif.nom"></textarea>
										<div class="bouton" ng-click="sav_nom()" ng-if="modif.nom">Enregistrer</div>
								
									</div>
								</div>
								<div class="ID_card_L1" style="margin-bottom: 1em;">
									<div>
										<span class='parcour_name' ng-if="!modif.promo">Promo {{parcour.promo}}</span><span class="bouton" ng-click="modif_promo()" ng-if="!modif.promo">Modifier</span>
										<span  class='parcour_name' ng-if="modif.promo">Promo <input type="number" ng-model="parcour.promo"></span><span class="bouton" ng-click="sav_promo()" ng-if="modif.promo">Enregistrer</span>	
									</div> 												
								</div>
								<div class="ID_card_L1" style="margin-bottom: 1em;">
									<div>
										Destination : 
										<span class='parcour_name'>{{parcour.dest_nom}}</span><span class="bouton" ng-click="lay(2)" ng-if="!modif.promo">Modifier</span>
										
									</div>
									
								</div>
								<div class="ID_card_L1" style="margin-bottom: 1em;">
									<div>
										Date de départ : 
										<span class='blackcolor' ng-if="!modif.date_debut">{{parcour.date_debut.jour}}/{{parcour.date_debut.mois}}/{{parcour.date_debut.an}}</span><span class="bouton" ng-click="modif_date_debut()" ng-if="!modif.date_debut">Modifier</span>
										<span class='blackcolor' ng-if="modif.date_debut"> <input type="number" ng-model="parcour.date_debut.jour">/<input type="number" ng-model="parcour.date_debut.mois">/<input type="number" ng-model="parcour.date_debut.an"></span><span class="bouton" ng-click="sav_date_debut()" ng-if="modif.date_debut">Enregistrer</span>
									</div>
									
								</div>
								<div class="ID_card_L1" style="margin-bottom: 1em;">
									<div>
										Date de retour : 
										<span class='blackcolor' ng-if="!modif.date_fin">{{parcour.date_fin.jour}}/{{parcour.date_fin.mois}}/{{parcour.date_fin.an}}</span><span class="bouton" ng-click="modif_date_fin()" ng-if="!modif.date_fin">Modifier</span>
										<span class='blackcolor' ng-if="modif.date_fin"> <input type="number" ng-model="parcour.date_fin.jour">/<input type="number" ng-model="parcour.date_fin.mois">/<input type="number" ng-model="parcour.date_fin.an"></span><span class="bouton" ng-click="sav_date_fin()" ng-if="modif.date_fin">Enregistrer</span>
									</div>
									
								</div>
								<div class="ID_card_L1" style="margin-bottom: 1em;" >
									
									<div>
										Convention : 
										<span class='blackcolor'>{{parcour.type_convention}}</span><span class="bouton" ng-click="lay(3)">Modifier</span>
									</div>
									
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;" >
									<div class="titre_attribut">Domaines d'études :</div>
									<div class="ID_card_L2" style="margin-bottom: 1.25em;">
										<div class='domaine_etude' ng-repeat="domaine in parcour.domaines">
											<span ng-show='!$last'>{{domaine}}; </span>
											<span ng-show='$last'>{{domaine}}.</span>											
										</div>
										<span class="bouton" ng-click="lay(4)">Modifier</span>
									</div>	
								</div>											
								
								<div class="ID_card_L2" style="margin-bottom: 1.25em;" >
									<div class="titre_attribut">Tuteur :</div>
									<span class='blackcolor'  ng-if="!modif.tuteur"> {{parcour.tuteur}}</span>									
									<span class="bouton" ng-click="modif_tuteur()" ng-if="!modif.tuteur">Modifier</span>
									<textarea style="width: 100%;" ng-model="parcour.tuteur" ng-if="modif.tuteur"></textarea>
									<div class="bouton" ng-click="sav_tuteur()" ng-if="modif.tuteur">Enregistrer</div>
								</div>													
								<div class="ID_card_L2" style="margin-bottom: 1.25em;" >
									<div class="titre_attribut">Remarques :</div>
									<span class='blackcolor' ng-if="!modif.remarques"> {{parcour.remarques}}</span>
									<span class="bouton" ng-click="modif_remarques()" ng-if="!modif.remarques">Modifier</span>
									<textarea style="width: 100%;" ng-model="parcour.remarques" ng-if="modif.remarques"></textarea>
									<div class="bouton" ng-click="sav_remarques()" ng-if="modif.remarques">Enregistrer</div>
								</div>	
								<div class="ID_card_L2">
									<div class="blocks_pdf">
										 
										 				
										 <div class="block_pdf" ng-if="parcour.rapport">
										 	<a href="documents/rapports/{{parcour.rapport}}" target="blank" >
											<div class="logo_pdf">
					        					<img style="width :100%;" src="images/pdf.png">
					        				</div>
					        				<div>
					        					Rapport
					        				</div>
					        				</a>
					        				<div class="bouton" ng-click="lay(6)">
					        					Modifier
					        				</div>
										 </div>
										
														
										<div class="block_pdf" ng-if="!parcour.rapport">
											<div class="logo_pdf">
					        					<img style="width :100%;" src="images/pdf.png">
					        				</div>
					  
					        				<div class="bouton" ng-click="lay(6)">
					        					Ajouter un rapport
					        				</div>
										</div>
										
									</div>
								</div>	

								<div class="ID_card_L2">
									<div class="blocks_pdf">
										 
										 				
										 <div class="block_pdf" ng-if="parcour.bulletin">
										 	<a href="documents/plan/{{parcour.bulletin}}" target="blank" >
											<div class="logo_pdf">
					        					<img style="width :100%;" src="images/pdf.png">
					        				</div>
					        				<div>
					        					Plan d'étude
					        				</div>
					        				</a>
					        				<div class="bouton" ng-click="lay(5)">
					        					Modifier
					        				</div>
										 </div>
										
														
										<div class="block_pdf" ng-if="!parcour.bulletin">
											<div class="logo_pdf">
					        					<img style="width :100%;" src="images/pdf.png">
					        				</div>
					  
					        				<div class="bouton" ng-click="lay(5)">
					        					Ajouter un plan d'étude
					        				</div>
										</div>
										
									</div>
								</div>		
							</div>
						<?php } ?>			
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
		
		<div class="layer2" ng-if="layer4">
			<div class="dialogue">
				<div class="form_L1">
					<label><input type="radio" ng-model="modif_domaine.type" value="selection" ng-click="init_domaine()">Selectionner un domaine d'étude</label>
					<label><input type="radio" ng-model="modif_domaine.type" value="new" ng-click="init_new_domaine()">Créer un domaine d'étude</label>
				</div>
				<div  class="form_L1" ng-if="modif_domaine.type=='selection'">
					<div class="C1">
						<div class="unchecked clickable" ng-click="domaines.selectall()" >{{domaines.select}}</div>
						<div class="C1" ng-repeat="domaine in domaines.checkable" >
							<div class="checked" ng-if="domaines.isin(domaine)">
								<div class="option_texte">{{domaine.nom}}</div><div class="clickable" ng-click="domaines.uncheck(domaine)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
							</div>
							<div class="unchecked clickable" ng-click="domaines.check(domaine)" ng-if="!domaines.isin(domaine)">
								<div class="option_texte">{{domaine.nom}}</div>
							</div>
						</div>
					</div>
				</div>		
				<div class="bouton" ng-click="sav_domaine(domaines.checked)" ng-if="modif_domaine.type=='selection'">Enregistrer</div>

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
				<div class="bouton" ng-click="sav_new_domaine(modif_new_domaine.domaine, modif_new_domaine.code)" ng-if="modif_domaine.type=='new'">Créer</div>
			</div>
		</div>
		
		<div class="layer2" ng-if="layer3">
			<div class="dialogue">
				<div class="form_L1">
					<label><input type="radio" ng-model="modif_convention.type" value="selection" ng-click="init_convention()">Selectionner une convention </label>
					<label><input type="radio" ng-model="modif_convention.type" value="new" ng-click="init_new_convention()">Créer une convention </label>
				</div>
				<div  class="form_L1" ng-if="modif_convention.type=='selection'">
					Convention :
					<select ng-model="modif_convention.selection" ng-options="item for item in conventions"><option value="">Aucune</option></select>
				</div>		
				<div class="bouton" ng-click="sav_convention(modif_convention.selection)" ng-if="modif_convention.type=='selection'">Enregistrer</div>

				<div  class="form_L1" ng-if="modif_convention.type=='new'">				
					<div>Nouvelle convention :</div>
					<div class="C1">
						<input type="text" ng-model="modif_new_convention.convention" placeholder="Taper le nom de la convention" ng-class="exist_convention_class(modif_new_convention.convention)">
						<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_convention(modif_new_convention.convention)">{{exist_convention(modif_new_convention.convention)}}</div>
					</div>

				</div>		
				<div class="bouton" ng-click="sav_convention(modif_new_convention.convention)" ng-if="modif_convention.type=='new'">Créer</div>
			</div>
		</div>

		<div class="layer2" ng-if="layer2">
			<div class="dialogue">
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
		</div>

		<div class="layer2" ng-if="layer6">
			<div class="dialogue" ng-if="!rapport_uploaddone">
				<div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger le nouveau rapport</div>
				<div  class="form_L1">
					<div class="C1">
						<div class="bouton" ngf-select="rapport_upload($file)">Upload file</div>
					</div>
					<div class="C1">
						<div>Drop File:</div>
						<div ngf-drop="rapport_upload($file)" class="drop-box"
						  ngf-drag-over-class="'dragover'"  
						  ngf-pattern="'application/pdf'"><div>Drop</div><div>file here</div></div>
						<div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
					</div >
				</div>
				<div  class="form_L1" ng-bind="rapport_progress"></div>
				<div class="bouton" ng-click="unlay()">Annuler</div>
			</div>
			<div class="dialogue" ng-if="rapport_uploaddone">
				<div class="C1">
					<div style="text-align: center; width: 100%;">Tâche effectuée</div>
					<div class="bouton" ng-click="unlay()">Ok</div>
				</div>
			</div>
		</div>

		<div class="layer2" ng-if="layer5">
			<div class="dialogue" ng-if="!plan_uploaddone">
				<div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger le nouveau plan d'étude</div>
				<div  class="form_L1">
					<div class="C1">
						<div class="bouton" ngf-select="plan_upload($file)">Upload file</div>
					</div>
					<div class="C1">
						<div>Drop File:</div>
						<div ngf-drop="plan_upload($file)" class="drop-box"
						  ngf-drag-over-class="'dragover'"  
						  ngf-pattern="'application/pdf'"><div>Drop</div><div>file here</div></div>
						<div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
					</div >
				</div>
				<div  class="form_L1" ng-bind="plan_progress"></div>
				<div class="bouton" ng-click="unlay()">Annuler</div>
			</div>
			<div class="dialogue" ng-if="plan_uploaddone">
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
			<?php echo '<script type="text/javascript">var Id_of_key='.$_GET["key"].';</script>';?>
			<script src="assets/js/angularapp6.js?v=<?php filemtime('assets/js/angularapp6.js'); ?>" type="text/javascript"></script>


	</body>
</html>