<?php
include("start.php");
// initialisation de la table jeux

/*$req = $bdd->exec('UPDATE points SET jeu_de_piste = "000001 C" ');*/


if (!isset($_SESSION['droits']) OR ($_SESSION['droits']!='ADMIN' AND $_SESSION['droits']!='MOD'))
{
    header('Location: index.php');
}

$acc=0;



function isRealDate($date) 
{ 
    if (false === strtotime($date)) 
    { 
        return false;
    } 
    else
    { 
        list($day, $month, $year) = explode('-', $date); 
        if (false === checkdate($month, $day, $year)) 
        { 
            return false;
        } 
    } 
    return true;
}




if (isset($_POST['set_date_jeu_de_piste']) AND $_POST['set_date_jeu_de_piste']!=NULL)
{
    if(isRealDate($_POST['set_date_jeu_de_piste']))
    {
        $req = $bdd->prepare('UPDATE dates SET date_decryptage=:date_decryptage WHERE clef=1');
        $req->execute(array(
            'date_decryptage' => strtotime($_POST['set_date_jeu_de_piste'])
            ));
        $date_decryptage_jeu_de_piste=strtotime($_POST['set_date_jeu_de_piste']);
        $message="date mise à jour";
    }else{
        $message="Date non comforme, utilisez le format jj-mm-aaaa !";
    }


}
// taille logo allo
$widthmax= 200 ;
$heightmax= 200 ;

if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['sure_deletea']) AND $_GET['sure_deletea']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM allo WHERE clef = ?');
    $id_allo=explode(" ", $_GET['sure_deletea']);
    $req->execute(array($id_allo[0]));

    $message='Allo supprimé'; 
    $acc=4;
}

if (isset($_POST['new_allo']) AND $_POST['new_allo']!=NULL AND isset($_FILES['image_new_allo']) AND $_FILES['image_new_allo']['error'] == 0)
{   
    
    $infosfichier = pathinfo($_FILES['image_new_allo']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_new_allo']['tmp_name'], 'logo_allo/' . basename($_FILES['image_new_allo']['name']));
                $nom_image=basename($_FILES['image_new_allo']['name']);
                $filename = 'logo_allo/'.$nom_image;
                /*if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'logo_allo/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'logo_allo/mini'.$nom_image );
                }*/
        }
    


    $req = $bdd->prepare('INSERT INTO allo(nom, description, nom_logo, tel, statut) VALUES (:nom, :description, :nom_logo, :tel, :statut)');
    $req->execute(array(
        'nom' => $_POST['new_allo'],
        'description' => $_POST['description_new_allo'],
        'nom_logo' =>$nom_image,
        'tel' => $_POST['new_tel_allo'],
        'statut' => $_POST['new_statut_allo']
        ));
    $message='Nouvel allo ajouté';


$acc=4;
}

if (isset($_POST['old_allo']) AND $_POST['old_allo']!=NULL AND (!isset($_POST['set_allo']) OR $_POST['set_allo']==NULL))
{   

    $id_allo=explode(" ", $_POST['old_allo']);
    $req = $bdd->prepare('SELECT * FROM allo WHERE clef=?');
    $req->execute(array($id_allo[0]));
    while ($donnees = $req->fetch())
    {
        $old_allo[0]=$donnees['nom'];
        $old_allo[1]=$donnees['description'];
        $old_allo[2]=$donnees['nom_logo'];
        $old_allo[3]=$donnees['tel'];
        $old_allo[4]=$donnees['statut'];
        $acc=4;    
    }
}

if (isset($_POST['old_allo']) AND $_POST['old_allo']!=NULL AND isset($_POST['set_allo']) AND $_POST['set_allo']!=NULL )
{   
    
    $id_allo=explode(" ", $_POST['old_allo']);

    $req = $bdd->prepare('UPDATE allo SET nom=:nom, description=:description, tel=:tel, statut=:statut WHERE clef=:clef');
    $req->execute(array(
        'nom' => $_POST['set_allo'],
        'description' => $_POST['description_set_allo'],
        'tel' => $_POST['set_tel_allo'],
        'clef' => $id_allo[0],
        'statut' => $_POST['set_statut_allo']
        ));

    if(isset($_FILES['image_set_allo']) AND $_FILES['image_set_allo']['error'] == 0)
    {   
        $infosfichier = pathinfo($_FILES['image_set_allo']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_set_allo']['tmp_name'], 'logo_allo/' . basename($_FILES['image_set_allo']['name']));
                $image=1;
                $nom_image=basename($_FILES['image_set_allo']['name']);
                $filename = 'logo_allo/'.$nom_image;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'logo_allo/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'logo_allo/mini'.$nom_image );
                }
        }
        $req = $bdd->prepare('UPDATE allo SET nom_logo=:nom_logo WHERE clef=:clef');
    $req->execute(array(
        'nom_logo' =>$nom_image,
        'clef' => $id_allo[0]
        ));
    }    

    $message='Allo mis à jour';

$acc=4;
}


//taille affiche event
$widthmax= 300 ;
$heightmax= 400 ;

if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['sure_deletee']) AND $_GET['sure_deletee']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM event WHERE clef = ?');
    $id_event=explode(" ", $_GET['sure_deletee']);
    $req->execute(array($id_event[0]));

    $message='Événement supprimé'; 
    $acc=3;
}

