<?php

include("start.php"); 
// classement général

$filtre=30;
$bdd->exec('SET @rank := 0');
    $rep = $bdd->query('SELECT @rank := @rank + 1 AS Rank, clef, points FROM points ORDER BY points DESC');
    $compteurG=1;
    
    while ($donnees = $rep->fetch())
    {   
        $ClefG[$compteurG]=$donnees['clef'];
        $PointsG[$compteurG]=$donnees['points'];
        
        if (isset($_SESSION['clef']) AND $donnees['clef']==$_SESSION['clef'])
        {
            $rang_persoG=$donnees['Rank'];
            $points_persoG=$donnees['points'];
        }
        $compteurG++;
    }


    for ($i=1;$i<$compteurG;$i++)
    {
        $req = $bdd->prepare('SELECT Prenom, Nom FROM user_minesterstellar WHERE clef = ?');
        $req->execute(array($ClefG[$i]));
        
        while ($donnees = $req->fetch())
        {
            $PrenomG[$i]=$donnees['Prenom'];
            $NomG[$i]=$donnees['Nom'];
        }
    }

// classement jeu de piste
$bdd->exec('SET @rank := 0');
    $rep = $bdd->query('SELECT @rank := @rank + 1 AS Rank, clef, balises_trouvees FROM points ORDER BY balises_trouvees DESC');
    $compteurB=1;
    
    while ($donnees = $rep->fetch())
    {   
        $ClefB[$compteurB]=$donnees['clef'];
        $PointsB[$compteurB]=$donnees['balises_trouvees'];
        
        if (isset($_SESSION['clef']) AND $donnees['clef']==$_SESSION['clef'])
        {
            $rang_persoB=$donnees['Rank'];
            $points_persoB=$donnees['balises_trouvees'];
        }
        $compteurB++;
    }


    for ($i=1;$i<$compteurB;$i++)
    {
        $req = $bdd->prepare('SELECT Prenom, Nom FROM user_minesterstellar WHERE clef = ?');
        $req->execute(array($ClefB[$i]));
        
        while ($donnees = $req->fetch())
        {
            $PrenomB[$i]=$donnees['Prenom'];
            $NomB[$i]=$donnees['Nom'];
        }
    }

$rep = $bdd->query('SELECT clef, Nom, Prenom FROM user_minesterstellar ');
$i=1;
while ($donnees = $rep->fetch())
    {
        
        $Prenom[$donnees['clef']]=$donnees['Prenom'];
        $Nom[$donnees['clef']]=$donnees['Nom'];
        $Nb_user=$i;
        $i+=1;
    }

$rep = $bdd->query('SELECT clef, nom_du_jeu FROM jeux ORDER BY clef ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $nom_jeu[$i]=$donnees['nom_du_jeu'];
        $clef_jeu[$i]='J'.$donnees['clef'];
        $Nb_jeu=$i;
        $i+=1;
    }
$rep = $bdd->query('SELECT clef, points_jeu FROM points');
$i=1;
while ($donnees = $rep->fetch())
    {   if ($donnees['clef']>$filtre)
        {
            $points_jeu[$donnees['clef']]=explode(" ", $donnees['points_jeu']);
            $taille_points_jeu=$i;
            $i++;
        }
   }
/*echo "clef_jeu";
print_r($clef_jeu);
echo "Avant transformation";
print_r($points_jeu);*/

$points_par_jeux=NULL;
foreach ($points_jeu as $key => $value) 
{   
    foreach ($value as $key2 => $value2) 
    {
        if (in_array($value2, $clef_jeu))
        {   
            $points_par_jeux[$value2][$key]=$value[$key2+1];
        }
    }
    
}


if (isset($points_par_jeux))
{ /*echo"....transformation...";*/
    foreach ($points_par_jeux as $key => $value) 
    {
        arsort($value);
        $points_par_jeux[$key]=$value;
    }
    ksort($points_par_jeux);
}

