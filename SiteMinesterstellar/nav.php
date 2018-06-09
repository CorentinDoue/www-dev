<?php
if (isset($_SESSION['clef']))
{
    
    $bdd->exec('SET @num :=0, @rank := 0, @prev :=NULL');
    $rep = $bdd->query('SELECT @num := @num +1 AS row, @rank := if(@prev != points, @num, @rank) AS Rank, clef, @prev := points AS points FROM points ORDER BY points DESC');
    $compteur=1;
    
    while ($donnees = $rep->fetch())
    {   if ($compteur<=10)
        {
        $ClefTop10[$compteur]=$donnees['clef'];
        $PointsTop10[$compteur]=$donnees['points'];
        }
        if ($donnees['clef']==$_SESSION['clef'])
        {
            $rang=$donnees['Rank'];
            $points=$donnees['points'];
        }
        $compteur++;
    }


    for ($i=1;$i<=10;$i++)
    {
        $req = $bdd->prepare('SELECT Prenom, Nom FROM user_minesterstellar WHERE clef = ?');
        $req->execute(array($ClefTop10[$i]));
        
        while ($donnees = $req->fetch())
        {
            $PrenomTop10[$i]=$donnees['Prenom'];
            $NomTop10[$i]=$donnees['Nom'];
        }
    }
}






?>
<div class='bord_droit'> 
	<nav>
		<?php 
		if (isset($_SESSION['droits']) AND $_SESSION['droits']=='ADMIN')
		{ ?>

			<a href="index.php?droits=MOD">
			<div class='block_nav'>
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
			<div class='block_nav'>
				<div class="titre_bouton">
				Mode User
				</div>
			</div>
			</a>

		<?php 
		}

		if (isset($_SESSION['clef']) AND $_SESSION['droits']!='MOD')
		{?>
			<a href="home_classement.php">
			<div class='block_nav' style="display: flex;">
				<div>
				<h2>
				<?php echo "Bonjour ".$_SESSION['prenom']; ?>
				</h2>
				<p style="font-size: 0.85em;">
				<?php if ($rang==1)
				{
					echo "Félicitations !<br>Vous êtes 1er au classement général avec ".$points." points<br><br>";
				}elseif($points==0){
					echo "Bienvenue, vous n'avez pas encore de point<br><br>";
				}else{
					echo "Vous êtes ".$rang."ème au classement général avec ".$points." points<br><br>";
				}
				
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
				
				
				$rang+=$malus_rang;
				 

				if ($rang==1)
				{
					$grade= "capitaine de frégate";
				}elseif ($rang>1 AND $rang <=3) 
				{
					$grade= "capitaine de corvette";
				}elseif ($rang>3 AND $rang <=10) 
				{
					$grade= "lieutenant";
				}elseif ($rang>10 AND $rang <=20) 
				{
					$grade= "major";
				}elseif ($rang>20 AND $rang <=50) 
				{
					$grade= "maître principal";
				}elseif ($rang>50 AND $rang <=75) 
				{
					$grade= "premier maître";
				}elseif ($rang>75 AND $rang <=100) 
				{
					$grade= "maître";
				}elseif ($rang>100 AND $rang <=125) 
				{
					$grade= "second maître";
				}elseif ($rang>125 AND $rang <150) 
				{
					$grade= "quartier maître";
				}else
				{					
					$grade= "matelot";
				}
				echo "Votre grade actuel est ".$grade;
				?>
				</p>
				</div>
				<div>
				<?php if ($rang==1)
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_capitaine de frégate.png" alt="image_galerie"/></a>';
				}elseif ($rang>1 AND $rang <=3) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_capitaine de corvette.png" alt="image_galerie"/></a>';
				}elseif ($rang>3 AND $rang <=10) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_lieutenant.png" alt="image_galerie"/></a>';
				}elseif ($rang>10 AND $rang <=20) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_major.png" alt="image_galerie"/></a>';
				}elseif ($rang>20 AND $rang <=50) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_maitre principal.png" alt="image_galerie"/></a>';
				}elseif ($rang>50 AND $rang <=75) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_premier maitre.png" alt="image_galerie"/></a>';
				}elseif ($rang>75 AND $rang <=100) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_maitre.png" alt="image_galerie"/></a>';
				}elseif ($rang>100 AND $rang <=125) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_second maitre.png" alt="image_galerie"/></a>';
				}elseif ($rang>125 AND $rang <150) 
				{
					echo '<a href="home_grade.php"><img src="grade/moyen_quartier maitre.png" alt="image_galerie"/></a>';
					
				}else
				{					
					echo '<a href="home_grade.php"><img src="grade/moyen_matelot.png" alt="image_galerie"/></a>';
				} ?>  
				</div>
			</div>
			</a>
		<?php } ?>

		<a href="home_classement.php">
		<div class='block_nav'>
			<div class="titre_bouton">
			Résultats jeux
			</div>
		</div>
		</a>

		<a href="home_jeux_s1.php">
		<div class='block_nav'>
			<div class="titre_bouton">
			Entrainement spatial
			</div>
		</div>
		</a>

		<?php 
		if ((isset($_SESSION['droits']) AND $_SESSION['droits']=="MOD") OR $date_decryptage_jeu_de_piste<=time())
			{	?>
		
			<a href="home_jdp.php">
			<div class='block_nav'>
				<div class="titre_bouton">
				Jeu de piste
				</div>
			</div>
			</a>

			<?php }else{ ?>

				<a href="home_jdp.php">
				<div class='block_nav'>
					<div class="titre_bouton">
					Classified project 
					</div>
				</div>
				</a>

			<?php } ?>
 
		<a href="home_allo.php">
		<div class='block_nav'>
			<div class="titre_bouton">
			Allo
			</div>
		</div>
		</a>
	</nav>
	
	<!-- <div class="affiche_nav">
	<?php	
	//include('contenu/affiche_micro.php');
	?>
	</div> -->
</div>