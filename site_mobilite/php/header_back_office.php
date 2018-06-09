
<header id="header">
	<h1><a href="index_back_office.php" id="logo">Mobilités Académiques et Internationales</a></h1>
	<nav id="nav">
		<ul>
			<li <?php if ($CP==1) {	echo 'class="current-page-item"';}?>><a href="contenu_mob.php" >Contenu</a></li>
			<li <?php if ($CP==2) {	echo 'class="current-page-item"';}?>><a href="modif_bdd.php">Base de données</a></li>
			<li <?php if ($CP==3) {	echo 'class="current-page-item"';}?>><a href="excel.php">Excel</a></li>
		</ul>									
	</nav>
</header>