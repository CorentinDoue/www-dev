<?php
 include "php/connection_back_office.php";
if (isset($_GET['key'])) {

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

	function array_iunique($array) {
	    return array_intersect_key($array, array_unique(array_map('strtolower', $array)));
	}

	function nb_to_month($nb){
		if ($nb=='01') {
			return 'janvier';
		}
		if ($nb=='02') {
			return 'février';
		}
		if ($nb=='03') {
			return 'mars';
		}
		if ($nb=='04') {
			return 'avril';
		}
		if ($nb=='05') {
			return 'mai';
		}
		if ($nb=='06') {
			return 'juin';
		}
		if ($nb=='07') {
			return 'juillet';
		}
		if ($nb=='08') {
			return 'août';
		}
		if ($nb=='09') {
			return 'septembre';
		}
		if ($nb=='10') {
			return 'octobre';
		}
		if ($nb=='11') {
			return 'novembre';
		}
		if ($nb=='12') {
			return 'décembre';
		}
		return '';
	}

	function trans_date($date)
	{
		$date=explode("-", $date);
		if ($date[2]=='01') {
			$date[2]='1er';
		}
		if ($date[2]=='02') {
			$date[2]='2';
		}
		if ($date[2]=='03') {
			$date[2]='3';
		}
		if ($date[2]=='04') {
			$date[2]='4';
		}
		if ($date[2]=='05') {
			$date[2]='5';
		}
		if ($date[2]=='06') {
			$date[2]='6';
		}
		if ($date[2]=='07') {
			$date[2]='7';
		}
		if ($date[2]=='08') {
			$date[2]='8';
		}
		if ($date[2]=='09') {
			$date[2]='9';
		}
		return $date[2]." ".nb_to_month($date[1])." ".$date[0];
	}
	/*

		$rep = $bdd->prepare('SELECT p.ID, p.nom, p.prenom,p.promo, p.date_debut, p.date_fin, p.tuteur, p.type_mobilite, p.type_convention, p.rapport, p.bulletin, p.remarques FROM mobilite m, parcours p WHERE m.ID_parcour=p.ID AND m.ID_destination= ?');
		$rep->execute(array($_GET['key']));
		$i=0;
		while ($donnees = $rep->fetch())
		{	
			$parcours[$i]['ID']=trim($donnees['ID']);
			$parcours[$i]['nom']=trim($donnees['nom']);
			$parcours[$i]['prenom']=trim($donnees['prenom']);
			$parcours[$i]['promo']=$donnees['promo'];
			$rep = $bdd->prepare('SELECT d.nom FROM domaines d, domaineparcour dp WHERE dp.ID_parcour=? AND dp.ID_domaine=d.ID');
			$rep->execute(array($parcours[$i]['ID']));
			$j=0;
			while ($donnees2 = $rep->fetch())
			{
				$parcours[$i]['domaines'][$j]=$donnees2['nom'];
				$j++;
			}
			$parcours[$i]['date_debut']=$donnees['date_debut'];
			$parcours[$i]['date_fin']=$donnees['date_fin'];
		
			$parcours[$i]['tuteur']=trim($donnees['tuteur']);
			$parcours[$i]['type_convention']=trim($donnees['type_convention']);
			$parcours[$i]['type_mobilite']=correct_type_mobilite($donnees['type_mobilite']);
			$parcours[$i]['rapport']=trim($donnees['rapport']);
			$parcours[$i]['bulletin']=trim($donnees['bulletin']);
			$parcours[$i]['remarques']=trim($donnees['remarques']);
			$i++;
		} */
	
}else{
	$erreur="Pas de clef de destination entrée";
	$destination["nom"]="Erreur";
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
		<title>Mobilités internationales EMSE - <?php echo $destination["nom"]; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/back_office.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
	<body ng-app="myApp4"  ng-controller="mainController">
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
								<div class="titre_section" ng-if="!modif.titre">{{destination.nom}}<span class="bouton" ng-click="modif_titre()" ng-if="!modif.titre">Modifier</span></div>
								<textarea class="titre_modif" ng-model="destination.nom" ng-if="modif.titre"> </textarea>
								<div class="bouton" ng-click="sav_titre()" ng-if="modif.titre">Enregistrer</div>
								<div style="width: 100%; display: flex; justify-content: center;">
									<div ng-if="destination.activ==1" style="font-size: 1.2em;">La destination est visible</div>	
									<div ng-if="destination.activ==0" style="font-size: 1.2em;">/!\ La destination n'est pas visible aux élèves</div>
								</div>
								<div style="width: 100%; display: flex; justify-content: center;">
									<div class="bouton" style="font-size: 1.2em;"" ng-click="activ()">Modifier</div>									
								</div>														
								<div class="ID_card_L1">
									<div class="ID_block_C1">
										<p class='blackcolor' ng-if="!modif.compl">{{destination.complement_nom}}<span class="bouton" ng-click="modif_compl()" ng-if="!modif.compl">Modifier</span></p>
										<textarea style="width: 100%;" ng-model="destination.complement_nom" ng-if="modif.compl"></textarea>
										<div class="bouton" ng-click="sav_compl()" ng-if="modif.compl">Enregistrer</div>
										<p>Ville:  <span class='blackcolor'>{{destination.ville}}</span> <span class="bouton" ng-click="lay(2)">Modifier</span></p>
										<p>Pays:  <span class='blackcolor'>{{destination.pays}}</span></p>
										<p ng-if="!modif.site"><a href="http://{{destination.site}}">{{destination.site}}</a><span class="bouton" ng-click="modif_site()">Modifier</span></p>
										<textarea style="width: 100%;" ng-model="destination.site" ng-if="modif.site"></textarea>
										<div class="bouton" ng-click="sav_site()" ng-if="modif.site">Enregistrer</div>
										<div class="ID_card_L2">
											<p>
											Langues :
											</p>
										</div>
										<div class="ID_card_L2" style="margin-bottom: 1.25em;">
											<div class='domaine_etude' ng-repeat="langue in destination.langues">
												<span ng-show='!$last'>{{langue}}; </span>
												<span ng-show='$last'>{{langue}}.</span>
											</div>
											<span class="bouton" ng-click="lay(4)">Modifier</span>
										</div>
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
										<div class="bouton" ng-if="!modif.type_mobilite" ng-click="modif_type_mobilite()">Modifier</div>
										<div class="ID_card_L1" ng-if="modif.type_mobilite">
											<label><input type="checkbox" ng-model="destination.type_S7">S7</label>
											<label><input type="checkbox" ng-model="destination.type_stage_2A">Stage 2A</label>
											<label><input type="checkbox" ng-model="destination.type_FR">FR</label>
											<label><input type="checkbox" ng-model="destination.type_S10">S10</label>
											<label><input type="checkbox" ng-model="destination.type_DD">DD</label>
											<label><input type="checkbox" ng-model="destination.type_TFE">TFE</label>
										</div>
										<div class="bouton" ng-if="modif.type_mobilite" ng-click="sav_type_mobilite()">Enregistrer</div>
										<div class="places" ng-if="!modif.places">
											<span class='blackcolor' ng-bind-html="destination.text_places"></span><span class="bouton" ng-click="modif_places()">Modifier</span>
										</div>
										<div class="places" ng-if="modif.places">
											Il y a <input type="number" ng-model="destination.places"> places offertes<span class="bouton" ng-click="sav_places()">Enregistrer</span>
										</div>
										<div>
											<div class="ID_card_L2">
												<p>
												Convention :
												</p>
											</div>
											<div class="ID_card_L2" style="margin-bottom: 1.25em;">
												<span class="blackcolor">{{destination.type_convention}}</span><span class="bouton" ng-click="lay(5)">Modifier</span>
											</div>
										</div>
										<div class="ID_card_L3">
											<div class="blocks_pdf">
												
												 				
												 <div class="block_pdf" ng-if="destination.document">
												 	<a href="documents/destination/{{destination.document}}" target="blank" >
													<div class="logo_pdf">
							        					<img style="width :100%;" src="images/pdf.png">
							        				</div>
							        				<div>
							        					Document informatif
							        				</div>
							        				</a>
							        				<div class="bouton" ng-click="lay(6)">
							        					Modifier
							        				</div>
												 </div>
												
																
												<div class="block_pdf" ng-if="!destination.document">
													<div class="logo_pdf">
							        					<img style="width :100%;" src="images/pdf.png">
							        				</div>
							  
							        				<div class="bouton" ng-click="lay(6)">
							        					Ajouter un document
							        				</div>
												</div>
												
											</div>
										</div>																				
									</div>
								</div>
								
								<div class="ID_card_L2">
									<p>
									Domaines d'études :
									</p>
								</div>
								<div ng-if="destination.ingenieurie==1" class="blackcolor">La convention avec l'établissement stipule que tous les domaines couverts par l'établissement sont accessibles aux ICM. Les domaines suivants en sont une partie, consulter le site de l'établissement pour connaitre tous les domaines.</div>
								<div ng-if="destination.ingenieurie==0" class="blackcolor">La convention avec l'établissement <u>ne stistipule pas</u> que tous les domaines couverts par l'établissement sont accessibles aux ICM.</div>
								<div class="bouton" ng-click="ingenieurie()">Modifier</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;">
									<div class='domaine_etude' ng-repeat="domaine in destination.domaines">
										<span ng-show='!$last'>{{domaine}}; </span>
										<span ng-show='$last'>{{domaine}}.</span>
									</div>
									<span class="bouton" ng-click="lay(3)">Modifier</span>
								</div>
								<div class="ID_card_L2">
									<p>
									Description :
									</p>
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;" ng-if="!modif.desc">
									<p class='blackcolor'  ng-bind-html="destination.description"></p>
								</div>
								<div class="bouton" ng-click="modif_desc()" ng-if="!modif.desc">Modifier</div>
								<textarea style="width: 100%;" ng-model="destination.description" ng-if="modif.desc"></textarea>
								<div class="bouton" ng-click="sav_desc()" ng-if="modif.desc">Enregistrer</div>
								<div class="ID_card_L2">
									<p>
									Commentaires :
									</p>
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;" ng-if="!modif.com">
									<p class='blackcolor' ng-bind-html="destination.commentaires"></p>
								</div>
								<div class="bouton" ng-click="modif_com()" ng-if="!modif.com">Modifier</div>
								<textarea style="width: 100%;" ng-model="destination.commentaires" ng-if="modif.com"></textarea>
								<div class="bouton" ng-click="sav_com()" ng-if="modif.com">Enregistrer</div>
								

								<?php 
								if (isset($_GET['parcour'])) {
									if (isset($_GET["excel"])) {
										echo('<a href="excel.php?excel='.$_GET["excel"].'&ligne='.$_GET["ligne"].'&ajoutee='.$_GET["ajoutee"].'&modifiee='.$_GET["modifiee"].'"><div class="button">Revenir a l\'excel en cours d\'importation</div></a>');
									}else{
										echo("<a href='majparcour?key=".$_GET['parcour']."'><div class='button'>Revenir au parcour en cours de modification</div></a>");
									}
									
								}
								if (isset($parcours)) {
									echo "<h2 style='text-align: center;'>Précédents départs :</h2>";
									foreach ($parcours as $key => $parcour) {
										
										echo "<a href=\"majparcour.php?key=".$parcour['ID']."\">";
										?>
										<div class='block_parcour'>
											<div class="ID_card_L1">
												<div class="ID_block_C1">
													<div class="ID_card_L2" style="margin-bottom: 1em;">
														<?php
															echo "<div class='parcour_name'>".$parcour['prenom']."</div>";
															echo "<div class='parcour_name'>".$parcour['nom']."</div>";
															echo "<div class='parcour_name'>Promo ".$parcour['promo']."</div>";
														?>	
													</div>
												</div>
												<div class="ID_block_C1">
													<div class="logo_type_mobilite">
													<?php
							        					echo '<img style="width :100%;" src="images/logo_type_mobilite/logo_'.$parcour['type_mobilite'].'.png">';
							        				?>
							        				</div>
												</div>
											</div>
											<div class="ID_card_L1" style="margin-bottom: 1em;">
												<div>
												Date de séjour : 
												<?php 
													echo "<span class='blackcolor'>Du ".trans_date($parcour['date_debut'])." au ".trans_date($parcour['date_fin'])."</span></div>";
												if ($parcour['type_convention']!=NULL) {
													echo "<div>Convention : <span class='blackcolor'>".$parcour['type_convention']."</span></div>";
												}
												?>
											</div>
											<div class="ID_card_L2" style="margin-bottom: 1.25em;">
												<div class="titre_attribut">Domaines d'études :</div>
												<?php
													foreach ($parcour['domaines'] as $key => $value) {
														echo "<div class='domaine_etude'>".$value;
														if ($key==count($parcour['domaines'])-1) {
															echo ".</div>";
														}else{
															echo ";</div>";
														}
													}
												?>	
											</div>											
											<?php
											if ($parcour['tuteur']!=NULL) {
												echo "<div class=\"ID_card_L2\" style=\"margin-bottom: 1.25em;\"><div class=\"titre_attribut\">Tuteur :</div><span class='blackcolor'> ".$parcour['tuteur']."</span></div>";
											}

											

											if ($parcour['remarques']!=NULL) {
												?>
												<div class="ID_card_L1">
													<div class="ID_block_C1">
														<div class="ID_card_L2">
															<div class="titre_attribut">Remarques :</div>
														</div>
														<div class="ID_card_L2" style="margin-bottom: 1.25em;">
															<?php
															echo "<span class='blackcolor'> ".$parcour['remarques']."</span>";
															?>
														</div>
													</div>
													<?php
													if ($parcour['rapport']!=NULL OR $parcour['bulletin']!=NULL) {
													?>
													<div class="ID_block_C1">
														<div class="blocks_pdf">
															<?php
																if ($parcour['rapport']!=NULL) {
																 echo '<a href="documents/rapports/'.$parcour['rapport'].'" target="_blank">';
																 ?>
																 <div class="block_pdf">
																	<div class="logo_pdf">
											        					<img style="width :100%;" src="images/pdf.png">
											        				</div>
											        				<div>
											        					Rapport du séjour
											        				</div>
																 </div>
																 </a>
																 <?php
																}
																if ($parcour['bulletin']!=NULL) {
																 echo '<a href="documents/bulletins/'.$parcour['bulletin'].'" target="_blank">';
																 //echo $parcour['bulletin'];
																 ?>
																 <div class="block_pdf">
																	<div class="logo_pdf">
											        					<img style="width :100%;" src="images/pdf.png">
											        				</div>
											        				<div>
											        					Bulletin
											        				</div>
																 </div>
																 </a>
																 <?php
																}
															?>
														</div>
													</div>
													<?php
													}
													?>
												</div>
											<?php
											}else{
												if ($parcour['rapport']!=NULL OR $parcour['bulletin']!=NULL) {
												?>
													<div class="ID_card_L3">
														<div class="blocks_pdf">
														<?php
															if ($parcour['rapport']!=NULL) {
															 echo '<a href="documents/rapports/'.$parcour['rapport'].'" target="_blank">';
															 ?>
															 <div class="block_pdf">
																<div class="logo_pdf">
										        					<img style="width :100%;" src="images/pdf.png">
										        				</div>
										        				<div>
										        					Rapport du séjour
										        				</div>
															 </div>
															 </a>
															 <?php
															}
															if ($parcour['bulletin']!=NULL) {
															 echo '<a href="documents/bulletins/'.$parcour['bulletin'].'" target="_blank">';
															 ?>
															 <div class="block_pdf">
																<div class="logo_pdf">
										        					<img style="width :100%;" src="images/pdf.png">
										        				</div>
										        				<div>
										        					Bulletin
										        				</div>
															 </div>
															 </a>
															 <?php
															}
														?>
														</div>
													</div>
											<?php
												}
											}												
											?>											
										</div>
										</a>
										<?php
									}
								}								
								?>
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
		<div class="layer2" ng-if="layer2">
			<div class="dialogue">
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
						<div style="font-size: 0.8em; margin-top: 10px; text-align: center;" >ou</div>
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
		</div>
		<div class="layer2" ng-if="layer3">
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
		<div class="layer2" ng-if="layer4">
			<div class="dialogue">
				<div class="form_L1">
					<label><input type="radio" ng-model="modif_langue.type" value="selection" ng-click="init_langue()">Selectionner une langue d'étude</label>
					<label><input type="radio" ng-model="modif_langue.type" value="new" ng-click="init_new_langue()">Créer une langue d'étude</label>
				</div>
				<div  class="form_L1" ng-if="modif_langue.type=='selection'">
					<div class="C1">
						<div class="unchecked clickable" ng-click="langues.selectall()" >{{langues.select}}</div>
						<div class="C1" ng-repeat="langue in langues.checkable" >
							<div class="checked" ng-if="langues.isin(langue)">
								<div class="option_texte">{{langue}}</div><div class="clickable" ng-click="langues.uncheck(langue)" style="width: 20px;"><img style="width :100%;" src="images/croix rouge.jpg"></div>
							</div>
							<div class="unchecked clickable" ng-click="langues.check(langue)" ng-if="!langues.isin(langue)">
								<div class="option_texte">{{langue}}</div>
							</div>
						</div>
					</div>
				</div>		
				<div class="bouton" ng-click="sav_langue(langues.checked)" ng-if="modif_langue.type=='selection'">Enregistrer</div>

				<div  class="form_L1" ng-if="modif_langue.type=='new'">				
					<div>Nouvelle langue :</div>
					<div class="C1">
						<input type="text" ng-model="modif_new_langue.langue" placeholder="Taper le nom de la langue" ng-class="exist_langue_class(modif_new_langue.langue)">
						<div style="font-size: 0.7em; margin-top: 5px; text-align: center;" ng-if="exist_langue(modif_new_langue.langue)">{{exist_langue(modif_new_langue.langue)}}</div>
					</div>

				</div>		
				<div class="bouton" ng-click="sav_new_langue(modif_new_langue.langue)" ng-if="modif_langue.type=='new'">Créer</div>
			</div>
		</div>
		<div class="layer2" ng-if="layer5">
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

		<div class="layer2" ng-if="layer6">
			<div class="dialogue" ng-if="!uploaddone">
				<div style="text-align: center; width: 100%; font-size: 1.2em;">Télécharger le nouveau document</div>
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
			<?php echo '<script type="text/javascript">var Id_of_key='.$_GET["key"].';</script>';?>
			<script src="assets/js/angularapp4.js" type="text/javascript"></script>


	</body>
</html>