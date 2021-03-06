<?php

include("start.php");

$widthmax= 300 ;
$heightmax= 400 ;

if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['sure_delete']) AND $_GET['sure_delete']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM actualite WHERE clef = ?');

    $req->execute(array($_GET['sure_delete']));

    $message='Actualité supprimée'; 

} 

if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['delete']) AND $_GET['delete']!=NULL )
    {
    $req = $bdd->prepare('SELECT titre FROM actualite WHERE clef = ?');

        $req->execute(array($_GET['delete']));
        while ($donnees = $req->fetch())
        { 
            $del=$donnees['titre'];
        }
    }

if (isset($_POST['titre'])AND($_POST['titre']!=NULL))
    {
        $image=0;
        $nom_image=NULL;
    if (!isset($_POST['contenu'])OR($_POST['contenu']==NULL))
    {
        $_POST['contenu']="";
    }
    if (isset($_FILES['monimage']) AND $_FILES['monimage']['error'] == 0)

    {
             // Testons si l'extension est autorisée

        $infosfichier = pathinfo($_FILES['monimage']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['monimage']['tmp_name'], 'image_actualite/' . basename($_FILES['monimage']['name']));
                $image=1;
                $nom_image=basename($_FILES['monimage']['name']);
                $filename = 'image_actualite/'.$nom_image;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'image_actualite/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'image_actualite/mini'.$nom_image );
                }
                

        }        

    }

    $req = $bdd->prepare('INSERT INTO actualite (titre, contenu, image, nom_image, date_actualite) VALUES (:titre, :contenu, :image, :nom_image, :date_actualite )');
    $req->execute(array(
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'image' => $image,
        'nom_image' => $nom_image,
        'date_actualite' => time()
        ));
    $message= "Actualité publiée !";
    $_POST['titre']=NULL;
    $_POST['contenu']=NULL;
}

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css' />";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        }?>
        <link rel="icon" type="image/png" href="images/touchicon.png" />
        <link rel="apple-touch-icon" href="images/appleicon.png" />

        <title>Mines'terstellar-Carnet de Bord</title>
         <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript">// Activate fancyBox
            $(".fancybox")
                .attr('rel', 'gallery')
                .fancybox({
                    padding : 0
                });


            // Launch fancyBox on first element
            $(".fancybox").eq(0).trigger('click');
             </script>
<?php 
        if ($_SESSION['mobile_device'])
        {
            echo "<link rel='stylesheet' href='style_mobile.css?".time()."'/>";
        }else{
            echo "<link rel='stylesheet' href='style_web.css' />";
        } ?>

    </head>
 

    <body>
    	
    	<?php 
        if($_SESSION['mobile_device'])
        {
            include("header_mobile.php");
        }else{
        include("header.php"); ?>

    	<section>
    	<?php } ?>
        <div class='corps'>
            <div class='accueil'>
            <?php
                if (isset($_GET['delete']) AND $_GET['delete']!=NULL )
                {
                    ?><article style="color: white;"><?php
                    
                        echo "Vous vous apprettez à supprimer : ".$del."<br>Continuer ?";
                        echo "<div style='display:flex;'>";
                            echo'<a href="home_actualite.php?sure_delete='.$_GET['delete'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_actualite.php">
                             <div class='bouton'>
                                Non
                             </div>
                            </a>
                        </div>  
                    </article>
                    <?php
                }

                 ?>

                <div class="error" >
                    <?php if (isset($message))
                        {
                            echo $message ;
                        } 
                    ?>  
                </div>
                <?php
                if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){
                ?>

                <div class="formulaire"> 
                   
                    <form action="home_actualite.php" method="post" enctype="multipart/form-data">
                        <?php if (isset($_POST['titre'])AND($_POST['titre']!=NULL))
                            {?> 

                            <label for="titre">Titre :</label> <input type="text" name="titre" id ="titre" value= "<?php echo htmlspecialchars($_POST['titre'], ENT_QUOTES); ?>" size="40" required> <br />
                            <label for="monimage">Ajouter une image (/!\ <2Mo) :</label><input type="file" name="monimage" /><br />
                            <label for="contenu">Contenu :</label> <textarea name="contenu" id ="contenu" placeholder="Dernières news" autofocus></textarea><br />
                        <?php }else{ ?>
                            <label for="titre">Titre :</label> <input type="text" name="titre" id ="titre" placeholder="Titre de l'actualité" size="40" autofocus  > <br />
                            <label for="monimage">Ajouter une image (optionel) :</label><input type="file" name="monimage" /><br />
                            <label for="contenu">Contenu :</label>  <textarea name="contenu" id ="contenu" placeholder="Dernières news"></textarea> <br />
                        <?php } ?>

                        

                        <div style="display: flex; justify-content: flex-end; align-items: center;">
                            <input type="submit" value="Publier" >
                        </div>
                    </form>
                </div>
                <?php } ?>
                

                <div class='image_bandeau'>
                    <img src="images/bandeau_actualite.jpg" alt="bandeau_actualite" />
                </div>
                <?php

                $rep = $bdd->query('SELECT * FROM actualite ORDER BY date_actualite DESC ');
                
                
                while ($donnees = $rep->fetch())
                {   if ($donnees['image']==1) {
                        echo '<a class="fancybox", style="width:100%" rel="gallery1" href="image_actualite/'.$donnees['nom_image'].'" title="'.$donnees['titre'].'">';
                    }
                        ?>
                    <article style="width: 95%; ">
                    <div style="display: flex; justify-content: flex-end; width: all; width: 100%;">
                    <div class="horrodateur", style="color: white;">
                        <?php 
                            echo "le ".date('d/m/Y à H:i',$donnees['date_actualite']);
                        ?>
                    </div>
                    </div>
                    <div>
                    <h2><?php echo $donnees['titre']."</h2>";
                    if ($donnees['image']==1) 
                    {
                        echo '<div style="display:flex; justify-content: center; "><div style="max-height: 600px; max-width: 100%;"><img src="image_actualite/mini'.$donnees['nom_image'].'" alt="image_actualite" /></div></div>';
                    }
                    echo "<div><p>".$donnees['contenu'].'</p></div>';

                    if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){?>
                       
                        <?php echo'<a href="home_actualite.php?delete='.$donnees['clef'].'">';?>
                         <div class='suppr'>
                            Supprimer 
                         </div>
                        </a>
                    <?php }
                    
                    ?>
                    </div>
                    </article>
                <?php
                if ($donnees['image']==1) 
                {
                        echo '</a>';
                    }

                }

                ?>
                

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