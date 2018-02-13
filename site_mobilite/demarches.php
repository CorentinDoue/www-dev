<?php
include "php/connection_bdd.php";

$rep = $bdd->query('SELECT ID, titre, contenu from contenu where ID > 13');

while ($donnees = $rep->fetch())
    {
    	$contenu[$donnees["ID"]]['titre']=$donnees["titre"];
    	$contenu[$donnees["ID"]]['contenu']=$donnees["contenu"];
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
		<title>Mobilités internationales EMSE - Préparer son dossier</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<?php $CP=3;
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
						<div class="titre_section"><?php echo $contenu[19]['titre']; ?></div>
						<div class="12u">
							
							<section id="doc">
								<h2><?php echo $contenu[14]['titre']; ?></h2>
								<p><?php echo $contenu[14]['contenu']; ?></p>
								
							</section>

						</div>
						<div class="12u">
							
							<section id="bours">
								<h2><?php echo $contenu[15]['titre']; ?></h2>
								<p><?php echo $contenu[15]['contenu']; ?></p>
								
							</section>

						</div>
						<div class="12u">
							
							<section id="ass">
								<h2><?php echo $contenu[16]['titre']; ?></h2>
								<p><?php echo $contenu[16]['contenu']; ?></p>
								
							</section>

						</div>
						<div class="titre_section" id="lang"><?php echo $contenu[17]['titre']; ?></div>
						<div class="12u">
							
							<section>
					
								<p><?php echo $contenu[17]['contenu']; ?></p>
								
							</section>

						</div>
						<div class="titre_section" id="contact"><?php echo $contenu[18]['titre']; ?></div>
						<div class="12u">
							
							<section>
					
								<p><?php echo $contenu[18]['contenu']; ?></p>
								
							</section>

						</div>
					</div>
				</div>
			</div>
            <?php include "php/footer.php"; ?>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>