if (isset($_POST['new_event']) AND $_POST['new_event']!=NULL AND  isset($_POST['description_new_event']) AND $_POST['description_new_event']!=NULL AND isset($_POST['date_new_event']) AND $_POST['date_new_event']!=NULL AND isset($_POST['date_decrytage_new_event']) AND $_POST['date_decrytage_new_event']!=NULL AND isset($_POST['date_decrytage_new_event']) AND $_POST['date_decrytage_new_event']!=NULL AND isset($_FILES['image_new_event']) AND $_FILES['image_new_event']['error'] == 0 AND isset($_FILES['image_cryptee_new_event']) AND $_FILES['image_cryptee_new_event']['error'] == 0)
{   
    if(isRealDate($_POST['date_decrytage_new_event']) AND isRealDate($_POST['date_new_event']))
    {
    $infosfichier = pathinfo($_FILES['image_new_event']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_new_event']['tmp_name'], 'affiches/' . basename($_FILES['image_new_event']['name']));
                $image=1;
                $nom_image=basename($_FILES['image_new_event']['name']);
                $filename = 'affiches/'.$nom_image;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'affiches/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'affiches/mini'.$nom_image );
                }
        }
    $infosfichier = pathinfo($_FILES['image_cryptee_new_event']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_cryptee_new_event']['tmp_name'], 'affiches/' . basename($_FILES['image_cryptee_new_event']['name']));
                $image=1;
                $nom_image_cryptee=basename($_FILES['image_cryptee_new_event']['name']);
                $filename = 'affiches/'.$nom_image_cryptee;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'affiches/mini'.$nom_image_cryptee );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'affiches/mini'.$nom_image_cryptee );
                }
        }


    $req = $bdd->prepare('INSERT INTO event(titre, titre_cryptee, contenu, nom_image_cryptee, nom_image, date_event, date_decryptage) VALUES (:titre, :titre_cryptee, :contenu, :nom_image_cryptee, :nom_image, :date_event, :date_decryptage)');
    $req->execute(array(
        'titre' => $_POST['new_event'],
        'titre_cryptee' => $_POST['new_event_cryptee'],
        'contenu' => $_POST['description_new_event'],
        'nom_image_cryptee' => $nom_image_cryptee,
        'nom_image' =>$nom_image,
        'date_event' => strtotime($_POST['date_new_event']),
        'date_decryptage' => strtotime($_POST['date_decrytage_new_event'])
        ));
    $message='Nouvel événement ajouté';


}else{
    $message="Date non comforme, utilisez le format jj-mm-aaaa !";
}
$acc=3;
}

if (isset($_POST['old_event']) AND $_POST['old_event']!=NULL AND (!isset($_POST['set_event']) OR $_POST['set_event']==NULL))
{   

    $id_event=explode(" ", $_POST['old_event']);
    $req = $bdd->prepare('SELECT * FROM event WHERE clef=?');
    $req->execute(array($id_event[0]));
    while ($donnees = $req->fetch())
    {
        $old_event[0]=$donnees['titre'];
        $old_event[6]=$donnees['titre_cryptee'];
        $old_event[1]=$donnees['contenu'];
        $old_event[2]=$donnees['date_event'];
        $old_event[3]=$donnees['date_decryptage'];
        $old_event[4]=$donnees['nom_image'];
        $old_event[5]=$donnees['nom_image_cryptee'];
        $acc=3;    
    }
}

if (isset($_POST['old_event']) AND $_POST['old_event']!=NULL AND isset($_POST['set_event']) AND $_POST['set_event']!=NULL AND  isset($_POST['description_set_event']) AND $_POST['description_set_event']!=NULL AND isset($_POST['date_set_event']) AND $_POST['date_set_event']!=NULL AND isset($_POST['date_decrytage_set_event']) AND $_POST['date_decrytage_set_event']!=NULL AND isset($_POST['date_decrytage_set_event']) AND $_POST['date_decrytage_set_event']!=NULL)
{   
    if(isRealDate($_POST['date_decrytage_set_event']) AND isRealDate($_POST['date_set_event']))
    {
    $id_event=explode(" ", $_POST['old_event']);

    $req = $bdd->prepare('UPDATE event SET titre=:titre, titre_cryptee=:titre_cryptee, contenu=:contenu, date_event=:date_event, date_decryptage=:date_decryptage WHERE clef=:clef');
    $req->execute(array(
        'titre' => $_POST['set_event'],
        'contenu' => $_POST['description_set_event'],
        'titre_cryptee' => $_POST['set_event_cryptee'],
        'date_event' => strtotime($_POST['date_set_event']),
        'date_decryptage' => strtotime($_POST['date_decrytage_set_event']),
        'clef' => $id_event[0]
        ));

    if(isset($_FILES['image_set_event']) AND $_FILES['image_set_event']['error'] == 0)
    {   
        $infosfichier = pathinfo($_FILES['image_set_event']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_set_event']['tmp_name'], 'affiches/' . basename($_FILES['image_set_event']['name']));
                $image=1;
                $nom_image=basename($_FILES['image_set_event']['name']);
                $filename = 'affiches/'.$nom_image;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'affiches/mini'.$nom_image );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'affiches/mini'.$nom_image );
                }
        }
        $req = $bdd->prepare('UPDATE event SET nom_image=:nom_image WHERE clef=:clef');
    $req->execute(array(
        'nom_image' =>$nom_image,
        'clef' => $id_event[0]
        ));
    }

    if(isset($_FILES['image_cryptee_set_event']) AND $_FILES['image_cryptee_set_event']['error'] == 0)
    {   
        $infosfichier = pathinfo($_FILES['image_cryptee_set_event']['name']);

        $extension_upload = $infosfichier['extension'];

        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension_upload, $extensions_autorisees))

        {

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($_FILES['image_cryptee_set_event']['tmp_name'], 'affiches/' . basename($_FILES['image_cryptee_set_event']['name']));
                $image=1;
                $nom_image_cryptee=basename($_FILES['image_cryptee_set_event']['name']);
                $filename = 'affiches/'.$nom_image_cryptee;
                if ($extension_upload=='png')
                {
                    include("miniature_png.php");
                    imagepng($image_p, 'affiches/mini'.$nom_image_cryptee );
                }else{
                    include("miniature_jpg.php");
                    imagejpeg($image_p, 'affiches/mini'.$nom_image_cryptee );
                }
        }
        $req = $bdd->prepare('UPDATE event SET nom_image_cryptee=:nom_image_cryptee WHERE clef=:clef');
    $req->execute(array(
        'nom_image_cryptee' =>$nom_image_cryptee,
        'clef' => $id_event[0]
        ));
    }

    $message='Événement mis à jour';
}else{
    $message="Date non comforme, utilisez le format jj-mm-aaaa !";
}
$acc=3;
}


