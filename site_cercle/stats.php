<?php
session_start();
include ("php/connexion.php");

if (!isset($_GET["id"])) {
    $_GET["id"]=$_SESSION["id_cercle"];
}
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <?php 
        echo "<link rel='stylesheet' href='css/style.css?".time()."'/>";
        ?>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/appleicon.png" />
        <title>Cercle EMSE-Stats</title>
    </head>

    <body ng-app="stats_app"  ng-controller="mainController">
    	<?php         
        $page=2;        
    	
    	include("php/header.php");
    	?>
    	<div class="page">
    		
            <h1>Coming soon ...</h1>
               
            
    		
    	</div>
        <script src="js/angularjs.js" type="text/javascript"></script>
        
        <?php 
        echo "<script src=\"js/stats_app.js?".time()."\" type=\"text/javascript\"></script>";
        ?>
        
        
    </body>