/*
echo "Transformé";
print_r($points_par_jeux);*/

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        

        <title>Mines'terstellar-Résultats jeux</title>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/touchicon.png" />

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
            $( "#tabs" ).tabs();
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
                
                <div class='image_bandeau'>
                    <img src="images/bandeau_classement.jpg" alt="bandeau_classement" />
                </div>
                
                <div id="tabs">
                      <ul class="u1">
                        <li><a href="#tabs-0"><div class="titre_onglet">Général</div></a></li>
                        <?php if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $date_decryptage_jeu_de_piste<=time())
                        { ?>
                        <li><a href="#tabs-1"><div class="titre_onglet">Jeu de piste</div></a></li>
                        <?php
                        }
                        $jeux_sans_joueur=0;
                        for ($i=1;$i<=$Nb_jeu;$i++)
                        {
                            if (isset($points_par_jeux[$clef_jeu[$i]]))
                            {   $N=$i-$jeux_sans_joueur+1;
                                
                                echo '<li><a href="#tabs-'.$N.'"><div class="titre_onglet">'.$nom_jeu[$i].'</div></a></li>';
                            }else{
                                $jeux_sans_joueur++;
                            }                           
                        }
                        ?>
                      </ul>

                      <div id="tabs-0">
                            <div class="head_tableau">
                                <?php
                                if(isset($_SESSION['clef']))
                                {?>
                                    <a href="#ma_ligne">
                                     <div class='bouton'>
                                        Aller à mon rang
                                     </div>
                                    </a>
                               <?php }
                                ?>
                                <a href="home_grade.php">
                                     <div class='bouton'>
                                        Grades
                                     </div>
                                </a>
                             </div> 
                        <div style="display: flex; justify-content: center;">                                       
                            <table>
                            <tr style="background-color:  rgba(0,0,0,0.4);"">
                                <td><div class="titre_calendrier">Grade</div></td>
                                <td><div class="titre_calendrier">Rang</div></td>
                                <td><div class="titre_calendrier">Points</div></td>
                                <td><div class="titre_calendrier">Prénom</div></td>
                                <td><div class="titre_calendrier">Nom</div></td>
                            </tr>
                            <?php

                            if (time()<mktime(0,0,0,3,9,2017))
                            {
                                $malus_rang=150;
                            }elseif (time()>=mktime(0,0,0,3,9,2017) AND time()<mktime(0,0,0,3,12,2017))
                            {
                                $malus_rang=97;
                            }elseif (time()>=mktime(0,0,0,3,12,2017) AND time()<mktime(0,0,0,3,16,2017))
                            {
                                $malus_rang=47;
                            
                            }elseif (time()>=mktime(0,0,0,3,16,2017) AND time()<mktime(0,0,0,3,20,2017))
                            {   
                                $malus_rang=17;
                            }elseif (time()>=mktime(0,0,0,3,20,2017) AND time()<mktime(0,0,0,3,23,2017))
                            {
                                $malus_rang=1;
                            }else{
                                $malus_rang=0;
                            }

                            $user_suppr=0;
                            $temp_user_suppr=0;
                            $Nb_egaliteG=0;
                            for ($i=1;$i<$compteurG;$i++)
                            {   
                                if (isset($NomG[$i])AND $ClefG[$i]>$filtre)
                                {   
                                    if ($i!=1 AND $PointsG[$i]==$PointsG[$i-$temp_user_suppr-1])
                                    {
                                        $Nb_egaliteG++;
                                    }else{
                                        $Nb_egaliteG=0;

                                    }
                                    $rangG=$i-$user_suppr;
                                    $rangA=$rangG-$Nb_egaliteG;
                                    if (isset($_SESSION['clef']) AND $ClefG[$i]==$_SESSION['clef'])
                                    {
                                        echo "<tr id='ma_ligne'>";
                                    }else{
                                        echo "<tr>";
                                    }

                                    $rang = $rangG+$malus_rang;


                                    if ($rang==1)
                                    {
                                        $grade="Capitaine de Frégate";

                                    }elseif ($rang>1 AND $rang <=3) 
                                    {
                                        $grade="Capitaine de Corvette";
                                    }elseif ($rang>3 AND $rang <=10) 
                                    {
                                        $grade="Lieutenant";
                                    }elseif ($rang>10 AND $rang <=20) 
                                    {
                                        $grade="Major";
                                    }elseif ($rang>20 AND $rang <=50) 
                                    {
                                        $grade="Maître Principal";
                                    }elseif ($rang>50 AND $rang <=75) 
                                    {
                                        $grade="Premier Maître";
                                    }elseif ($rang>75 AND $rang <=100) 
                                    {
                                        $grade="Maître";
                                    }elseif ($rang>100 AND $rang <=125) 
                                    {
                                        $grade="Second Maître";
                                    }elseif ($rang>125 AND $rang <=150) 
                                    {
                                        $grade="Quartier Maître";
                                    }else
                                    {
                                        $grade="Matelot";
                                    }

                                    echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$grade."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$rangA."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$PointsG[$i]."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$PrenomG[$i]."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$NomG[$i]."</div></td></tr>";
                                    $temp_user_suppr=0;
                                }else{
                                    $user_suppr++;
                                    $temp_user_suppr++;
                                }
                            }
                            ?>
                            </table>
                        </div>
                              
                      </div>
                      <?php if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $date_decryptage_jeu_de_piste<=time())
                        { ?>
                      <div id="tabs-1">
                            <div class="head_tableau">
                                <?php
                                if(isset($_SESSION['clef']))
                                {?>
                                    <a href="#ma_ligneB">
                                     <div class='bouton'>
                                        Aller à mon rang
                                     </div>
                                    </a>
                               <?php }
                                ?>
                             </div> 
                        <div style="display: flex; justify-content: center;">                                       
                            <table>
                            <tr style="background-color:  rgba(0,0,0,0.4);">
                                
                                <td><div class="titre_calendrier">Rang</div></td>
                                <td><div class="titre_calendrier">Balises trouvées</div></td>
                                <td><div class="titre_calendrier">Prénom</div></td>
                                <td><div class="titre_calendrier">Nom</div></td>
                            </tr>
                            <?php
                            $temp_user_suppr=0;
                            $user_suppr=0;
                            $Nb_egaliteB=0;
                            for ($i=1;$i<$compteurB;$i++)
                            {   
                                if (isset($NomB[$i])AND $ClefB[$i]>$filtre)
                                {   
                                    if ($i!=1 AND $PointsB[$i]==$PointsB[$i-$temp_user_suppr-1])
                                    {
                                        $Nb_egaliteB++;
                                    }else{
                                        $Nb_egaliteB=0;
                                    }
                                    $rangB=$i-$user_suppr;
                                    $rangAB=$rangB-$Nb_egaliteB;
                                    if (isset($_SESSION['clef']) AND $ClefB[$i]==$_SESSION['clef'])
                                    {
                                        echo "<tr id='ma_ligneB'>";
                                    }else{
                                        echo "<tr>";
                                    }

                                    

                                    
                                    echo "<td><div class='texte_calendrier'";if ($rangB%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$rangAB."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangB%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$PointsB[$i]."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangB%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$PrenomB[$i]."</div></td>";
                                    echo "<td><div class='texte_calendrier'";if ($rangB%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$NomB[$i]."</div></td></tr>";
                                    $temp_user_suppr=0;
                                }else{
                                    $user_suppr++;
                                    $temp_user_suppr++;
                                }
                            }
                            ?>
                            </table>
                        </div>
                              
                      </div>

                      <?php
                      }
                       
                      $i=1;

                      if (isset($points_par_jeux))
                      { 
                      foreach ($points_par_jeux as $game_key => $value)                       
                        {   
                            
                            echo '<div id="tabs-'.($i+1).'">';
                            ?>
                            <div class="head_tableau">
                                <?php
                                if(isset($_SESSION['clef']) AND array_key_exists($_SESSION['clef'], $value) )
                                {
                                    echo '<a href="#ma_ligne'.$i.'">'
                                    ?>
                                     <div class='bouton'>
                                        Aller à mon rang
                                     </div>
                                    </a>
                               <?php }
                                ?>
                            </div> 

                            <div style="display: flex; justify-content: center;">                                       
                                <table>
                                <tr style="background-color:  rgba(0,0,0,0.4);">
                                    <td><div class="titre_calendrier">Rang</div></td>
                                    <td><div class="titre_calendrier">Points</div></td>
                                    <td><div class="titre_calendrier">Prénom</div></td>
                                    <td><div class="titre_calendrier">Nom</div></td>
                                </tr>
                                <?php
                                $user_suppr=0;
                                $j=1;
                                $Nb_egalite=0;
                                foreach ($value as $key => $value)                               
                                {   
                                    if (isset($Nom[$key]))
                                    {   
                                        if (isset($value_prec) AND $value==$value_prec)
                                        {
                                            $Nb_egalite++;
                                        }else{
                                            $Nb_egalite=0;
                                        }

                                        $rangG=$j-$user_suppr;
                                        $rangA=$rangG-$Nb_egalite;
                                        if (isset($_SESSION['clef']) AND $key==$_SESSION['clef'])
                                        {
                                            echo "<tr id='ma_ligne".$i."'>";
                                        }else{
                                            echo "<tr>";
                                        }
                                        echo "<tr>";

                                        echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$rangA."</div></td>";
                                        echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$value."</div></td>";
                                        echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$Prenom[$key]."</div></td>";
                                        echo "<td><div class='texte_calendrier'";if ($rangG%2==0){echo " style='background-color: rgba(0,0,0,0.2);'";}echo ">".$Nom[$key]."</div></td></tr>";
                                        $value_prec=$value;
                                    }else{
                                        $user_suppr++;
                                    }
                                    $j++;
                                }
                                ?>
                                </table>
                            </div>


                            <?php
                            echo '</div>';
                            $i++;                           
                        }
                    }
                        ?>
                      
                    </div>

            </div>

            <?php include("contenu/logo.php"); ?>
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