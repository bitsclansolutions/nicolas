<?php
$raw = imagecreatefromjpeg('data/Hexagones/H20M003.png');

/* Simple math here

  A_____F
  /     \
B/       \E
 \       /
 C\_____/D

*/
$w = imagesx($raw);
$points = array(
    .25 * $w, .067  * $w, // A
    0, .5   * $w, // B
    .25 * $w, .933  * $w, // C
    .75 * $w, .933  * $w, // D
    $w, .5  * $w, // E
    .75 * $w, .067  * $w  // F
);

// Create the mask
$mask = imagecreatetruecolor($w, $w);
imagefilledpolygon($mask, $points, 6, imagecolorallocate($mask, 255, 0, 0));

// Create the new image with a transparent bg
$image = imagecreatetruecolor($w, $w);
$transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagealphablending($image, false);
imagesavealpha($image, true);
imagefill($image, 0, 0, $transparent);