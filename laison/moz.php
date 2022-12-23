<?php
const BASE = "https://nicolas.bitsclansolutions.com/laison/";
$borderxy     = "";
$bordera      = "";
$blanc        = "../laison/images/bayda.png";
$srcImagePath = "";
$param        = "";

if (isset($_GET['img']) || isset($_GET['imgborder'])) {
    if (isset($_GET['img']) && $_GET['img'] != null && $_GET['img'] != '') {
        $srcImagePath = BASE . $_GET['img'];
    }
    echo $srcImagePath;
    // Traitement du cas imgborder
    if (isset($_GET['imgborder']) && $_GET['imgborder'] != null && $_GET['imgborder'] != '') {
        $borderxy = BASE . $_GET['imgborder'];
        if (strpos($borderxy, "tmp") !== false) {
            $bordera = str_replace(".png", "ang.png", $borderxy);
            if (!fe($bordera)) {
                $bordera = str_replace(".PNG", "ang.PNG", $borderxy);
            }
            if (!fe($bordera)) {
                $bordera = $borderxy;
            }
        } else {
            $bordera = str_replace(".png", "C.png", $borderxy);
            $bordera = str_replace("Bordure", "Bordure/contour", $bordera);
            if ((strpos($bordera, 'all') !== false)) {
                $bordera = str_replace("all", "Bordure/contour", $bordera);
            }
            if ((strpos($bordera, 'de_ranchin') !== false)) {
                $bordera = str_replace("de_ranchin", "de_ranchin/contour", $bordera);
            }
            if ((strpos($bordera, 'di_rosa') !== false)) {
                $bordera = str_replace("di_rosa", "di_rosa/contour", $bordera);
            }
            if (!fe($bordera)) {
                $bordera = $borderxy;
            }
        }
    }
    if (isset($_GET['param']) && $_GET['param'] != null && $_GET['param'] != '') {
        if ($_GET['param'] == "hex") {
            $param = "hex";
        } elseif ($_GET['param'] == "14") {
            $param = "14";
        } elseif ($_GET['param'] == "art") {
            $param = "art";
        }
    }
    if ($srcImagePath == null || $srcImagePath == "") {
        $srcImagePath = "../laison/images/carreau.png";
    }
    if ($borderxy == null || $borderxy == "") {
        $borderxy = "../laison/images/border.png";
        $bordera  = $borderxy;
    }
    $pxBetweenTiles = 1;
} else {
    // S'il n'y ni img ni imgborder
    $pxBetweenTiles = 1;
    $srcImagePath   = "../laison/images/carreau.png";
    $borderxy       = "../laison/images/border.png";
    $bordera        = $borderxy;
}
if ((strpos($srcImagePath, "H-") !== false)) {
    $srcImagePath   = str_replace("Hexagones", "Hexagones/cp", $srcImagePath);
    $srcImagePath   = str_replace("all", "Hexagones/cp", $srcImagePath);
    $param          = "hex";
    $pxBetweenTiles = 0;
}
if ((strpos($srcImagePath, "poly.png") !== false)) {
    $srcImagePath   = str_replace("poly.png", "hex.png", $srcImagePath);
    $param          = "hex";
    $pxBetweenTiles = 0;
}
$tileWidth     = $tileHeight = 230;
$numberOfTiles = 10;
if ((strpos($srcImagePath, "H-") !== false) || ($param == "hex")) {
    $pxBetweenTiles = 0;
}
$mapWidth  = ($tileWidth + $pxBetweenTiles) * ($numberOfTiles + 2);
$mapHeight = ($tileWidth + $pxBetweenTiles) * ($numberOfTiles + 2);
$mapImage  = imagecreatetruecolor($mapWidth, $mapHeight);
$bgColor   = imagecolorallocate($mapImage, 50, 40, 0);
imagefill($mapImage, 0, 0, $bgColor);


