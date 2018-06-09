<?php
try{
    $bdd = new PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_715df4243db092a;charset=utf8', 'baad2e4a5efe46', '816c133b', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

?>
