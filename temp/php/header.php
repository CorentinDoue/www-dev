

<header id="header">
	<h1><a href="index.php" id="logo">Mobilités Académiques et Internationales</a></h1>
	<nav id="nav">
		<ul>		
			<li <?php if ($CP==1) {	echo 'class="current-page-item"';}?>><a href="index.php" >Accueil</a></li>
			<li <?php if ($CP==2) {	echo 'class="current-page-item"';}?>><a href="destinations.php">Destinations</a></li>
			<li <?php if ($CP==3) {	echo 'class="current-page-item"';}?>><a href="demarches.php">Démarches</a>
				<ul>
					<li><a href="demarches.php#doc">Documents</a></li>
					<li><a href="demarches.php#bours">Bourses</a></li>
					<li><a href="demarches.php#ass">Assurances</a></li>
					<li><a href="demarches.php#lang">Langues d'enseignement</a></li>
					<li><a href="demarches.php#contact">Contacts</a></li>
				</ul>
			</li>
		</ul>									
	</nav>
</header>

