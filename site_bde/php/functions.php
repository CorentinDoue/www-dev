<?php

function generate_code() {
    //return base64_encode(mcrypt_create_iv(32, MCRYPT_RAND));
	$char = 'bdfimrxz1259!';
	$chaine = str_shuffle($char);
	return $chaine;
}

function generate_salt() {
	//return base64_encode(mcrypt_create_iv(32, MCRYPT_RAND));
	$char = 'abcdefghijklmnopqrstuvwxyz012345';
	$chaine = str_shuffle($char);
	return $chaine;
}

function hash_pwd($pwd, $salt) {
	return hash('sha256', $salt . $pwd);
}

function user_authentication($db, $username, $pwd) {
	$req = $db->prepare('SELECT pwd_user, salt_user FROM user WHERE login_user = ?');
    
	$req->execute(array($username));
	$donnees = $req->fetch();
	$req->closeCursor();
	return $donnees['pwd_user'] == hash_pwd($pwd, $donnees['salt_user']);
}

?>
