
<?php
// Le fichier




// Définition de la largeur et de la hauteur maximale
$width = $widthmax;
$height = $heightmax;



// Cacul des nouvelles dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Redimensionnement
$image_p = imagecreatetruecolor($width, $height);
$source = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $source, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Affichage

?>
