<header>
	<div class='top_header'>
		<a href="index.php">
		<div class="image" style="margin-left: 5px">
		<img src="images/logo_minesterstellar.png" alt="logo_minesterstellar"/>
		</div>
		</a>
		<?php 
		if (isset($_SESSION['clef']))
		{?>
			<a href="logout.php">
			<div class='deconnexion'>
				<div class="titre_bouton" style="font-size: 1em">
				<?php
					echo "Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'];
				?>
				</div>

				<div style="display: flex; justify-content: flex-end;">
					<div class="image">
					<img src="images/logout_mini.png" alt="logout"/>
					</div>

					<div class="titre_bouton" style="font-size: 1em">
					Déconnexion
					</div>
				</div>
			</div>
		<?php }else{ ?>
			<a href="home_connexion.php">
			<div class='connexion'>

				<div class="image">
				<img src="images/login_mini.png" alt="login"/>
				</div>
				
				<div class="titre_bouton">
				Connexion
				</div>
			</div>
			</a>
		<?php } ?>
	</div>

	<div class='menu'>
		<a href="index.php">
		<div class="lien_header">

			<div class="image">
			<img src="images/home_mini.png" alt="home"/>
			</div>

			<div class="titre_bouton">
			Accueil
			</div>
		</div>

		</a>

		<a href="home_actualite.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Journal de Bord
			</div>
		</div>
		</a>

		<a href="home_event.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Événements
			</div>
		</div>
		</a>

		<a href="home_calendrier.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Calendrier
			</div>
		</div>
		</a>

		<a href="home_team.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Équipage
			</div>
		</div>
		</a>

		<a href="home_galerie.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Galerie
			</div>
		</div>
		</a>

		<a href="home_soundbox.php">
		<div class="lien_header">
			<div class="titre_bouton">
			Soundbox
			</div>
		</div>
		</a>

		

		

		<?php 
		if (isset($_SESSION['droits']) AND ($_SESSION['droits']=='ADMIN' OR $_SESSION['droits']=='MOD'))
			{ ?>
			<a href="home_points.php">
			<div class="lien_header">
				<div class="titre_bouton">
				<?php
                if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){
                	echo "Configuration";
                }else{
                	echo "Points";
                }
                ?>				
				</div>
			</div>
			</a>
		<?php } ?>

	</div>
</header>