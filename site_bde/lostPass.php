<?php
   
   if(isset($_POST['login'])){
       
       include "php/functions.php";
       
      // include ("php/connexion.php");
       
        $req = $bdd -> prepare("SELECT id_user FROM user WHERE login_user = ?");
        $req -> execute(array($_POST['login']));
        $ans = $req->fetch();

      if(!$ans){
         echo "<p style='color:red'>Erreur lors du chargement du mot de passe, vérifiez que vous avez correctement entré votre login</p>";
      }
      else{
         
        $pwd = generate_code();
        $salt = generate_salt();
        $hash = hash_pwd($pwd, $salt);
        $req = $bdd -> prepare("UPDATE user SET pwd_user = ? WHERE login_user = ?");
        $req -> execute(array($hash, $_POST['login']));
        $req = $bdd -> prepare("UPDATE user SET salt_user = ? WHERE login_user = ?");
        $req -> execute(array($salt, $_POST['login']));
          
        mail("corentin.doue@etu.emse.fr","Récupération de mot de passe sur le site BDE",$_POST['login']."Votre nouveau mot de passe sur le site BDE (https://webeleves.emse.fr/~bde) est :   ".$pwd." (n'oubliez pas de le changer dans l'onglet réglages)","From: BDE@webeleves.emse.fr"."\r\n"."Content-type: text/html; charset=utf-8");
        echo "<p style='color:green'>Un email contenant votre mot de passe a été envoyé à l'adresse ".$_POST['login']."@etu.emse.fr</p>";
         
   }
   }

?>

<form method="post">
   <h1>Récupération de mot de passe</h1>
   Login : <input class="input" type="text" name="login"/><br/>
   <input type="submit" class="button" value="Envoyer"/>
</form>
