<?php
include "php/connection_bdd.php";

$rep = $bdd->query('SELECT ID, titre, contenu_mob from contenu_mob where ID < 14');

while ($donnees = $rep->fetch())
    {
    	$contenu_mob[$donnees["ID"]]['titre']=$donnees["titre"];
    	$contenu_mob[$donnees["ID"]]['contenu_mob']=$donnees["contenu_mob"];
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
		<title>Mobilités internationales EMSE - Accueil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link href="http://vjs.zencdn.net/6.1.0/video-js.css" rel="stylesheet">

		  <!-- If you'd like to support IE8 -->
		  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
	</head>
	<body id="body" ng-app="myApp1"  ng-controller="mainController">
		<div id="page-wrapper" >
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<?php $CP=1;
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
					


					
						
						<div style="width: 80%; margin-right: 10%; margin-left: 10%; margin-bottom: 20px; display: flex; justify-content: center;">
							<video id="my-video" class="video-js" controls preload="auto" width="712" height="400" poster="video/MY_VIDEO_POSTER.jpg" data-setup="{}" style="width: 100%;" >
							    <source src="video/Projet Citoyen Web.mp4" type='video/mp4'">
							    <source src="video/Projet Citoyen.mov" type='video/mov'>
							    <p class="vjs-no-js">
							      To view this video please enable JavaScript, and consider upgrading to a web browser that
							      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
							    </p>
							</video>
						</div>
						
				<div class="container">	
					<?php 
					if (isset($texte))
					{ ?>
						<div class="row main-row">
							<div class="titre_section"><?php echo $texte ?></div>	
						</div>
					<?php } ?>
					<div class="row main-row">
						<div class="titre_section"><?php echo $contenu_mob[1]['titre']; ?></div>
						<div class="12u">
							
							<section>
								
								<p><?php echo $contenu_mob[1]['contenu_mob']; ?></p>
								
							</section>

						</div>
					</div>
					<div class="row main-row">
						<div class="titre_section">Quand partir ?</div>
						<div class="12u">
							
							<section>
								<h2><?php echo $contenu_mob[2]['titre']; ?></h2>
								<p><?php echo $contenu_mob[2]['contenu_mob']; ?></p>
								<footer class="controls">
									<a class="button" ng-click="lay(2)">En savoir plus</a>
								</footer>
							</section>

						</div>
					</div>
					<div class="row main-row">
						<div class="4u 12u(mobile)">

							<section>
								<h2><?php echo $contenu_mob[3]['titre']; ?></h2>
								<p><?php echo $contenu_mob[3]['contenu_mob']; ?></p>
							</section>

						</div>

						<div class="4u 12u(mobile)">

							<section>
								<h2><?php echo $contenu_mob[4]['titre']; ?></h2>
								<p><?php echo $contenu_mob[4]['contenu_mob']; ?></p>
							</section>

						</div>

						<div class="4u 12u(mobile)">

							<section>
								<h2><?php echo $contenu_mob[5]['titre']; ?></h2>
								<p><?php echo $contenu_mob[5]['contenu_mob']; ?></p>
							</section>

						</div>

						<div class="4u 12u(mobile)">

							<section>
								<h2><?php echo $contenu_mob[6]['titre']; ?></h2>
								<p><?php echo $contenu_mob[6]['contenu_mob']; ?></p>
								<footer class="controls">
									<a class="button" ng-click="lay(3)">En savoir plus</a>
								</footer>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section>
								<h2><?php echo $contenu_mob[7]['titre']; ?></h2>
								<p><?php echo $contenu_mob[7]['contenu_mob']; ?></p>
							</section>

						</div>
					</div>
					
					
					
				</div>
			</div>
            <?php include "php/footer.php"; ?>
		</div>
		<div class="layer" ng-if="layer"></div>
		<div class="layer2" ng-if="layer2">
			<div class="container readable_layer" style="margin-top: 50px; >

					<div class="row main-row">
						<div class="titre_section"><?php echo $contenu_mob[8]['titre']; ?></div>
						<div class="12u">
							
							<section>
								<p><?php echo $contenu_mob[8]['contenu_mob']; ?></p>
							</section>

						</div>
						<div class="12u">
							<h2><?php echo $contenu_mob[9]['titre']; ?></h2>
							<div style="display: flex; justify-content: center; width: 100%;">
								<img src="images/<?php echo $contenu_mob[9]['contenu_mob']; ?>">
							</div>

						</div>
						<div class="12u">
							<h2><?php echo $contenu_mob[10]['titre']; ?></h2>
							<section>
								<p><?php echo $contenu_mob[10]['contenu_mob']; ?></p>
							</section>

						</div>
					</div>
				</div>
			</div>
		<div class="layer2" ng-if="layer3">
			<div class="container readable_layer" style="margin-top: 50px; ">

				<div class="row main-row">
					<div class="titre_section"><?php echo $contenu_mob[11]['titre']; ?></div>
					<div class="12u">
						
						<section>
							<p><?php echo $contenu_mob[11]['contenu_mob']; ?></p>
						</section>

					</div>
					<div class="12u">
						<h2><?php echo $contenu_mob[12]['titre']; ?></h2>
						<div style="display: flex; justify-content: center; width: 100%;">
							<img src="images/<?php echo $contenu_mob[12]['contenu_mob']; ?>">
						</div>

					</div>
					<div class="12u">
						<h2><?php echo $contenu_mob[13]['titre']; ?></h2>
						<section>
							<p><?php echo $contenu_mob[13]['contenu_mob']; ?></p>
						</section>

					</div>
				</div>
			</div>
		</div>
		<div class="unlay" ng-if="layer" ng-click="unlay()">X</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/angularjs.js" type="text/javascript"></script>
			<script src="assets/js/angularapp1.js" type="text/javascript"></script>
			<script src="http://vjs.zencdn.net/6.1.0/video.js"></script>

	</body>
</html>