function indexToCoords($index)
{
    global $tileWidth, $pxBetweenTiles, $leftOffSet, $topOffSet, $numberOfTiles;
    $x = ($index % $numberOfTiles) * ($tileWidth + $pxBetweenTiles) + $leftOffSet;
    $y = floor($index / $numberOfTiles) * ($tileWidth + $pxBetweenTiles) + $topOffSet;
    return Array(
        $x,
        $y
    );
}
function indexToCoordshex($index)
{
    global $tileWidth, $pxBetweenTiles, $leftOffSet, $topOffSet, $numberOfTiles;
    $x = ($index % $numberOfTiles) * (230 + $pxBetweenTiles) + $leftOffSet;
    $y = floor($index / $numberOfTiles) * (265 + $pxBetweenTiles) - 30;
    return Array(
        $x,
        $y
    );
}
function indexToCoordsb($index)
{
    global $tileWidth, $pxBetweenTiles, $leftOffSet, $topOffSet;
    $x = ($index % 13) * ($tileWidth + $pxBetweenTiles);
    $y = floor($index / 13) * ($tileWidth + $pxBetweenTiles);
    return Array(
        $x,
        $y
    );
}
for ($index = 0; $index < 160; $index++) {
    list($x, $y) = indexToCoordsb($index);
    $tileImg = imagecreatefrompng($blanc);
    imagecopy($mapImage, $tileImg, $x, $y, 0, 0, 231, 231);
    imagedestroy($tileImg);
}
for ($index = 0; $index < 120; $index++) {
    $b = ($index < 11) || ($index > 109 && $index < 120) || ($index == 10) || ($index == 20) || ($index == 30) || ($index == 40) || ($index == 50) || ($index == 60) || ($index == 70) || ($index == 80) || ($index == 90) || ($index == 100) || ($index == 110) || ($index == 120) || ($index == 19) || ($index == 29) || ($index == 39) || ($index == 49) || ($index == 59) || ($index == 69) || ($index == 79) || ($index == 89) || ($index == 99) || ($index == 109) || ($index == 119) || ($index == 129);
    $a = ($index == 0) || ($index == 9) || ($index == 110) || ($index == 119);
    $p = $param != "";
    if ($b) {
        if ($param == "14") {
            $bordera == $blanc;
        }
        if ($a) {
            $filename = $bordera;
            $degrees  = 0;
            switch ($index) {
                case 0:
                    $degrees = 0;
                    break;
                case 9:
                    $degrees = -90;
                    break;
                case 110:
                    $degrees = -270;
                    break;
                case 119:
                    $degrees = 180;
                    break;
                default:;
                    break;
            }
            if ($bordera == $borderxy) {
                $degrees = 0;
                if (strpos($borderxy, 'BFR') !== false || strpos($borderxy, 'BDR') !== false || strpos($borderxy, 'BMV') !== false) {
                    if ($index == 0) {
                        $degrees = 180;
                    }
                    if ($index == 9) {
                        $degrees = 180;
                    }
                }
            }
            $source = imagecreatefrompng($filename);
            $rotate = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } elseif (($index < 10)) {
            $filename = $borderxy;
            $degrees  = 180;
            if (((strpos($filename, "B090") !== false) || (strpos($filename, "B094") !== false) || (strpos($filename, "B095") !== false)) && ($index % 2 == 0)) {
                $degrees = 0;
            } else {
                $degrees = 180;
            }
            $source = imagecreatefrompng($filename);
            $rotate = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } elseif (($index > 109 && $index < 120)) {
            $filename = $borderxy;
            $degrees  = 360;
            if (((strpos($filename, "B090") !== false) || (strpos($filename, "B094") !== false) || (strpos($filename, "B095") !== false)) && ($index % 2 == 1)) {
                $degrees = 180;
            } else {
                $degrees = 360;
            }
            $source = imagecreatefrompng($filename);
            $rotate = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } elseif (($index == 10) || ($index == 20) || ($index == 30) || ($index == 40) || ($index == 50) || ($index == 60) || ($index == 70) || ($index == 80) || ($index == 90) || ($index == 100) || ($index == 110)) {
            $filename = $borderxy;
            $degrees  = 270;
            if (((strpos($filename, "B090") !== false) || (strpos($filename, "B094") !== false) || (strpos($filename, "B095") !== false)) && ($index % 4 == 2)) {
                $degrees = 90;
            } else {
                $degrees = 270;
            }
            $source = imagecreatefrompng($filename);
            $rotate = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } elseif (($index == 19) || ($index == 29) || ($index == 39) || ($index == 49) || ($index == 59) || ($index == 69) || ($index == 79) || ($index == 89) || ($index == 99) || ($index == 109)) {
            $filename = $borderxy;
            $degrees  = 90;
            if (((strpos($filename, "B090") !== false) || (strpos($filename, "B094") !== false) || (strpos($filename, "B095") !== false)) && ($index % 20 == 9)) {
                $degrees = -90;
            } else {
                $degrees = 90;
            }
            $source = imagecreatefrompng($filename);
            $rotate = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } else {
            list($x, $y) = indexToCoords($index);
            $tileImg = imagecreatefrompng($borderxy);
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        }
    } else {
        $c = ($index > 9 && $index < 20) || ($index > 29 && $index < 40) || ($index > 49 && $index < 60) || ($index > 69 && $index < 80) || ($index > 89 && $index < 100);
        if ($c && !$b && !(strpos($srcImagePath, "H-") !== false) && $param != "hex") {
            $filename = $srcImagePath;
            $degrees  = 90;
            $source   = imagecreatefrompng($filename);
            $rotate   = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        } elseif (!$b && !(strpos($srcImagePath, "H-") !== false) && $param != "hex") {
            list($x, $y) = indexToCoords($index);
            $tileImg = imagecreatefrompng($srcImagePath);
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        }
        if ($index % 2 == 1 && !$c && !$b && !(strpos($srcImagePath, "H-") !== false) && $param != "hex") {
            $filename = $srcImagePath;
            $degrees  = 270;
            $source   = imagecreatefrompng($filename);
            $rotate   = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        }
        if ($index % 2 == 1 && $c && !$b && !(strpos($srcImagePath, "H-") !== false) && $param != "hex") {
            $filename = $srcImagePath;
            $degrees  = 180;
            $source   = imagecreatefrompng($filename);
            $rotate   = imagerotate($source, $degrees, 0);
            list($x, $y) = indexToCoords($index);
            $tileImg = $rotate;
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        }
        if ((strpos($srcImagePath, "H-") !== false) || $param == "hex") {
            $filename = $srcImagePath;
            $degrees  = 0;
            if ($index % 2 == 1) {
                if ((strpos($srcImagePath, "HCALOLO") !== false) || (strpos($srcImagePath, "H-20M010.png") !== false) || (strpos($srcImagePath, "H-20M011.png") !== false) || (strpos($srcImagePath, "H-20M012.png") !== false) || (strpos($srcImagePath, "H-20M013.png") !== false)) {
                    $degrees = 0;
                    $source  = imagecreatefrompng($filename);
                    $rotate  = imagerotate($source, $degrees, 0);
                    list($x, $y) = indexToCoordshex($index);
                    $tileImg = $rotate;
                    imagecopy($mapImage, $tileImg, $x, $y, 0, 0, 460, 530);
                    imagedestroy($tileImg);
                } else {
                    $degrees = 180;
                    $source  = imagecreatefrompng($filename);
                    $rotate  = imagerotate($source, $degrees, 0);
                    list($x, $y) = indexToCoordshex($index);
                    $tileImg = $rotate;
                    imagecopy($mapImage, $tileImg, $x, $y, 0, 0, 230, 265);
                    imagedestroy($tileImg);
                }
            } elseif ((strpos($srcImagePath, "HCALOLO") !== false) || (strpos($srcImagePath, "H-20M010.png") !== false) || (strpos($srcImagePath, "H-20M011.png") !== false) || (strpos($srcImagePath, "H-20M012.png") !== false) || (strpos($srcImagePath, "H-20M013.png") !== false)) {
                echo '';
            } else {
                $degrees = 0;
                $source  = imagecreatefrompng($filename);
                $rotate  = imagerotate($source, $degrees, 0);
                list($x, $y) = indexToCoordshex($index);
                $tileImg = $rotate;
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, 230, 265);
                imagedestroy($tileImg);
            }
        }
        if ((strpos($srcImagePath, "FLIP") !== false) || (strpos($srcImagePath, "M1374.png") !== false) || (strpos($srcImagePath, "M1340.png") !== false) || (strpos($srcImagePath, "M1341.png") !== false) || (strpos($srcImagePath, "M1342.png") !== false) || (strpos($srcImagePath, "M1343.png") !== false) || (strpos($srcImagePath, "M1391.png") !== false) || (strpos($srcImagePath, "M1393.png") !== false) || (strpos($srcImagePath, "M1390.png") !== false) || (strpos($srcImagePath, "M1392.png") !== false) || (strpos($srcImagePath, "M1394.png") !== false)) {
            list($x, $y) = indexToCoords($index);
            $tileImg = imagecreatefrompng($srcImagePath);
            $t1      = flipHorizontal($tileImg);
            $t2      = flipVertical($t1);
            $t3      = flipVertical($tileImg);
            if ($c && !$b && !(strpos($srcImagePath, "H-") !== false)) { //3
                imagecopy($mapImage, $t2, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($t2);
            } elseif (!$b) { //4
                imagecopy($mapImage, $t1, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($t1);
            }
            if ($index % 2 == 1 && !$c && !$b && $param != "hex") { //2
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($tileImg);
            }
            if ($index % 2 == 1 && $c && !$b && $param != "hex") { //1
                imagecopy($mapImage, $t3, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($t3);
            }
        }
        if ((strpos($srcImagePath, "SOLZ") !== false) || (strpos($srcImagePath, "M1590.png") !== false) || (strpos($srcImagePath, "M1591.png") !== false) || (strpos($srcImagePath, "M1592.png") !== false)) {
            if ($c && !$b && $param != "hex") { //3
                $filename = $srcImagePath;
                $degrees  = 270;
                $source   = imagecreatefrompng($filename);
                $rotate   = imagerotate($source, $degrees, 0);
                list($x, $y) = indexToCoords($index);
                $tileImg = $rotate;
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($tileImg);
            } elseif (!$b) { //4
                $filename = $srcImagePath;
                $degrees  = 180;
                $source   = imagecreatefrompng($filename);
                $rotate   = imagerotate($source, $degrees, 0);
                list($x, $y) = indexToCoords($index);
                $tileImg = $rotate;
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($tileImg);
            }
            if ($index % 2 == 1 && !$c && !$b && $param != "hex") { //2
                $filename = $srcImagePath;
                $degrees  = 90;
                $source   = imagecreatefrompng($filename);
                $rotate   = imagerotate($source, $degrees, 0);
                list($x, $y) = indexToCoords($index);
                $tileImg = $rotate;
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($tileImg);
            }
            if ($index % 2 == 1 && $c && !$b && $param != "hex") { //1
                $filename = $srcImagePath;
                $degrees  = 0;
                $source   = imagecreatefrompng($filename);
                $rotate   = imagerotate($source, $degrees, 0);
                list($x, $y) = indexToCoords($index);
                $tileImg = $rotate;
                imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
                imagedestroy($tileImg);
            }
        }
        if ((strpos($srcImagePath, "A2A") !== false) || (strpos($srcImagePath, "M037.png") !== false) || (strpos($srcImagePath, "M038.png") !== false) || (strpos($srcImagePath, "M112.png") !== false) || (strpos($srcImagePath, "M110.png") !== false) || (strpos($srcImagePath, "M111.png") !== false) || (strpos($srcImagePath, "M113.png") !== false) || (strpos($srcImagePath, "M240.png") !== false) || (strpos($srcImagePath, "M156.png") !== false) || (strpos($srcImagePath, "M151.png") !== false) || (strpos($srcImagePath, "M1162.png") !== false) || (strpos($srcImagePath, "M1160.png") !== false) || (strpos($srcImagePath, "M1161.png") !== false) || (strpos($srcImagePath, "M1302.png") !== false) || (strpos($srcImagePath, "M1390.png") !== false) || (strpos($srcImagePath, "M1550.png") !== false) || (strpos($srcImagePath, "M130.png") !== false) || (strpos($srcImagePath, "M241.png") !== false) || (strpos($srcImagePath, "M330.png") !== false) || (strpos($srcImagePath, "M331.png") !== false) || (strpos($srcImagePath, "M332.png") !== false) || (strpos($srcImagePath, "M790.png") !== false) || (strpos($srcImagePath, "M791.png") !== false) || (strpos($srcImagePath, "M792.png") !== false) || (strpos($srcImagePath, "M793.png") !== false) || (strpos($srcImagePath, "M1163.png") !== false) || (strpos($srcImagePath, "M1293.png") !== false) || (strpos($srcImagePath, "M1553.png") !== false) || (strpos($srcImagePath, "M340.png") !== false) || (strpos($srcImagePath, "M155.png") !== false) || (strpos($srcImagePath, "MADR") !== false)) {
            list($x, $y) = indexToCoords($index);
            $tileImg = imagecreatefrompng($srcImagePath);
            imagecopy($mapImage, $tileImg, $x, $y, 0, 0, $tileWidth, $tileHeight);
            imagedestroy($tileImg);
        }
    }
}
$thumbSize  = 500;
$thumbImage = imagecreatetruecolor($thumbSize, $thumbSize);
imagecopyresampled($thumbImage, $mapImage, 0, 0, 0, 0, $thumbSize, $thumbSize, $mapWidth, $mapHeight);
$result = imagerotate($thumbImage, 270, 0);
header("Content-type: image/png");
imagepng($result);
function fe($url)
{
    if (!@fopen($url, 'r'))
        return false;
    else
        return true;
}
if (!function_exists('ImageFlip')) {
    function ImageFlip($source_image)
    {
        $width  = imagesx($source_image);
        $height = imagesy($source_image);
        $dest   = imagecreatetruecolor($width, $height);
        $x      = $y = 0;
        for ($i = 0; $i < $width * $height; $i++) {
            if ($i % $height == 0) {
                $x = ($i / $height);
                $y = 0;
            }
            imagesetpixel($dest, $x, $height - $y - 1, imagecolorat($source_image, $x, $y));
            $y++;
        }
        return $dest;
    }
}
if (!function_exists('flipVertical')) {
    function flipVertical($img)
    {
        $size_x = imagesx($img);
        $size_y = imagesy($img);
        $temp   = imagecreatetruecolor($size_x, $size_y);
        $x      = imagecopyresampled($temp, $img, 0, 0, 0, ($size_y - 1), $size_x, $size_y, $size_x, 0 - $size_y);
        $img    = $temp;
        return $img;
    }
}
if (!function_exists('flipHorizontal')) {
    function flipHorizontal($img) 
    {
        $size_x = imagesx($img);
        $size_y = imagesy($img);
        $temp   = imagecreatetruecolor($size_x, $size_y);
        $x      = imagecopyresampled($temp, $img, 0, 0, ($size_x - 1), 0, $size_x, $size_y, 0 - $size_x, $size_y);
        $img    = $temp;
        return $img;
    }
}