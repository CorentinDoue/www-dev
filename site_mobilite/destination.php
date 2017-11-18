<?php
include "php/connection.php";

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

	$rep = $bdd->prepare('SELECT  d.nom, d.complement_nom, v.nom as ville, p.nom as pays, d.langue_cours as langues, d.type_mobilite, d.type_convention, d.site_internet, d.places, d.description, d.commentaires, d.document, d.ingenieurie FROM destinations d, villes v, pays p WHERE d.ID = ? AND d.ID_Ville=v.ID AND v.ID_pays=p.ID');
	$rep->execute(array($_GET['key']));
	$i=0;
	while ($donnees = $rep->fetch())
	    {
	    	$req = $bdd->prepare('SELECT do.nom FROM domaines do, domainedestination dd WHERE dd.ID_domaine=do.ID AND dd.ID_destination=?');
	        $req->execute(array($_GET['key']));
	        $j=0;
	        while ($donnees2 = $req->fetch())
	            {
	                $domaines[$j]=$donnees2['nom'];
	                $j++;
	            }
	        if ($j==0) {
	        	$domaines=[];
	        }
	    	$i=1;
	        $destination['clef']=$_GET['key'];
	        $destination['complement_nom']=trim($donnees['complement_nom']);
	        $destination['nom']=trim($donnees['nom']);
	        $destination['ville']=trim($donnees['ville']);
	        $destination['pays']=trim($donnees['pays']);
	        $destination['domaines']=$domaines;
	        $type_mobilites=explode("/", $donnees['type_mobilite']);
	        $type_mobilites=array_map("correct_type_mobilite", $type_mobilites);
	        $destination['types_mobilites']=$type_mobilites;
	        $destination['type_convention']=trim($donnees['type_convention']);
	        $destination['site']=trim($donnees['site_internet']);
	        $langues=explode("/", $donnees['langues']);
	        $langues=array_map("trim", $langues);
	        $destination['langues']=$langues;
	        $destination['places']=trim($donnees['places']);
	        $destination['document']=trim($donnees['document']);
	        $destination['description']=trim($donnees['description']);
	        $destination['commentaires']=trim($donnees['commentaires']);
	        $destination['ingenieurie']=$donnees['ingenieurie'];

	    }
	if ($i!=0) {
		$rep = $bdd->prepare('SELECT p.ID as clef, p.nom, p.prenom,p.promo, p.date_debut, p.date_fin, p.tuteur, p.type_mobilite, p.type_convention, p.rapport, p.bulletin, p.remarques FROM mobilite m, parcours p WHERE m.ID_parcour=p.ID AND m.ID_destination= ?');
		$rep->execute(array($_GET['key']));
		$i=0;
		while ($donnees = $rep->fetch())
		{
			$req = $bdd->prepare('SELECT do.nom FROM domaines do, domaineparcour dp WHERE dp.ID_domaine=do.ID AND dp.ID_parcour=?');
	        $req->execute(array($donnees['clef']));
	        $j=0;
	        $domaines=[];
	        while ($donnees2 = $req->fetch())
	        {
	            $domaines[$j]=$donnees2['nom'];
	            $j++;
	        }
			$parcours[$i]['nom']=trim($donnees['nom']);
			$parcours[$i]['prenom']=trim($donnees['prenom']);
			$parcours[$i]['promo']=$donnees['promo'];
			$parcours[$i]['domaines']=$domaines;
			$parcours[$i]['date_debut']=$donnees['date_debut'];
			$parcours[$i]['date_fin']=$donnees['date_fin'];

			$parcours[$i]['tuteur']=trim($donnees['tuteur']);
			$parcours[$i]['type_convention']=trim($donnees['type_convention']);
			$parcours[$i]['type_mobilite']=correct_type_mobilite($donnees['type_mobilite']);
			$parcours[$i]['rapport']=trim($donnees['rapport']);
			$parcours[$i]['bulletin']=trim($donnees['bulletin']);
			$parcours[$i]['remarques']=trim($donnees['remarques']);
			$i++;
		}
	}else{
		$erreur="La clef de destination entrée ne correspond pas à une destination";
		$destination["nom"]="Erreur";
	}
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
<html>
	<head>
		<title>Mobilités internationales EMSE - <?php echo $destination["nom"]; ?></title>
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
					<div style="width: 100%;">
					<div class="row main-row" style="margin: 0;">
						<?php
						if (isset($erreur) and $erreur!=Null) {
							echo "<div class=\"titre_section\">Erreur</div>";
							echo "<div class=\"erreur\">".$erreur."</div>";
						}else{
						?>
							<div class="ID_block">
								<div class="titre_section">
								<?php
									echo $destination['nom'];
								?>
								</div>
								<div class="ID_card_L1">
									<div class="ID_block_C1">
										<p class='blackcolor'>
										<?php
											echo $destination['complement_nom'];
										?>
										</p>
										<p>
										<?php
											echo "Ville:  <span class='blackcolor'>".$destination['ville']."</span>";
										?>
										</p>
										<p>
										<?php
											echo "Pays:  <span class='blackcolor'>".$destination['pays']."</span>";
										?>
										</p>
										<p>
										<?php
											echo '<a target="blank" href="http://'.$destination['site'].'">'.$destination['site'].'</a>';
										?>
										</p>
										<div class="ID_card_L2">
									<p>
									Langues d'enseignement :
									</p>
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;">
									<?php
										foreach ($destination['langues'] as $key => $value) {
											echo "<div class='domaine_etude'>".$value;
											if ($key==count($destination['langues'])-1) {
												echo ".</div>";
											}else{
												echo ";</div>";
											}
										}
									?>
								</div>
									</div>
									<div class="ID_block_C1">
										<div class="ID_card_L2">
											<?php
												foreach ($destination['types_mobilites'] as $key => $value) {
													echo '<div class="logo_type_mobilite">
							        						<img style="width :100%;" src="images/logo_type_mobilite/logo_'.$value.'.png">
							        					</div>';
												}
											?>
										</div>
										<div class="places">
											<span class='blackcolor'>
											<?php
												if ($destination['places']==0)
												{
													echo "Attention !<br>Il n'y a pas de place offerte par les partenariats de l'école.";
												}elseif ($destination['places']==1) {
													echo "Il y a ".$destination['places']." place offerte par les partenariats de l'école.<br>Cette place est en priorité pour les départs en S7.";
												}else{
													echo "Il y a ".$destination['places']." places offertes par les partenariats de l'école.<br>Ces places sont en priorité pour les départs en S7.";
												}
											?>
											</span>
										</div>

										<?php if ( $destination['type_convention']!=NULL AND  $destination['type_convention']!="") {
										?>
										<div>
										<div class="ID_card_L2">
											<p>
											Type de convention :
											</p>
										</div>
										<div class="ID_card_L2 blackcolor" style="margin-bottom: 1.25em;">
											<?php
												echo $destination['type_convention'];

										echo "</div></div>";
										}
										if ($destination['document']!=NULL) {
										?>
										<div class="ID_card_L3">
											<div class="blocks_pdf">
											<?php

												 echo '<a href="documents/destination/'.$destination['document'].'" target="_blank">';
												 ?>
												 <div class="block_pdf">
													<div class="logo_pdf">
							        					<img style="width :100%;" src="images/pdf.png">
							        				</div>
							        				<div>
							        					Document informatif
							        				</div>
												 </div>
												 </a>

											</div>
										</div>
										<?php
										}
										?>
									</div>
								</div>

								<div class="ID_card_L2">
									<p>
									Domaines d'études :
									</p>
								</div>
								<?php
								if ($destination['ingenieurie']==1) { ?>
									<div class="blackcolor">La convention avec l'établissement stipule que tous les domaines couverts par l'établissement sont accessibles aux ICM. Les domaines suivants en sont une partie, consulter le site de l'établissement pour connaitre tous les domaines.</div>
									<div style="height: 20px;"></div>
									<div class="ID_card_L2" style="margin-left: 5px;">
										<p>
										Domaines :
										</p>
									</div><!--<div style="height: 20px;">-->
								<?php	} ?>

								<div class="ID_card_L2" style="margin-bottom: 1.25em;">
									<?php
										foreach ($destination['domaines'] as $key => $value) {
											echo "<div class='domaine_etude'>".$value;
											if ($key==count($destination['domaines'])-1) {
												echo ".</div>";
											}else{
												echo ";</div>";
											}
										}
									?>
								</div>
								<?php
								if ($destination['description']!="") {
									?>
									<div class="ID_card_L2">
									<p>
									Description :
									</p>
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;">
									<p class='blackcolor'>
									<?php
										echo $destination['description'];
									?>
									</p>
								</div>
								<?php
								}
								if ($destination['commentaires']!="") {
								?>

								<div class="ID_card_L2">
									<p>
									Commentaires :
									</p>
								</div>
								<div class="ID_card_L2" style="margin-bottom: 1.25em;">
									<p class='blackcolor'>
									<?php
										echo $destination['commentaires'];
									?>
									</p>
								</div>
								<?php
								}
								if (isset($parcours)) {
									echo "<h2 style='text-align: center;'>Précédents départs :</h2>";
									foreach ($parcours as $key => $parcour) {
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

											echo "</div>";
											if (count($parcour['domaines'])>0)
											{

											?>
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
											}
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
