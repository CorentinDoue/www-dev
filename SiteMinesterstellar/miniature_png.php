
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
$source = imagecreatefrompng($filename);
$image_p = imagecreatetruecolor($width, $height);
imagealphablending($image_p, false);
imagesavealpha($image_p,true);
$transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
imagefilledrectangle($image_p, 0, 0, $width, $height, $transparent);


imagecopyresampled($image_p, $source, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Affichage
?>