if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['sure_deleteb']) AND $_GET['sure_deleteb']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM balises WHERE clef = ?');
    $id_jeu=explode(" ", $_GET['sure_deleteb']);
    $req->execute(array($id_jeu[0]));

    $message='Balise supprimée'; 
    $acc=2;
}

if (isset($_POST['new_balise']) AND $_POST['new_balise']!=NULL AND isset($_POST['code_new_balise']) AND $_POST['code_new_balise']!=NULL AND isset($_POST['description_new_balise']) AND $_POST['description_new_balise']!=NULL AND isset($_POST['indice_new_balise']) AND $_POST['indice_new_balise']!=NULL)
{
    $req = $bdd->prepare('INSERT INTO balises(code, nom, description, indice) VALUES (:code, :nom, :description, :indice)');
    $req->execute(array(
        'code' => $_POST['code_new_balise'],
        'nom' => $_POST['new_balise'],
        'description' => $_POST['description_new_balise'],
        'indice' => $_POST['indice_new_balise'],
        ));
    $message='Nouvelle balise ajoutée';
    $acc=2;
}

if (isset($_POST['old_balise']) AND $_POST['old_balise']!=NULL AND (!isset($_POST['set_balise']) OR $_POST['set_balise']==NULL))
{   
    $id_balise=explode(" ", $_POST['old_balise']);
    $req = $bdd->prepare('SELECT * FROM balises WHERE clef=?');
    $req->execute(array($id_balise[0]));
    while ($donnees = $req->fetch())
    {
        $old_balise[0]=$donnees['nom'];
        $old_balise[1]=$donnees['code'];
        $old_balise[2]=$donnees['description'];
        $old_balise[3]=$donnees['indice'];
        $acc=2;    
    }
}

if (isset($_POST['old_balise']) AND $_POST['old_balise']!=NULL AND isset($_POST['set_balise']) AND $_POST['set_balise']!=NULL AND isset($_POST['code_set_balise']) AND $_POST['code_set_balise']!=NULL AND isset($_POST['description_set_balise']) AND $_POST['description_set_balise']!=NULL AND isset($_POST['indice_set_balise']) AND $_POST['indice_set_balise']!=NULL)
{
    $id_balise=explode(" ", $_POST['old_balise']);
    $req = $bdd->prepare('UPDATE balises SET code=:code, nom=:nom, description=:description, indice=:indice WHERE clef=:clef');
    $req->execute(array(
        'code' => $_POST['code_set_balise'],
        'nom' => $_POST['set_balise'],
        'description' => $_POST['description_set_balise'],
        'indice' => $_POST['indice_set_balise'],
        'clef' => $id_balise[0]
        ));
    $message='Balise mise à jour';
    $acc=2;
}


if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD' AND isset($_GET['sure_delete']) AND $_GET['sure_delete']!=NULL )
{
    $req = $bdd->prepare('DELETE FROM jeux WHERE clef = ?');
    $id_jeu=explode(" ", $_GET['sure_delete']);
    $req->execute(array($id_jeu[0]));

    $message='Jeu supprimé';
    $acc=1;

}

if (isset($_POST['new_jeu']) AND $_POST['new_jeu']!=NULL)
{
    $req = $bdd->prepare('INSERT INTO jeux (nom_du_jeu) VALUES (?)');
    $req->execute(array($_POST['new_jeu']));
    $message='nouveau jeu ajouté';
    $acc=1;
}

if (isset($_POST['old_jeu']) AND $_POST['old_jeu']!=NULL AND isset($_POST['set_jeu']) AND $_POST['set_jeu']!=NULL)
{
    $id_jeu=explode(" ", $_POST['old_jeu']);
    $req = $bdd->prepare('UPDATE jeux SET nom_du_jeu = :nouveau_nom WHERE clef=:clef');
    $req->execute(array(
                'nouveau_nom' => $_POST['set_jeu'],
                'clef' => $id_jeu[0]
                ));
    $message='Nom du jeu mis à jour';
    $acc=1;
}


