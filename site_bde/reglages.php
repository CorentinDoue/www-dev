<?php if(isset($_SESSION["id"])){
    
?>

    <h1>Changer de mot de passe</h1>

<?php
    
  if(isset($_POST["newpwd"])){
      
      include "php/functions.php";
      
     // include ("php/connexion.php");
      
      $req = $bdd -> prepare("SELECT login_user FROM user WHERE id_user=?");
      $req -> execute(array($_SESSION["id"]));
      $donnees = $req -> fetch();
      
      echo $donnees["login_user"];
      
      if(user_authentication($bdd, $donnees["login_user"], $_POST["pwd"])){
          
          if($_POST["newpwd"] == $_POST["newpwd2"]){

                $salt = generate_salt();
                $hash = hash_pwd($_POST["newpwd"], $salt);
                $req2 = $bdd -> prepare("UPDATE user SET pwd_user = ? WHERE id_user = ?");
                $req2 -> execute(array($hash,$_SESSION["id"]));
                $req2 = $bdd -> prepare("UPDATE user SET salt_user = ? WHERE id_user = ?");
                $req2 -> execute(array($salt, $_SESSION["id"]));
              
              echo "<p style=\"color: green;\">Mot de passe modifié</p><br>";
              
          }else{
                echo "<p style=\"color: red;\">Mauvaise confirmation du nouveau mot de passe</p><br>";
          }
      }else{
          echo "<p style=\"color: red;\">Mot de passe incorrect</p><br>";
      }
  }
?>

<form action="index.php?page=reglages" method="post">
    Ancien mot de passe : <input type="password" class="input" name="pwd"><br>
    Nouveau mot de passe : <input type="password" class="input" name="newpwd"><br>
    Confirmation nouveau mot de passe : <input type="password" class="input" name="newpwd2"><br>
    <input type="submit" class="button" value="Changer">
</form>

<?php
       
    
}else{
    include "php/login.php";
} ?>