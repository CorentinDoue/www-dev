<?php
	// Avant tout contenu HTML, on lance une session
	session_start(); // À faire dans toutes les pages pour rester connecter à son compte
	
	// Une variable utile pour gérer les erreurs (c'est un tableau où l'on mettra des messages d'erreur)
	$erreurs = array();
    //include("notifMail.php");
if(isset($_GET['page']))
{
	 include("php/connexion.php");
}
    
?>



<!DOCTYPE html>
<html>
	<head>
		<title>BDE EMSE 2017</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Johannès Chapas, Aymeric Boccard, Corentin Doué" />
		<meta content="width=device-width" name="viewport" /> 
		<meta name="keywords" content="bde, ecole des mines, saint etienne" />
		<meta name="description" content="Site web du bureau des élèves de l'école des mines de saint étienne" />
		<link rel="stylesheet" href="css/style.css" />
        
	</head>
    
	<body>
		
        <div class="logo">
            <img src="images/bde_emse_blanc.png">
		</div>
		<div class="menus">
		<div class="menu">
            <a class="lienMenu" id="resume" href="index.php?page=resume">Résumé</a>
            <a class="lienMenu" id="detail_ope" href="index.php?page=detail_ope">Détail des opérations</a>
            <a class="lienMenu" id="shotgun" href="index.php?page=shotgun">Shotgun</a>
            <a class="lienMenu" id="reserve" href="index.php?page=reserve">Réserver</a>
            
            <?php if(isset($_SESSION["id"])) {?>
            <a class="lienMenu" id="reserve" href="index.php?page=reglages">Réglages</a>
            <a class="lienMenu" href="php/logout.php">Se déconnecter</a>
            <?php }?>
		</div>
		
		<?php
		if(isset($_SESSION["id_admin"])) {
		?>
		<div class="menu_admin">
            <a class="lienMenuAdmin" id="ajout" href="index.php?page=ajout">Ajout</a>
            <a class="lienMenuAdmin" id="retrait" href="index.php?page=retrait">Retrait</a>
            <a class="lienMenuAdmin" id="histo_ope" href="index.php?page=histo_ope&limit=50">Historique</a>
            <a class="lienMenuAdmin" id="ajout_compte" href="index.php?page=ajout_compte">Ajout compte</a>
            <a class="lienMenuAdmin" id="verif_reserve" href="index.php?page=verif_reserve">Vérif réservations</a>
            <?php if(isset($_SESSION["id_super_admin"])) {?>
            <a class="lienMenuAdmin" id="create_event" href="index.php?page=create_event">Créer événement</a>
            <a class="lienMenuAdmin" id="admin" href="index.php?page=admin">Super Gestion</a>
            <?php }?>
		</div>
		
		<?php
		}
		?>
        </div>
		

		<div class="corps">
		<?php
		
		  $pageOK = array('detail_ope' => 'detail_ope.php', 
						  'ajout' => 'ajout.php',
						  'verifajout' => 'verifajout.php',
						  'retrait' => 'retrait.php',
						  'verifretrait' => 'verifretrait.php',
						  'verifretrait2' => 'verifretrait2.php',
						  'histo_ope' => 'histo_ope.php',
						  'shotgun' => 'shotgun.php',
						  'ajout_compte' => 'ajout_compte.php',
						  'admin' => 'admin.php',
						  'edit_user' => 'edit_user.php',
						  'shotgun' => 'shotgun.php', 
						  'detail_ope_admin' => 'detail_ope_admin.php', 
                          'resume' => 'resume.php',
                          'lostPass' => 'lostPass.php',
                          'create_event' => 'create_event.php',
                          'reserve' => 'reserve.php',
                          'verif_reserve' => 'verif_reserve.php',
                          'reglages' => 'reglages.php');
            
		  if ( (isset($_GET['page'])) && (isset($pageOK[$_GET['page']])) ) {
			include($pageOK[$_GET['page']]);   // Nous appelons le contenu central de la page
		  } else {
			include('php/login.php');
		  }
		?>
		</div>
		<div class="pied">
            
		Copyright BDE EMSE 2017 - Tous droits réservés
		</div>
		</br>
	</body>

    <script src="js/autocomplete.js"></script>
    
</html>