$rep = $bdd->query('SELECT clef, Nom, Prenom FROM user_minesterstellar ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $clef[$i]=$donnees['clef'];
        $Prenom[$i]=$donnees['Prenom'];
        $Nom[$i]=$donnees['Nom'];
        $Nb_user=$i;
        $i+=1;
    }

$rep = $bdd->query('SELECT clef, nom_du_jeu FROM jeux ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $nom_jeu[$i]=$donnees['nom_du_jeu'];
        $clef_jeu[$i]=$donnees['clef'];
        $Nb_jeu=$i;
        $i+=1;
    }

$rep = $bdd->query('SELECT clef, nom FROM balises ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $clef_balise[$i]=$donnees['clef'];
        $nom_balise[$i]=$donnees['nom'];
        $Nb_balise=$i;
        $i+=1;
    }

$rep = $bdd->query('SELECT clef, titre FROM event ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $clef_event[$i]=$donnees['clef'];
        $nom_event[$i]=$donnees['titre'];
        $Nb_event=$i;
        $i+=1;
    }

$rep = $bdd->query('SELECT clef, nom FROM allo ');
$i=1;
while ($donnees = $rep->fetch())
    {
        $clef_allo[$i]=$donnees['clef'];
        $nom_allo[$i]=$donnees['nom'];
        $Nb_allo=$i;
        $i+=1;
    }

