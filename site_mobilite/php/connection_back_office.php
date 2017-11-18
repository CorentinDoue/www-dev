<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=mobilite_internationale;charset=utf8', "Coco", "0386479877", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

?>
