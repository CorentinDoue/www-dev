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

            <h1>Stats</h1>

            <div class="formulaire" style="min-height: 25em; padding: 0;">
                <div class="accordion" ng-class="stats_globales.class" ng-click="stats_globales.activate(); start_stats_globales()">
                    <div style="height: 20px; width: 20px;" ng-if="stats_globales.screen">
                        <img style="width :100%;" src="images/accordion_activate.png">
                    </div>
                    <div style="height: 20px; width: 20px;" ng-if="!stats_globales.screen">
                        <img style="width :100%;" src="images/accordion.png">
                    </div>
                    <div style="margin-left: 10px">Stats globales</div>
                </div>
                <div ng-if="stats_globales.screen" class="inventaire">
                    <div class="classement">
                        <div class="selector">
                            <h1>Globale</h1>
                            <div class="L_center">
                                <div style="margin-right: 5px">Classé par :</div>
                                <input type="radio" name="classby" value="depense" ng-model="stats_globales.globale.classby" style="margin-bottom: auto"><div style="margin-right: 5px">Dépenses</div>
                                <input type="radio" name="classby" value="volume" ng-model="stats_globales.globale.classby" style="margin-bottom: auto"><div style="margin-right: 5px">Volume</div>
                                <input type="radio" name="classby" value="alcool" ng-model="stats_globales.globale.classby" style="margin-bottom: auto"><div style="margin-right: 5px">Volume d'alcool</div>
                                <input type="radio" name="classby" value="perm" ng-model="stats_globales.globale.classby" style="margin-bottom: auto"><div>Nb de perm</div>
                            </div>
                        </div>
                        <div class="centreur">
                            <div class="C_centre">
                                <div class="L_tableau">
                                    <div class="head_tableau_stats">Classement</div>
                                    <div class="head_tableau_stats">Prénom</div>
                                    <div class="head_tableau_stats">Nom</div>
                                    <div class="head_tableau_stats">Promo</div>
                                    <div class="head_tableau_stats">Dépenses</div>
                                    <div class="head_tableau_stats">Volume</div>
                                    <div class="head_tableau_stats">Volume d'alcool*</div>
                                    <div class="head_tableau_stats">Nb de Perm</div>
                                </div>
                                <div class="L_tableau" ng-class="color($index)" ng-if="stats_globales.globale.classby=='depense'" ng-repeat="user in stats_globales.globale.data.depense | limitTo : stats_globales.globale.limit>
                                    <div class="case_tableau">{{user.classement}}</div>
                                    <div class="case_tableau">{{user.prenom}}</div>
                                    <div class="case_tableau">{{user.nom}}</div>
                                    <div class="case_tableau">{{user.promo}}</div>
                                    <div class="case_tableau">{{user.depense}}</div>
                                    <div class="case_tableau">{{user.volume}}</div>
                                    <div class="case_tableau">{{user.alcool}}</div>
                                    <div class="case_tableau">{{user.perm}}</div>
                                </div>
                                <div class="L_tableau" ng-class="color($index)" ng-if="stats_globales.globale.classby=='volume'" ng-repeat="user in stats_globales.globale.data.volume">
                                    <div class="case_tableau">{{user.classement}}</div>
                                    <div class="case_tableau">{{user.prenom}}</div>
                                    <div class="case_tableau">{{user.nom}}</div>
                                    <div class="case_tableau">{{user.promo}}</div>
                                    <div class="case_tableau">{{user.depense}}</div>
                                    <div class="case_tableau">{{user.volume}}</div>
                                    <div class="case_tableau">{{user.alcool}}</div>
                                    <div class="case_tableau">{{user.perm}}</div>
                                </div>
                                <div class="L_tableau" ng-class="color($index)" ng-if="stats_globales.globale.classby=='alcool'" ng-repeat="user in stats_globales.globale.data.alcool">
                                    <div class="case_tableau">{{user.classement}}</div>
                                    <div class="case_tableau">{{user.prenom}}</div>
                                    <div class="case_tableau">{{user.nom}}</div>
                                    <div class="case_tableau">{{user.promo}}</div>
                                    <div class="case_tableau">{{user.depense}}</div>
                                    <div class="case_tableau">{{user.volume}}</div>
                                    <div class="case_tableau">{{user.alcool}}</div>
                                    <div class="case_tableau">{{user.perm}}</div>
                                </div>
                                <div class="L_tableau" ng-class="color($index)" ng-if="stats_globales.globale.classby=='perm'" ng-repeat="user in stats_globales.globale.data.perm">
                                    <div class="case_tableau">{{user.classement}}</div>
                                    <div class="case_tableau">{{user.prenom}}</div>
                                    <div class="case_tableau">{{user.nom}}</div>
                                    <div class="case_tableau">{{user.promo}}</div>
                                    <div class="case_tableau">{{user.depense}}</div>
                                    <div class="case_tableau">{{user.volume}}</div>
                                    <div class="case_tableau">{{user.alcool}}</div>
                                    <div class="case_tableau">{{user.perm}}</div>
                                </div>
                                <div class="bouton" ng-if="stats_globales.globale.limit==3" ng-click="stats_globales.globale.limit=10">Top 10</div>
                                <div class="bouton" ng-if="stats_globales.globale.limit==10" ng-click="stats_globales.globale.limit=3">Hide</div>
                            </div>
                        </div>
                    </div>
                    <div class="classement">
                        <div class="selector">
                            bite
                        </div>
                        <div class="centreur">
                            <div class="C_centre">
                                <div class="L_tableau" >
                                    <div class="head_tableau clickable" ng-click="compte.order('date')">Date</div>
                                    <div class="head_tableau clickable" ng-click="compte.order('perm.nom')">Perm</div>
                                    <?php
                                    if ($_GET["id"]==0) {
                                        echo "<div class=\"head_tableau clickable\" ng-click=\"compte.order('user.easy_search')\" style=\"width: 125%;\">Client</div>";
                                        echo "<div class=\"head_tableau clickable\" ng-click=\"compte.order('debiteur.easy_search')\" style=\"width: 125%;\">Débiteur</div>";
                                    }
                                    ?>

                                    <div class="head_tableau clickable" ng-click="compte.order('nb')" style="width: 50%;">Quantité</div>
                                    <div class="head_tableau clickable" ng-click="compte.order('achat.nom')">Produit</div>
                                    <div class="head_tableau clickable" ng-click="compte.order('prix')" style="width: 50%;">Prix</div>
                                    <?php
                                    if ($_GET["id"]==0 and $_SESSION["droit_cercle"]=="cercle") {
                                        echo "<div class=\"head_tableau\" style=\"width: 75%;\"></div>";
                                    }
                                    ?>
                                </div>
                                <div class="L_tableau" ng-class="color($index,operation)" ng-if="operation.nb>0" ng-repeat="operation in operations | filter : x | orderBy : compte.ordervalue">

                                    <div class="case_tableau">{{datestr(operation.date)}}</div>
                                    <div class="case_tableau">{{operation.perm.nom}}</div>
                                    <?php
                                    if ($_GET["id"]==0) {
                                        echo "<a href='compte.php?id={{operation.user.id}}' style=\"width: 125%;\"><div class=\"case_tableau\" >{{operation.user.prenom}} {{operation.user.nom}}</div></a>";
                                        echo "<a href='compte.php?id={{operation.user.id}}' style=\"width: 125%;\"><div class=\"case_tableau\" >{{operation.debiteur.prenom}} {{operation.debiteur.nom}}</div></a>";
                                    }
                                    ?>
                                    <div class="case_tableau" style="width: 50%;">{{operation.nb}}</div>
                                    <div class="case_tableau">{{operation.achat.nom}}</div>
                                    <div class="case_tableau" style="width: 50%;">{{prix(operation.prix)}}</div>
                                    <?php
                                    if ($_GET["id"]==0 and $_SESSION["droit_cercle"]=="cercle") {
                                        echo "<div class=\"case_tableau\" style=\"width: 75%;\"><div class='bouton' style='padding: 5px;' ng-click='annule(operation)'>Annuler</div></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" ng-class="stats_perso.class" ng-click="stats_perso.activate(); start_stats_perso()">
                    <div style="height: 20px; width: 20px;" ng-if="stats_perso.screen">
                        <img style="width :100%;" src="images/accordion_activate.png">
                    </div>
                    <div style="height: 20px; width: 20px;" ng-if="!stats_perso.screen">
                        <img style="width :100%;" src="images/accordion.png">
                    </div>
                    <div style="margin-left: 10px">Stats perso</div>
                </div>
                <div ng-if="stats_perso.screen" class="screen">

                </div>

                <div class="accordion" ng-class="forum.class" ng-click="forum.activate(); start_forum()">
                    <div style="height: 20px; width: 20px;" ng-if="forum.screen">
                        <img style="width :100%;" src="images/accordion_activate.png">
                    </div>
                    <div style="height: 20px; width: 20px;" ng-if="!forum.screen">
                        <img style="width :100%;" src="images/accordion.png">
                    </div>
                    <div style="margin-left: 10px">Cours de la bière de la dernière perm Forum</div>
                </div>
                <div ng-if="forum.screen" class="screen">
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
    	</div>
        <script src="js/angularjs.js" type="text/javascript"></script>
        <script src="js/d3.js" type="text/javascript"></script>
        <script src="js/nv.d3.js" type="text/javascript"></script>
        <script src="js/angular-nvd3.js" type="text/javascript"></script>
        <?php
        echo "<script src=\"js/stats_app.js?".time()."\" type=\"text/javascript\"></script>";
        ?>


    </body>