if (isset($_POST['nom'])AND($_POST['nom']!=NULL) AND isset($_POST['jeu'])AND($_POST['jeu']!=NULL) AND isset($_POST['points'])AND($_POST['points']!=NULL))
{   
    $id_joueur=explode(" ", $_POST['nom']);
    $id_jeu=explode(" ", $_POST['jeu']);
    
    $req = $bdd->prepare('UPDATE points SET points = points + :points_suplementaire WHERE clef=:clef');

    $req->execute(array(
                'points_suplementaire' => $_POST['points'],
                'clef' => $id_joueur[0]
                ));

    $req = $bdd->prepare('SELECT points_jeu FROM points WHERE clef=?');
    $req->execute(array($id_joueur[0]));

    while ($donnees = $req->fetch())
    {
        $points_jeu=explode(" ", $donnees['points_jeu']);
    }

    $taille_points_jeu=count($points_jeu);

    if ($points_jeu[0]==NULL)
    {
        $points_jeu[0]=$id_jeu[0];
        $points_jeu[1]=$_POST['points'];
        $taille_points_jeu =2;
    }
    else
    {
        $existe=false;
        for ($i=0;$i<$taille_points_jeu;$i+=2){
            if ($points_jeu[$i]==$id_jeu[0]){
                $points_jeu[$i+1]=$points_jeu[$i+1]+$_POST['points'];
                $existe=true;
            }
        }

        if ($existe==false){
            if($points_jeu[$taille_points_jeu-1]==NULL){
                $points_jeu[$taille_points_jeu-1]=$id_jeu[0];
                $points_jeu[$taille_points_jeu]=$_POST['points'];
                $taille_points_jeu ++;
            }else{
                $points_jeu[$taille_points_jeu]=$id_jeu[0];
                $points_jeu[$taille_points_jeu+1]=$_POST['points'];
                $taille_points_jeu +=2;
            }
        }
    }
    $new_points_jeu="";
    for ($i=1;$i<=$Nb_jeu;$i++)
    {
        for($j=0;$j<$taille_points_jeu;$j+=2)
        {
            if ($points_jeu[$j]=="J".$clef_jeu[$i])
            {
                $new_points_jeu .= $points_jeu[$j]." ".$points_jeu[$j+1]." ";
            }
        }
    }
    
    $req = $bdd->prepare('UPDATE points SET points_jeu = :new_points_jeu WHERE clef=:clef');

    $req->execute(array(
                'new_points_jeu' => $new_points_jeu,
                'clef' => $id_joueur[0]
                ));

    
    $message="Points mis à jour";
     
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
            $( "#accordion" ).accordion({
                heightStyle: "content",
                <?php
                    echo "active:".$acc;
                ?>
                });
        } );
        </script>
        <?php if (isset($old_balise))
        { ?>
        <script>
        $( function() {
            $( "#tabs2" ).tabs({
                active: 1
            });
        } );
        </script>
        <?php }else
        { ?>
            <script>
            $( function() {
                $( "#tabs2" ).tabs();
            
            } );
            </script>
        <?php } ?>

        <?php if (isset($old_event))
        { ?>
        <script>
        $( function() {
            $( "#tabs3" ).tabs({
                active: 1
            });
        } );
        </script>
        <?php }else
        { ?>
            <script>
            $( function() {
                $( "#tabs3" ).tabs();
            
            } );
            </script>
        <?php } ?>

        <?php if (isset($old_allo))
        { ?>
        <script>
        $( function() {
            $( "#tabs4" ).tabs({
                active: 1
            });
        } );
        </script>
        <?php }else
        { ?>
            <script>
            $( function() {
                $( "#tabs4" ).tabs();
            
            } );
            </script>
        <?php } ?>

        <script>
            $( function() {
            $( "#tabs" ).tabs();
          } );  
        </script>
        <script>
          $( function() {
            var NOM = [
                <?php 
                for ($i=1;$i<$Nb_user;$i++){
                    echo "\"".$clef[$i]." - ".$Prenom[$i]." ".$Nom[$i]."\",";
                }
                 echo "\"".$clef[$Nb_user]." - ".$Prenom[$Nb_user]." ".$Nom[$Nb_user]."\"";
                 ?>
                  ];

            $( "#nom" ).autocomplete({
              source: NOM
            });

            var JEU = [
                       <?php 
                for ($i=1;$i<$Nb_jeu;$i++){
                    echo "\"J".$clef_jeu[$i]." - ".$nom_jeu[$i]."\",";
                }
                 echo "\"J".$clef_jeu[$Nb_jeu]." - ".$nom_jeu[$Nb_jeu]."\"";
                 ?>
                    ];
                    
            $( "#jeu" ).autocomplete({
              source: JEU
            });

            var JEU2 = [
                       <?php 
                for ($i=1;$i<$Nb_jeu;$i++){
                    echo "\"".$clef_jeu[$i]." - ".$nom_jeu[$i]."\",";
                }
                 echo "\"".$clef_jeu[$Nb_jeu]." - ".$nom_jeu[$Nb_jeu]."\"";
                 ?>
                    ];

             $( "#old_jeu" ).autocomplete({
              source: JEU2
            });

             $( "#suppr_jeu" ).autocomplete({
              source: JEU2
            });

             var BAL = [
                       <?php 
                for ($i=1;$i<$Nb_balise;$i++){
                    echo "\"".$clef_balise[$i]." - ".$nom_balise[$i]."\",";
                }
                 echo "\"".$clef_balise[$Nb_balise]." - ".$nom_balise[$Nb_balise]."\"";
                 ?>
                    ];
            $( "#old_balise" ).autocomplete({
              source: BAL
            });

            $( "#suppr_balise" ).autocomplete({
              source: BAL
            });

            var EVE = [
                       <?php 
                for ($i=1;$i<$Nb_event;$i++){
                    echo "\"".$clef_event[$i]." - ".$nom_event[$i]."\",";
                }
                 echo "\"".$clef_event[$Nb_event]." - ".$nom_event[$Nb_event]."\"";
                 ?>
                    ];
            $( "#old_event" ).autocomplete({
              source: EVE
            });

            $( "#suppr_event" ).autocomplete({
              source: EVE
            });

            var ALLO = [
                       <?php 
                for ($i=1;$i<$Nb_allo;$i++){
                    echo "\"".$clef_allo[$i]." - ".$nom_allo[$i]."\",";
                }
                 echo "\"".$clef_allo[$Nb_allo]." - ".$nom_allo[$Nb_allo]."\"";
                 ?>
                    ];
            $( "#old_allo" ).autocomplete({
              source: ALLO
            });

            $( "#suppr_allo" ).autocomplete({
              source: ALLO
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
        include("header.php"); ?>

    	<section>
    	<?php } ?>
        <div class='corps'>
            <div class='accueil'>
                <div class="error">
                    <?php if (isset($message))
                        {
                            echo $message;
                            //print_r($id_jeu);
                        } 
                        if (isset($_POST['suppr_jeu']) AND $_POST['suppr_jeu']!=NULL)
                        {
                            echo "Vous vous aprétez à supprimer le jeu : ".$_POST['suppr_jeu']."<br> Etes vous sûr ?";
                            echo "<div style='display:flex;'>";
                            echo'<a href="home_points.php?sure_delete='.$_POST['suppr_jeu'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_points.php">
                             <div class='bouton'>
                                Non
                             </div>
                            </a>
                            </div>
                        <?php
                        }
                        if (isset($_POST['suppr_balise']) AND $_POST['suppr_balise']!=NULL)
                        {
                            echo "Vous vous aprétez à supprimer la balise : ".$_POST['suppr_balise']."<br> Etes vous sûr ?";
                            echo "<div style='display:flex;'>";
                            echo'<a href="home_points.php?sure_deleteb='.$_POST['suppr_balise'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_points.php">
                             <div class='bouton'>
                                Non
                             </div>
                            </a>
                            </div>
                        <?php
                        }
                        if (isset($_POST['suppr_event']) AND $_POST['suppr_event']!=NULL)
                        {
                            echo "Vous vous aprétez à supprimer l'événement' : ".$_POST['suppr_event']."<br> Etes vous sûr ?";
                            echo "<div style='display:flex;'>";
                            echo'<a href="home_points.php?sure_deletee='.$_POST['suppr_event'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_points.php">
                             <div class='bouton'>
                                Non
                             </div>
                            </a>
                            </div>
                        <?php
                        }

                        if (isset($_POST['suppr_allo']) AND $_POST['suppr_allo']!=NULL)
                        {
                            echo "Vous vous aprétez à supprimer l'allo' : ".$_POST['suppr_allo']."<br> Etes vous sûr ?";
                            echo "<div style='display:flex;'>";
                            echo'<a href="home_points.php?sure_deletea='.$_POST['suppr_allo'].'">';
                            ?>
                            <div class='bouton'>
                                Oui 
                             </div>
                            </a>

                            <a href="home_points.php">
                             <div class='bouton'>
                                Non
                             </div>
                            </a>
                            </div>
                        <?php
                        }
                    ?>
                      
                </div>
                <div id="accordion">
                    <h3>Points</h3>
                    <div>
                        <a href="home_listes.php">
                         <div class='bouton'>
                            Liste des inscrits
                         </div>
                        </a>
                        <div class="formulaire"> 
                            <form action="home_points.php" method="post">          
                                <label for="nom">Joueur :</label> <input type="text" name="nom" id ="nom" size="40" placeholder="Tapez les premières lettres puis sélectionnez" required> <br />

                                <label for="jeu">Jeu :</label> <input type='text' name='jeu' id ="jeu" size='40' placeholder="Tapez les premières lettres puis sélectionnez" required> <br />

                                <label for="points">Points :</label> <input type='number' name='points' id ="points" size='40' required> <br />

                                <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Valider" >
                                </div>
                            </form>
                        <?php //print_r($points_jeu); echo "<br>".$new_points_jeu;
                        //print_r($clef_jeu); ?>
                        </div>
                    </div>
                 <?php
                if (isset($_SESSION['droits']) AND $_SESSION['droits']=='MOD'){
                ?>
                    <h3>Jeux</h3>
                    <div>
                        <div id="tabs">
                            <ul>
                                <li><a href="#tabs-0"><div class="titre_onglet">Ajouter un jeu</div></a></li>
                                <li><a href="#tabs-1"><div class="titre_onglet">Éditer un jeu</div></a></li>
                                <li><a href="#tabs-2"><div class="titre_onglet">Supprimer un jeu</div></a></li>
                            </ul> 

                            <div id="tabs-0">
                                <a href="home_listes.php?goto=jeux">
                                 <div class='bouton'>
                                    Liste jeux
                                 </div>
                                </a>
                                <form action="home_points.php" method="post">
                                    <label for="new_jeu">Nom du nouveau jeu :</label><input type='text' name='new_jeu' id ="new_jeu" size='40' required><br/>

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Ajouter" >
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-1">
                                <form action="home_points.php" method="post">
                                    <label for="old_jeu">Nom actuel du jeu :</label><input type='text' name='old_jeu' id ="old_jeu" size='40' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>

                                    <label for="set_jeu">Nouveau nom :</label><input type='text' name='set_jeu' id ="set_jeu" size='40' placeholder="Nom sans '# - '" ><br/>
                                    
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Valider" >
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-2">
                                <form action="home_points.php" method="post">
                                    <label for="suppr_jeu">Nom du jeu :</label><input type='text' name='suppr_jeu' id ="suppr_jeu" size='40' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>

                                        
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Supprimer" >
                                    </div>
                                </form>
                            </div>

                        </div>  
                    </div>

                    <h3>Balises</h3>
                    <div>
                        <div id="tabs2">
                            <ul>
                                <li><a href="#tabs-3"><div class="titre_onglet">Ajouter une balise</div></a></li>
                                <li><a href="#tabs-4"><div class="titre_onglet">Éditer une balise</div></a></li>
                                <li><a href="#tabs-5"><div class="titre_onglet">Supprimer une balise</div></a></li>
                            </ul> 

                            <div id="tabs-3">
                                <a href="home_listes.php?goto=balises">
                                 <div class='bouton'>
                                    Liste balises
                                 </div>
                                </a>
                                <form action="home_points.php" method="post">
                                    <label for="new_balise">Nom de la nouvelle balise:</label><input type='text' name='new_balise' id ="new_balise" size='40' required><br/>
                                    <label for="code_new_balise">Code de la balise:</label><input type='text' name='code_new_balise' id ="code_new_balise" size='40' placeholder="/!\ vérifiez les codes existants" required><br/>
                                    <label for="description_new_balise">Description :</label>  <textarea name="description_new_balise" id ="description_new_balise" required></textarea> <br />
                                    <label for="indice_new_balise">Indice :</label>  <textarea name="indice_new_balise" id ="indice_new_balise" required></textarea> <br />

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Créer" >
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-4">
                                <?php if (isset($old_balise))
                                {
                                    echo '<form action="home_points.php" method="post">';
                                }else{
                                    echo '<form action="home_points.php" method="post">';
                                } ?>                                
                                    
                                    <?php if (isset($old_balise))
                                        { ?>
                                        <label for="old_balise">Nom actuel du la balise :</label><input type='text' name='old_balise' id ="old_balise" size='40' value= "<?php echo htmlspecialchars($_POST['old_balise'], ENT_QUOTES); ?>"" readonly  ><br/>
                                        <label for="set_balise">Nouveau nom :</label><input type='text' name='set_balise' id ="set_balise" size='40' value= "<?php echo htmlspecialchars($old_balise[0], ENT_QUOTES); ?>" ><br/>
                                        <label for="code_set_balise">Nouveau code:</label><input type='text' name='code_set_balise' id ="code_set_balise" size='40' value= "<?php echo htmlspecialchars($old_balise[1], ENT_QUOTES); ?>" ><br/>
                                        <label for="description_set_balise">Nouvelle description :</label>  <textarea name="description_set_balise" id ="description_set_balise" ><?php echo htmlspecialchars($old_balise[2], ENT_QUOTES); ?></textarea> <br />
                                        <label for="indice_set_balise">Nouvel indice :</label><textarea name="indice_set_balise" id ="indice_set_balise" ><?php echo htmlspecialchars($old_balise[3], ENT_QUOTES); ?></textarea> <br />
                                    
                                    <?php } else {
                                        echo '<label for="old_balise">Nom actuel du la balise :</label><input type=\'text\' name=\'old_balise\' id ="old_balise" size=\'40\' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>';
                                        } ?>
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <?php if (isset($old_balise))
                                        {
                                            echo'<input type="submit" value="Valider" >';
                                        }else{                                            
                                            echo'<input type="submit" value="Charger la balise" >';
                                        } ?>
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-5">
                                <form action="home_points.php" method="post">
                                    <label for="suppr_balise">Nom de la balise :</label><input type='text' name='suppr_balise' id ="suppr_balise" size='40' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>

                                        
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Supprimer" >
                                    </div>
                                </form>
                            </div>

                        </div>  
                    </div>


                    <h3>Événements</h3>
                    <div>
                        <div id="tabs3">
                            <ul>
                                <li><a href="#tabs-6"><div class="titre_onglet">Ajouter un event</div></a></li>
                                <li><a href="#tabs-7"><div class="titre_onglet">Éditer un event</div></a></li>
                                <li><a href="#tabs-8"><div class="titre_onglet">Supprimer un event</div></a></li>
                            </ul> 

                            <div id="tabs-6">
                                <form action="home_points.php" method="post" enctype="multipart/form-data">
                                    <label for="new_event">Titre de l'événement:</label><input type='text' name='new_event' id ="new_event" size='40' required><br/>
                                    <label for="new_event_cryptee">Titre crypté de l'événement:</label><input type='text' name='new_event_cryptee' id ="new_event_cryptee" size='40' required><br/>
                                    <label for="description_new_event">Description :</label>  <textarea name="description_new_event" id ="description_new_event" required></textarea> <br />
                                    <label for="date_new_event">Date de l'événement:</label><input type='date' name='date_new_event' id ="date_new_event" size='40' placeholder="/!\ Format jj-mm-aaaa" required><br/>
                                    <label for="date_decrytage_new_event">Date de décryptage:</label><input type='date' name='date_decrytage_new_event' id ="date_decrytage_new_event" size='40' placeholder="/!\ Format jj-mm-aaaa" required><br/>
                                    <label for="image_new_event">Affiche (/!\ <2Mo) : </label> <input type="file" name="image_new_event" required/><br />
                                    <label for="image_cryptee_new_event">Affiche cryptée (/!\ <2Mo) :</label> <input type="file" name="image_cryptee_new_event" required/><br />

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Créer" >
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-7">
                                <form action="home_points.php" method="post" enctype="multipart/form-data">                               
                                    
                                    <?php if (isset($old_event))
                                        { ?>
                                        <label for="old_event">Nom actuel de l'événement :</label><input type='text' name='old_event' id ="old_event" size='40' value= "<?php echo htmlspecialchars($_POST['old_event'], ENT_QUOTES); ?>" readonly ><br/>
                                        <label for="set_event">Nouveau titre :</label><input type='text' name='set_event' id ="set_event" size='40' value= "<?php echo htmlspecialchars($old_event[0], ENT_QUOTES); ?>" ><br/>
                                        <label for="set_event_cryptee">Nouveau titre crypté :</label><input type='text' name='set_event_cryptee' id ="set_event_cryptee" size='40' value= "<?php echo htmlspecialchars($old_event[6], ENT_QUOTES); ?>" ><br/>
                                        <label for="description_set_event">Nouvelle description :</label>  <textarea name="description_set_event" id ="description_set_event" ><?php echo htmlspecialchars($old_event[1], ENT_QUOTES); ?></textarea> <br />                                       
                                        <label for="date_set_event">Nouvelle date de l'événement:</label><input type='date' name='date_set_event' id ="date_set_event" size='40' value= "<?php echo date('d-m-Y',$old_event[2]); ?>" ><br/>
                                        <label for="date_decrytage_set_event">Nouvelle date de décryptage:</label><input type='date' name='date_decrytage_set_event' id ="date_decrytage_set_event" size='40' value= "<?php echo date('d-m-Y',$old_event[3]); ?>" ><br/>
                                        <div><img src="affiches/mini<?php echo htmlspecialchars($old_event[4], ENT_QUOTES); ?>"" alt="affiche" /></div>
                                        <label for="image_set_event">Changer l'affiche (/!\ <2Mo) :</label> <input type="file" name="image_set_event" /><br />
                                        <div><img src="affiches/mini<?php echo htmlspecialchars($old_event[5], ENT_QUOTES); ?>"" alt="affiche cryptée" /></div>
                                        <label for="image_cryptee_set_event">Changer l'affiche cryptée (/!\ <2Mo) :</label> <input type="file" name="image_cryptee_set_event" /><br />
                                        
                                    
                                    <?php } else {
                                        echo '<label for="old_event">Nom actuel de l\'événement :</label><input type=\'text\' name=\'old_event\' id ="old_event" size=\'40\' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>';
                                        } ?>
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <?php if (isset($old_event))
                                        {
                                            echo'<input type="submit" value="Valider" >';
                                        }else{                                            
                                            echo'<input type="submit" value="Charger l\'événement" >';
                                        } ?>
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-8">
                                <form action="home_points.php" method="post">
                                    <label for="suppr_event">Nom de l\'événement :</label><input type='text' name='suppr_event' id ="suppr_event" size='40' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>

                                        
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Supprimer" >
                                    </div>
                                </form>
                            </div>

                        </div>  
                    </div>

                    <h3>Allo</h3>
                    <div>
                        <div id="tabs4">
                            <ul>
                                <li><a href="#tabs-9"><div class="titre_onglet">Ajouter un allo</div></a></li>
                                <li><a href="#tabs-10"><div class="titre_onglet">Éditer un allo</div></a></li>
                                <li><a href="#tabs-11"><div class="titre_onglet">Supprimer un allo</div></a></li>
                            </ul> 

                            <div id="tabs-9">
                                <a href="home_listes.php?goto=allo">
                                 <div class='bouton'>
                                    Liste allo
                                 </div>
                                </a>
                                <form action="home_points.php" method="post" enctype="multipart/form-data">
                                    <label for="new_allo">Titre de l'allo:</label><input type='text' name='new_allo' id ="new_allo" size='40' required><br/>
                                    <label for="description_new_allo">Description :</label>  <textarea name="description_new_allo" id ="description_new_allo" required></textarea> <br />
                                    <label for="new_tel_allo">Tel à appeler :</label><input type='text' name='new_tel_allo' id ="new_tel_allo" size='40' required><br/>
                                    Statut :<br>
                                    <label for="actif">Actif<input type='radio' name='new_statut_allo' value="2" id ="actif" /></label> <br/>
                                    <label for="comming_soon">Comming soon<input type='radio' name='new_statut_allo' value="1" id ="comming_soon"/></label><br/>
                                    <label for="actif">Caché<input type='radio' name='new_statut_allo' value="0" id ="caché" checked /></label><br/>
                                    <label for="image_new_allo">Logo (png blanc ~200*200 px) :</label> <input type="file" name="image_new_allo" required/><br />
                                    

                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Créer" >
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-10">
                                <a href="home_listes.php?goto=allo">
                                 <div class='bouton'>
                                    Liste allo
                                 </div>
                                </a>
                                <form action="home_points.php" method="post" enctype="multipart/form-data">                               
                                    
                                    <?php if (isset($old_allo))
                                        { ?>
                                        <label for="old_allo">Nom actuel de l'allo :</label><input type='text' name='old_allo' id ="old_allo" size='40' value= "<?php echo htmlspecialchars($_POST['old_allo'], ENT_QUOTES); ?>" readonly ><br/>
                                        <label for="set_allo">Nouveau titre :</label><input type='text' name='set_allo' id ="set_allo" size='40' value= "<?php echo htmlspecialchars($old_allo[0], ENT_QUOTES); ?> "  ><br/>
                                        <label for="description_set_allo">Nouvelle description :</label>  <textarea name="description_set_allo" id ="description_set_allo" ><?php echo htmlspecialchars($old_allo[1], ENT_QUOTES); ?></textarea> <br />
                                        <label for="set_tel_allo">Nouveau tel à appeler :</label><input type='text' name='set_tel_allo' id ="set_tel_allo" size='40' value= "<?php echo htmlspecialchars($old_allo[3], ENT_QUOTES); ?>"><br/>
                                        Nouveau statut :<br/>
                                        <label for="actif">Actif<input type='radio' name='set_statut_allo' value="2" id ="actif" <?php if($old_allo[4]==2){echo "checked";} ?> /></label><br/>
                                        <label for="comming_soon">Comming soon<input type='radio' name='set_statut_allo' value="1" id ="comming_soon" <?php  if($old_allo[4]==1){echo "checked";} ?> /> </label><br/>
                                        <label for="actif">Caché<input type='radio' name='set_statut_allo' value="0" id ="caché" <?php  if($old_allo[4]==0){echo "checked";} ?> /></label><br/>
                                        <div><img src="logo_allo/<?php echo htmlspecialchars($old_allo[2], ENT_QUOTES); ?>"" alt="logo" /></div>
                                        <label for="image_set_allo">Changer le logo (png blanc ~200*200 px) :</label> <input type="file" name="image_set_allo" /><br />
                                                                                
                                    
                                    <?php } else {
                                        echo '<label for="old_allo">Nom actuel de l\'allo :</label><input type=\'text\' name=\'old_allo\' id ="old_allo" size=\'40\' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>';
                                        } ?>
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <?php if (isset($old_allo))
                                        {
                                            echo'<input type="submit" value="Valider" >';
                                        }else{                                            
                                            echo'<input type="submit" value="Charger l\'allo" >';
                                        } ?>
                                    </div>
                                </form>
                            </div>

                            <div id="tabs-11">
                                <form action="home_points.php" method="post">
                                    <label for="suppr_allo">Nom de l\'allo :</label><input type='text' name='suppr_allo' id ="suppr_allo" size='40' placeholder="Tapez les premières lettres puis sélectionnez" ><br/>

                                        
                                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                                    <input type="submit" value="Supprimer" >
                                    </div>
                                </form>
                            </div>

                        </div>  
                    </div>

                    <h3>Date décryptage jeu de piste</h3>
                    <div>
                        <form action="home_points.php" method="post">
                            <label for="set_date_jeu_de_piste">Nouvelle date de décryptage :</label><input type='date' name='set_date_jeu_de_piste' id ="set_date_jeu_de_piste" size='40' value= "<?php echo date('d-m-Y',$date_decryptage_jeu_de_piste); ?>" >
                            <input type="submit" value="Valider" >

                        </form>
                    </div>



                    <?php
                    }
                    ?>


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