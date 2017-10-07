<?php

include("start.php"); 

$widthmax= 450 ;
$heightmax= 500 ;

if (isset($_GET['sure_delete']) AND $_GET['sure_delete']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM galerie WHERE clef = ?');

    $req->execute(array($_GET['sure_delete']));

    $message='Contenu supprimé'; 

} 

if (isset($_GET['delete']) AND $_GET['delete']!=NULL )
    {
    $req = $bdd->prepare('SELECT titre FROM galerie WHERE clef = ?');

        $req->execute(array($_GET['delete']));
        while ($donnees = $req->fetch())
        { 
            $del=$donnees['titre'];
        }

    if ($del=="")
    {
        $del='image N°'+$_GET['delete'];
    }
    }

if ((isset($_POST['contenu'])AND($_POST['contenu']!=NULL) ) OR (isset($_FILES['monimage'])AND $_FILES['monimage']['error'] == 0) )
    {
        $image=0;
        $nom_image=NULL;

    if (isset($_FILES['monimage']) AND $_FILES['monimage']['error'] == 0)

    {
             // Testons si l'extension est autorisée

        $infosfichier = pathinfo($_FILES['monimage']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['monimage']['tmp_name'], 'image_galerie/' . basename($_FILES['monimage']['name']));
                

                $image=1;
                $nom_image=basename($_FILES['monimage']['name']);
                $filename = 'image_galerie/'.$nom_image;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'image_galerie/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'image_galerie/mini'.$nom_image );
                }
                

        }        

    }
    if (!isset($_POST['titre']))
    {
        $_POST['titre']="";
    }

    if (!isset($_POST['contenu']))
    {
        $_POST['contenu']="";
    }

    $req = $bdd->prepare('INSERT INTO galerie (titre, contenu, image, nom_image) VALUES (:titre, :contenu, :image, :nom_image )');
    $req->execute(array(
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'image' => $image,
        'nom_image' => $nom_image,
        ));
    $message= "Contenu publié !";
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
        <link rel="apple-touch-icon" href="images/touchicon.png" />

        <title>Mines'terstellar-Galerie</title>

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
                if (isset($_GET['delete']) AND $_GET['delete']!=NULL )
                {
                    ?><article style="color: white;"><?php
                    
                        echo "Vous vous apprettez à supprimer : ".$del."<br>Continuer ?";
                        echo "<div style='display:flex; justify-content: space-around;'>";
                            echo'<a href="home_galerie.php?sure_delete='.$_GET['delete'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_galerie.php">
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
                   
                    <form action="home_galerie.php" method="post" enctype="multipart/form-data">
                        <?php if (isset($_POST['titre'])AND($_POST['titre']!=NULL))
                            {?> 

                            <label for="titre">Titre :</label> <input type="text" name="titre" id ="titre" value= "<?php echo htmlspecialchars($_POST['titre'], ENT_QUOTES); ?>" size="40" > <br />

                            <label for="monimage">Image: ( /!\ <2 Mo )</label><input type="file" name="monimage" /><br />

                            <label for="contenu">Vidéo ou commentaire :</label> <textarea name="contenu" id ="contenu" placeholder="Dernières news" autofocus></textarea><br />

                        <?php }else{ ?>

                            <label for="titre">Titre :</label> <input type="text" name="titre" id ="titre" placeholder="Titre de l'image ou de la vidéo" size="40" autofocus  > <br />

                            <label for="monimage">Image : ( /!\ <2 Mo )</label><input type="file" name="monimage" /><br />

                            <label for="contenu">Vidéo ou commentaire :</label>  <textarea name="contenu" id ="contenu" placeholder="insérer le code de la vidéo ou un commentaire"></textarea> <br />
                        <?php } ?>

                        

                        <div style="display: flex; justify-content: flex-end; align-items: center;">
                            <input type="submit" value="Publier" >
                        </div>
                    </form>
                </div>
                <?php } ?>

                <div class='image_bandeau'>
                    <img src="images/bandeau_galerie.jpg" alt="bandeau_galerie" />
                </div>

                

                

                <div class="galerie">
                
                
                
                <?php

                $rep = $bdd->query('SELECT * FROM galerie ORDER BY clef DESC ');
                
                
                while ($donnees = $rep->fetch())
                {    if (!$_SESSION['mobile_device'])
                    {
                        echo "<div style=\"width: 49%;\">";

                    }
                    if ($donnees['image']==1) {
                        echo '<a class="fancybox", style="width:100%; height:100%"  rel="gallery1" href="image_galerie/'.$donnees['nom_image'].'" title="'.$donnees['titre'].'">';
                    }?>
                    
                    
                    <article >                    
                    <h2><?php echo $donnees['titre']."</h2>";
                    if ($donnees['image']==1) {
                        echo '<div style="display:flex; justify-content: center;"><img src="image_galerie/mini'.$donnees['nom_image'].'" alt="image_galerie"/></div>';
                    }
                    echo "<div style=\"display:flex; justify-content: center;\"><p>".$donnees['contenu'].'</p></div>';

                    if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){?>
                       
                        <?php echo'<a href="home_galerie.php?delete='.$donnees['clef'].'">';?>
                         <div class='suppr'>
                            Supprimer 
                         </div>
                        </a>
                    <?php }
                    
                    ?>

                    </article>
                    
                    <?php
                    if ($donnees['image']==1) {
                        echo '</a>' ;
                    }
                    if (!$_SESSION['mobile_device'])
                    {
                        echo "</div>";
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