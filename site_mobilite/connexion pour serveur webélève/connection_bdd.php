<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=mobinfo;charset=utf8', "mobinfo", "SDByUkH4dXE9kGlc", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

?>