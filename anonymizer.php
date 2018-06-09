<?php

ini_set('max_execution_time', 20*60);

header('Content-type: text/html; charset=UTF-8');$

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value
function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);
    //echo $result."<br>";
    $result=utf8_encode($result);
    //echo $result."<br>";
    return $result;
}

function skip_accents( $str, $charset='utf-8' ) {
 
    $str = htmlentities( $str, ENT_NOQUOTES, $charset );
    
    $str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
    $str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );
    $str = preg_replace( '#&[^;]+;#', '', $str );
    
    return $str;
}

try{
    $bdd = new PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_715df4243db092a;charset=utf8', 'baad2e4a5efe46', '816c133b', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}


//bbd minesterstellar
$rep = $bdd -> query("SELECT clef, Prenom, Nom FROM user_minesterstellar WHERE clef <> 1 ");

while ($donnees = $rep->fetch())
{
    $random_name=array_map("utf8_decode",(array)json_decode(CallAPI("GET","https://uinames.com/api/", array('region' => "france" ))));
    
    $req = $bdd -> prepare("UPDATE user_minesterstellar SET Prenom=?, Nom=?, Mail=?, Mdp=? WHERE clef=?");

    $req -> execute(array($random_name["name"],$random_name["surname"],strtolower(skip_accents($random_name["name"])).".".strtolower(skip_accents($random_name["surname"]))."@etu.emse.fr",strtolower(skip_accents($random_name["name"])),$donnees["clef"]));
    echo $donnees["Prenom"]." ".$donnees["Nom"]." => name : ".$random_name["name"]." surname :".$random_name["surname"]."  ".strtolower(skip_accents($random_name["name"])).".".strtolower(skip_accents($random_name["surname"]))."<br>";
}

//bbd bde (cercle)
$rep = $bdd -> query("SELECT id_user, login_user FROM user WHERE id_user <> 542 ");

while ($donnees = $rep->fetch())
{
    $random_name=array_map("utf8_decode",(array)json_decode(CallAPI("GET","https://uinames.com/api/", array('region' => "france" ))));
    
    $req = $bdd -> prepare("UPDATE user SET prenom=?, nom=?, login_user=? WHERE id_user=?");

    $req -> execute(array($random_name["name"],$random_name["surname"],strtolower(skip_accents($random_name["name"])).".".strtolower(skip_accents($random_name["surname"])),$donnees["id_user"]));
    echo $donnees["login_user"]." => ". strtolower(skip_accents($random_name["name"])).".".strtolower(skip_accents($random_name["surname"]))."<br>";
}

//bdd site mobilité
$rep = $bdd -> query("SELECT ID, nom, prenom, tuteur FROM parcours");

while ($donnees = $rep->fetch())
{
    $random_name=array_map("utf8_decode",(array)json_decode(CallAPI("GET","https://uinames.com/api/", array('region' => "france" ))));
    $random_name2=array_map("utf8_decode",(array)json_decode(CallAPI("GET","https://uinames.com/api/", array('region' => "france" ))));
    
    $req = $bdd -> prepare("UPDATE parcours SET prenom=?, nom=?, tuteur=? WHERE ID=?");

    $req -> execute(array($random_name["name"],$random_name["surname"],$random_name2["name"]." ".$random_name2["surname"],$donnees["ID"]));
    echo $donnees["prenom"]." ".$donnees["nom"]." => ". $random_name["name"]." ".$random_name["surname"]."<br>";
    echo $donnees["tuteur"]." => ". $random_name2["name"]." ".$random_name2["surname"]."<br>";
}

