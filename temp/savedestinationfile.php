<?php
error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
function enleverCaracteresSpeciaux($text) {
$utf8 = array(
'#[áàâãªä]#' => 'a',
'#[ÁÀÂÃÄ]#' => 'A',
'#[ÍÌÎÏ]#' => 'I',
'#[íìîï]#' => 'i',
'#[èêë]#' => 'e',
'#[ÉÈÊË]#' => 'E',
'#[óòôõºö]#' => 'o',
'#[ÓÒÔÕÖ]#' => 'O',
'#[úùûü]#' => 'u',
'#[ÚÙÛÜ]#' => 'U',
'#ç#' => 'c',
'#Ç#' => 'C',
'#ñ#' => 'n',
'#Ñ#' => 'N',
'#–#' => '_', // conversion d'un tiret UTF-8 en un tiret simple
'#[‘’‚‹›]#' => '_', // guillemet simple
'#[“”«»„]#' => '_', // guillemet double
'# #' => '_', // espace insécable (équiv. à 0x160)
'#\+#' => '_',
'#-#' => '_',
'#\*#' => '_',
'#\?#' => '_',
'#,#' => '_',
'#é#' => 'e'
);
return preg_replace(array_keys($utf8), array_values($utf8), $text);
}
$answer['file']=$_FILES['file'];
move_uploaded_file($_FILES['file']['tmp_name'], 'documents/destination/' . basename(enleverCaracteresSpeciaux($_FILES['file']['name'])));
$answer['statut']="ok";
$answer['name']=enleverCaracteresSpeciaux($_FILES['file']['name']);

$answer_json =json_encode($answer);
echo $answer_json;
?>