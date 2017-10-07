<header>
	<div  style="margin: 5px">
    <a href="index.php">
        <img src="images/logo_minesterstellar.png" alt="logo_minesterstellar"/>
    </a> 
    </div>

	<div class='menu'>
		<a href="index.php">
		<div class="lien_header">

			<div class="logo_home">
			<img src="images/home.png" alt="home"/>
			</div>

			<div class="titre_bouton">
			Accueil
			</div>
		</div>
		</a>
	

		<?php 
		if (isset($_SESSION['droits']) AND $_SESSION['droits']=='ADMIN')
		{ ?>

			<a href="index.php?droits=MOD">
			<div class='lien_header'>
				<div class="titre_bouton">
				Mode Éditeur
				</div>
			</div>
			</a>

		<?php 
		}

		if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD')
		{ ?>

			<a href="index.php?droits=ADMIN">
			<div class='lien_header'>
				<div class="titre_bouton">
				Mode User
				</div>
			</div>
			</a>

		<?php 
		}
		if (isset($_SESSION['clef']))
		{?>
			<a href="logout.php">
			<div class='deconnexion'>
				<div class="titre_bouton" style="font-size: 1.1em">
				<?php
					echo "Bonjour ".$_SESSION['prenom'];
				?>
				</div>

				<div style="display: flex; justify-content: flex-end;">
					<div class="logo_home">
					<img src="images/logout.png" alt="logout"/>
					</div>

					<div class="titre_bouton" style="font-size: 1.1em">
					Déconnexion
					</div>
				</div>
			</div>
			</a>
		<?php }else{ ?>
			<a href="home_connexion.php">
			<div class='connexion'>

				<div class="logo_home">
				<img src="images/login.png" alt="login"/>
				</div>
				
				<div class="titre_bouton">
				Connexion
				</div>
			</div>
			</a>
		<?php } ?>
	</div>
</header>