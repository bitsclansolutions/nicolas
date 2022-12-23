<?php
session_start();

include('../gdm/GDMagic.php');

if($_GET['category'] == 'Bordure'){

    if(empty($_SESSION['border_color_img'])){
        $img = $_GET['img'];
        $_SESSION['border_color_img'] = $img;
    }
    else{
        $img = $_SESSION['border_color_img'];
    }

    if($_GET['corner'] == 'yes'){
        // IMAGE COLOR
        if (isset($_GET['coords'])) {
            $r = 1;
            $g = 1;
            $b = 1;
            $prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '#';

            if (!$_GET['coords'] or !strpos($_GET['coords'], ',')) die($prefix . '000000');

            $coords = explode(',', $_GET['coords']);
            $img = $_GET['img'];
            $img2 = $img;
            $ext = explode('.', $img);
            $ext = strtolower($ext[count($ext) - 1]); // png

            if ($ext == 'jpg' or $ext == 'jpeg') {
                $img = @imagecreatefromjpeg($img);
            } else if ($ext == 'gif') {
                $img = @imagecreatefromgif($img);
            } else if ($ext == 'png') {
                $img = @imagecreatefrompng($img);
            } else {
                die($prefix . '000000');
            }

            if (!$img) die($prefix . '000000');

            $imgW = imagesx($img); // int(230)
            $imgH = imagesy($img); // Int(230)
            $range = 10;
            while (abs($range) % 2 != 0) $range--;
            if ($range < 0) $range = 0;
            $range /= 2;

            for ($n = -$range; $n <= $range; $n++) {
                for ($m = -$range; $m <= $range; $m++) {
                    $x = $coords[0] + $m;
                    $x = $x > $imgW ? $imgW : $x < 0 ? 0 : $x;
                    $y = $coords[1] + $n;
                    $y = $y > $imgH ? $imgH : $y < 0 ? 0 : $y;
                    $rgb = imagecolorat($img, $x, $y);
                    $rgb = imagecolorsforindex($img, $rgb);
                    $r += $rgb['red'] & 0xFF;
                    $g += $rgb['green'] & 0xFF;
                    $b += $rgb['blue'] & 0xFF;
                }
            }
            $r = dechex($r / pow($range * 2 + 1, 2));
            $g = dechex($g / pow($range * 2 + 1, 2));
            $b = dechex($b / pow($range * 2 + 1, 2));


            // COLOR REPLACE CODE
            $gdmagic = new GDMagic($img);
            $cl = $prefix . ((strlen($r) < 2) ? '0' . $r : $r) .
                ((strlen($g) < 2) ? '0' . $g : $g) .
                ((strlen($b) < 2) ? '0' . $b : $b);
            $org = hex2rgb($cl);
            $rpc = hex2rgb($_GET['color']);

            $gdmagic->replacecolor(array($org['r'], $org['g'], $org['b']), array($rpc['r'], $rpc['g'], $rpc['b']));

            $srcImagePath = $img2;
            $name = uniqid(date("dd"));
            /*
             * Here: Image Create
             * ------------------
             * */
            imagepng($img, 'tmp/' . $name . '.png');
            imagedestroy($img);

        }
        echo json_encode(['status' => 'corner', 'image' => $name]);
    }
    else{
        // IMAGE COLOR
        if (isset($_GET['coords'])) {
            $r = 1;
            $g = 1;
            $b = 1;
            $prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '#';

            if (!$_GET['coords'] or !strpos($_GET['coords'], ',')) die($prefix . '000000');

            $coords = explode(',', $_GET['coords']);
            $img = $_GET['img'];
            $img2 = $img;
            $ext = explode('.', $img);
            $ext = strtolower($ext[count($ext) - 1]); // png

            if ($ext == 'jpg' or $ext == 'jpeg') {
                $img = @imagecreatefromjpeg($img);
            } else if ($ext == 'gif') {
                $img = @imagecreatefromgif($img);
            } else if ($ext == 'png') {
                $img = @imagecreatefrompng($img);
            } else {
                die($prefix . '000000');
            }

            if (!$img) die($prefix . '000000');

            $imgW = imagesx($img); // int(230)
            $imgH = imagesy($img); // Int(230)
            $range = 10;
            while (abs($range) % 2 != 0) $range--;
            if ($range < 0) $range = 0;
            $range /= 2;

            for ($n = -$range; $n <= $range; $n++) {
                for ($m = -$range; $m <= $range; $m++) {
                    $x = $coords[0] + $m;
                    $x = $x > $imgW ? $imgW : $x < 0 ? 0 : $x;
                    $y = $coords[1] + $n;
                    $y = $y > $imgH ? $imgH : $y < 0 ? 0 : $y;
                    $rgb = imagecolorat($img, $x, $y);
                    $rgb = imagecolorsforindex($img, $rgb);
                    $r += $rgb['red'] & 0xFF;
                    $g += $rgb['green'] & 0xFF;
                    $b += $rgb['blue'] & 0xFF;
                }
            }
            $r = dechex($r / pow($range * 2 + 1, 2));
            $g = dechex($g / pow($range * 2 + 1, 2));
            $b = dechex($b / pow($range * 2 + 1, 2));


            // COLOR REPLACE CODE
            $gdmagic = new GDMagic($img);
            $cl = $prefix . ((strlen($r) < 2) ? '0' . $r : $r) .
                ((strlen($g) < 2) ? '0' . $g : $g) .
                ((strlen($b) < 2) ? '0' . $b : $b);
            $org = hex2rgb($cl);
            $rpc = hex2rgb($_GET['color']);

            $gdmagic->replacecolor(array($org['r'], $org['g'], $org['b']), array($rpc['r'], $rpc['g'], $rpc['b']));

            $srcImagePath = $img2;
            $name = uniqid(date("dd"));
            /*
             * Here: Image Create
             * ------------------
             * */
            imagepng($img, 'tmp/' . $name . '.png');
            imagedestroy($img);

        }
        echo json_encode(['status' => 'border', 'image' => $name]);
    }
}
else {
    if (isset($_GET['coords'])) {
        $r = 1;
        $g = 1;
        $b = 1;
        $prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '#';

        if (!$_GET['coords'] or !strpos($_GET['coords'], ',')) die($prefix . '000000');

        $coords = explode(',', $_GET['coords']);
        $img = $_GET['img'];
        $img2 = $img;
        $ext = explode('.', $img);
        $ext = strtolower($ext[count($ext) - 1]); // png

        if ($ext == 'jpg' or $ext == 'jpeg') {
            $img = @imagecreatefromjpeg($img);
        } else if ($ext == 'gif') {
            $img = @imagecreatefromgif($img);
        } else if ($ext == 'png') {
            $img = @imagecreatefrompng($img);
        } else {
            die($prefix . '000000');
        }

        if (!$img) die($prefix . '000000');

        $imgW = imagesx($img); // int(230)
        $imgH = imagesy($img); // Int(230)
        $range = 10;
        while (abs($range) % 2 != 0) $range--;
        if ($range < 0) $range = 0;
        $range /= 2;

        for ($n = -$range; $n <= $range; $n++) {
            for ($m = -$range; $m <= $range; $m++) {
                $x = $coords[0] + $m;
                $x = $x > $imgW ? $imgW : $x < 0 ? 0 : $x;
                $y = $coords[1] + $n;
                $y = $y > $imgH ? $imgH : $y < 0 ? 0 : $y;
                $rgb = imagecolorat($img, $x, $y);
                $rgb = imagecolorsforindex($img, $rgb);
                $r += $rgb['red'] & 0xFF;
                $g += $rgb['green'] & 0xFF;
                $b += $rgb['blue'] & 0xFF;
            }
        }
        $r = dechex($r / pow($range * 2 + 1, 2));
        $g = dechex($g / pow($range * 2 + 1, 2));
        $b = dechex($b / pow($range * 2 + 1, 2));
    }

    // COLOR REPLACE CODE
    $gdmagic = new GDMagic($img);
    $cl = $prefix . ((strlen($r) < 2) ? '0' . $r : $r) .
        ((strlen($g) < 2) ? '0' . $g : $g) .
        ((strlen($b) < 2) ? '0' . $b : $b);
    $org = hex2rgb($cl);
    $rpc = hex2rgb($_GET['color']);

    $gdmagic->replacecolor(array($org['r'], $org['g'], $org['b']), array($rpc['r'], $rpc['g'], $rpc['b']));

    $srcImagePath = $img2;
    $name = uniqid(date("dd"));
    /*
     * Here: Image Create
     * ------------------
     * */
    imagepng($img, 'tmp/' . $name . '.png');
    imagedestroy($img);

    echo json_encode(['status' => 'inner', 'image' => $name]);
}

function hex2rgb($hex)
{
    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = array('r' => $r, 'g' => $g, 'b' => $b);
    //return implode(",", $rgb); // returns the rgb values separated by commas
    return $rgb; // returns an array with the rgb values
}