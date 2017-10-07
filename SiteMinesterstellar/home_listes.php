<?php
include("start.php");
// initialisation de la table jeux

/*$req = $bdd->exec('UPDATE points SET jeu_de_piste = "000001 C" ');*/


if (!isset($_SESSION['droits']) OR ($_SESSION['droits']!='ADMIN' AND $_SESSION['droits']!='MOD'))
{
    header('Location: index.php');
}

$acc=0;

if (isset($_GET["goto"]) AND $_GET["goto"]=="jeux")
{
    $acc=1;
}
if (isset($_GET["goto"]) AND $_GET["goto"]=="balises")
{
    $acc=2;
}
if (isset($_GET["goto"]) AND $_GET["goto"]=="allo")
{
    $acc=3;
}


$rep = $bdd->query('SELECT * FROM user ');
while ($donnees = $rep->fetch())
    {
        $user[]=$donnees;
    }

$rep = $bdd->query('SELECT * FROM jeux ');
while ($donnees = $rep->fetch())
    {
        $jeux[]=$donnees;
    }

$rep = $bdd->query('SELECT * FROM balises ');
while ($donnees = $rep->fetch())
    {
        $balises[]=$donnees;
    }
$rep = $bdd->query('SELECT * FROM stats ');
while ($donnees = $rep->fetch())
    {
        $stats[]=$donnees;
    }

$rep = $bdd->query('SELECT * FROM allo ');
while ($donnees = $rep->fetch())
    {
        $allos[]=$donnees;
    }

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/touchicon.png" />

        <title>Mines'terstellar-Gestion des points</title>
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        
        <?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css' />";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        }?>
          
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $( function() {
            $( "#tabs" ).tabs({
                <?php echo "active: ".$acc ; ?>
            });
          } );  
        </script>
               

    </head>
 

    <body>
    
    	
    	<?php 

        if($_SESSION['mobile_device'])
        {
            include("header_mobile.php");
        }else{
        include("header.php"); 

    	echo "<section>";
        }
    	?> 
        <div class='corps'>
            <div class='accueil'>
                    <div id="tabs">
                            <ul>
                                <li><a href="#tabs-0"><div class="titre_onglet">User</div></a></li>
                                <li><a href="#tabs-1"><div class="titre_onglet">Jeux</div></a></li>
                                <li><a href="#tabs-2"><div class="titre_onglet">Balises</div></a></li>
                                <li><a href="#tabs-3"><div class="titre_onglet">Allos</div></a></li>
                                <li><a href="#tabs-4"><div class="titre_onglet">Stats</div></a></li>
                            </ul> 

                            <div id="tabs-0">
                                 <table>
                                    <tr style="background-color:  rgba(0,0,0,0.4);"">
                                        <td><div class="titre_calendrier">Clef</div></td>
                                        <td><div class="titre_calendrier">Prénom</div></td>
                                        <td><div class="titre_calendrier">Nom</div></td>
                                        <td><div class="titre_calendrier">Droits</div></td>
                                    </tr>
                                    <?php foreach ($user as $key => $value) 
                                    {
                                        echo "<tr><td><div class='texte_calendrier'>".$value['clef']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['Prenom']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['Nom']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['Droits']."</div></td></tr>";
                                    } ?>
                                </table>
                            </div>

                            <div id="tabs-1">
                                <table>
                                    <tr style="background-color:  rgba(0,0,0,0.4);"">
                                        <td><div class="titre_calendrier">Clef</div></td>
                                        <td><div class="titre_calendrier">Nom du jeu</div></td>
                                    </tr>
                                    <?php foreach ($jeux as $key => $value) 
                                    {
                                        echo "<tr><td><div class='texte_calendrier'>".$value['clef']."</div></td>";                              
                                        echo "<td><div class='texte_calendrier'>".$value['nom_du_jeu']."</div></td></tr>";
                                    } ?>
                                </table>
                            </div>

                            <div id="tabs-2">
                                <table>
                                    <tr style="background-color:  rgba(0,0,0,0.4);"">
                                        <td><div class="titre_calendrier">Clef</div></td>
                                        <td><div class="titre_calendrier">Nom</div></td>
                                        <td><div class="titre_calendrier">Code</div></td>                                    
                                    </tr>
                                    <?php foreach ($balises as $key => $value) 
                                    {
                                        echo "<tr><td><div class='texte_calendrier'>".$value['clef']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['nom']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['code']."</div></td></tr>";
                                    } ?>
                                </table>
                            </div>

                            <div id="tabs-3">
                                <table>
                                    <tr style="background-color:  rgba(0,0,0,0.4);"">
                                        <td><div class="titre_calendrier">Clef</div></td>
                                        <td><div class="titre_calendrier">Nom</div></td>
                                        <td><div class="titre_calendrier">Tel</div></td>
                                        <td><div class="titre_calendrier">Statut</div></td>                                     
                                    </tr>
                                    <?php foreach ($allos as $key => $value) 
                                    {
                                        echo "<tr><td><div class='texte_calendrier'>".$value['clef']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['nom']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['tel']."</div></td>";
                                        if ($value['statut']==0)
                                        {
                                            echo "<td><div class='texte_calendrier'>Caché</div></td></tr>";
                                        }elseif($value['statut']==1)
                                        {
                                            echo "<td><div class='texte_calendrier'>Coming soon</div></td></tr>";
                                        }else
                                        {
                                            echo "<td><div class='texte_calendrier'>Actif</div></td></tr>";
                                        }
                                    } ?>
                                </table>
                            </div>

                            <div id="tabs-4">
                                 <table>
                                    <tr style="background-color:  rgba(0,0,0,0.4);"">
                                        <td><div class="titre_calendrier">Device</div></td>
                                        <td><div class="titre_calendrier">Views</div></td>
                                        <td><div class="titre_calendrier">Connexions</div></td>
                                        <td><div class="titre_calendrier">Admin's connexions</div></td>
                                    </tr>
                                    <?php foreach ($stats as $key => $value) 
                                    {
                                        echo "<tr><td><div class='texte_calendrier'>".$value['device']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['no_connect']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['user']."</div></td>";
                                        echo "<td><div class='texte_calendrier'>".$value['admin']."</div></td></tr>";
                                    } ?>
                                </table>
                            </div>
                        </div>  
                    </div>              
                </div>         
            </div>           
        </div>

        <?php

        if(!$_SESSION['mobile_device'])
        {
            include("nav.php");

            echo "</section>";
        }
        

    	include("footer.php");

		?>
    </body>
</html>