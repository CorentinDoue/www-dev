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
        <link rel='stylesheet' href='css/nv.d3.css'>
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

            <h1>Cours de la bière</h1>


            <div class="formulaire">
              <div class="inventaire">
                <div class="bouton" style="margin-left:10px;" ng-repeat="boisson in boissons">
                    <div>
                      {{boisson.nom}} : {{boisson.prix}}€
                    </div>
                </div>
              </div>
              <nvd3 options="options" data="data"></nvd3>
            </div>



    	</div>
        <script src="js/angularjs.js" type="text/javascript"></script>
        <script src="js/d3.js" type="text/javascript"></script>
        <script src="js/nv.d3.js" type="text/javascript"></script>
        <script src="js/angular-nvd3.js" type="text/javascript"></script>
        <?php
        echo "<script src=\"js/stats_app.js?".time()."\" type=\"text/javascript\"></script>";
        ?>


    </body>
