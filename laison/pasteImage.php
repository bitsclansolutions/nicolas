<?php
session_start();

include('admin/connect.php');

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$response = "";

$border_img     = $_SESSION['border_image'];
$inner_img      = $_SESSION['inner_image'];
$border_img_id  = $_SESSION['border_img_id'];

$image_path     = $_GET['img'];
$corner_path    = $_GET['corner_img'];
$category_name  = $_GET['cat_name'];
$format         = $_GET['format'];
$img_id         = $_GET['img_id'];


if($category_name == 'Bordure'){
    $is_symmetric = $_SESSION['is_symmetric'];
}
else{
    $is_symmetric = $_GET['is_symmetric'];
}

$loop           = 10;
$size           = 'width: 59px;';
$border_size    = $size;


//echo $border_img . '<br>';
//echo $border_img_id . '<br>';
//echo $img_id . '<br>';
//echo var_dump($is_symmetric);
//die();


if($format == '10x10')
{
    $size        = 'width: 30px;';
    $border_size = $size;
    $loop        = 20;
}

if($category_name == 'Bordure' &&  strpos($image_path, 'tmp') !== false){

// Rotate Border
    $border_path             = $image_path;
    $border_tile             = imagecreatefrompng($border_path);

    $border_top_img          = imagerotate($border_tile, 180, 0);
    $border_top              = "tmp/".random_string(10).".png";
    imagepng($border_top_img, $border_top);

    $border_right_img        = imagerotate($border_tile, 90, 0);
    $border_right            = "tmp/".random_string(10).".png";
    imagepng($border_right_img, $border_right);

    $border_left_img         = imagerotate($border_tile, 270, 0);
    $border_left             = "tmp/".random_string(10).".png";
    imagepng($border_left_img, $border_left);

    $border_bottom           = $border_path;

//  Corner Logic
    if(!empty($corner_path)){
        $corner_tile            = imagecreatefrompng($corner_path);

        $top_left               = imagerotate($corner_tile, 0, 0);
        $corner_tl              = "tmp/".random_string(10).".png";
        imagepng($top_left, $corner_tl);

        $top_right              = imagerotate($corner_tile, 270, 0);
        $corner_tr              = "tmp/".random_string(10).".png";
        imagepng($top_right, $corner_tr);

        $bottom_left            = imagerotate($corner_tile, 90, 0);
        $corner_bl              = "tmp/".random_string(10).".png";
        imagepng($bottom_left, $corner_bl);

        $bottom_right           = imagerotate($corner_tile, 180, 0);
        $corner_br              = "tmp/".random_string(10).".png";
        imagepng($bottom_right, $corner_br);

    }
    else{
        $sql = <<<SQL
        SELECT name
        FROM images
        WHERE id = $img_id;
SQL;
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $border_name = $row['name'];

        $img_name = explode('.', $border_name)[0];
        $corner_tl = "data/corner/{$img_name}_tl.png";
        $corner_tr = "data/corner/{$img_name}_tr.png";
        $corner_bl = "data/corner/{$img_name}_bl.png";
        $corner_br = "data/corner/{$img_name}_br.png";
    }



    /*$border_top = "data/rotate/{$img_name}_top.png";
    $border_bottom = "data/rotate/{$img_name}_bottom.png";
    $border_left = "data/rotate/{$img_name}_left.png";
    $border_right = "data/rotate/{$img_name}_right.png";*/

}
else if($category_name != 'Bordure' &&  strpos($border_img, 'tmp') !== false){

    $border_top = $_SESSION["border_top"];
    $border_bottom = $_SESSION["border_bottom"];
    $border_left = $_SESSION["border_left"];
    $border_right = $_SESSION["border_right"];
    $corner_tl = $_SESSION["corner_tl"];
    $corner_tr = $_SESSION["corner_tr"];
    $corner_bl = $_SESSION["corner_bl"];
    $corner_br = $_SESSION["corner_br"];

}
else if($category_name == 'Bordure' && $_GET['corner'] == 'yes'){

    $border_path             = $image_path;
    $border_tile             = imagecreatefrompng($border_path);

    $border_top_img          = imagerotate($border_tile, 180, 0);
    $border_top              = "tmp/".random_string(10).".png";
    imagepng($border_top_img, $border_top);

    $border_right_img        = imagerotate($border_tile, 90, 0);
    $border_right            = "tmp/".random_string(10).".png";
    imagepng($border_right_img, $border_right);

    $border_left_img         = imagerotate($border_tile, 270, 0);
    $border_left             = "tmp/".random_string(10).".png";
    imagepng($border_left_img, $border_left);

    $border_bottom           = $border_path;

    $corner_tile            = imagecreatefrompng($corner_path);

    $top_left               = imagerotate($corner_tile, 0, 0);
    $corner_tl              = "tmp/".random_string(10).".png";
    imagepng($top_left, $corner_tl);

    $top_right              = imagerotate($corner_tile, 270, 0);
    $corner_tr              = "tmp/".random_string(10).".png";
    imagepng($top_right, $corner_tr);

    $bottom_left            = imagerotate($corner_tile, 90, 0);
    $corner_bl              = "tmp/".random_string(10).".png";
    imagepng($bottom_left, $corner_bl);

    $bottom_right           = imagerotate($corner_tile, 180, 0);
    $corner_br              = "tmp/".random_string(10).".png";
    imagepng($bottom_right, $corner_br);
}
else if($category_name == 'Bordure'){
    $sql = <<<SQL
        SELECT name
        FROM images
        WHERE id = $img_id;
SQL;

    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $border_name = $row['name'];

    $img_name = explode('.', $border_name)[0];
    $corner_tl = "data/corner/{$img_name}_tl.png";
    $corner_tr = "data/corner/{$img_name}_tr.png";
    $corner_bl = "data/corner/{$img_name}_bl.png";
    $corner_br = "data/corner/{$img_name}_br.png";

    $border_top = "data/rotate/{$img_name}_top.png";
    $border_bottom = "data/rotate/{$img_name}_bottom.png";
    $border_left = "data/rotate/{$img_name}_left.png";
    $border_right = "data/rotate/{$img_name}_right.png";
}
else{
    if($border_img_id){
        $sql = <<<SQL
        SELECT name
        FROM images
        WHERE id = $border_img_id;
SQL;
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $border_name = $row['name'];

        $img_name = explode('.', $border_name)[0];
        $corner_tl = "data/corner/{$img_name}_tl.png";
        $corner_tr = "data/corner/{$img_name}_tr.png";
        $corner_bl = "data/corner/{$img_name}_bl.png";
        $corner_br = "data/corner/{$img_name}_br.png";

        $border_top = "data/rotate/{$img_name}_top.png";
        $border_bottom = "data/rotate/{$img_name}_bottom.png";
        $border_left = "data/rotate/{$img_name}_left.png";
        $border_right = "data/rotate/{$img_name}_right.png";
    }
    else{
        $sql = <<<SQL
        SELECT name
        FROM images
        WHERE id = $img_id;
SQL;
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $border_name = $row['name'];

        $img_name = explode('.', $border_name)[0];
        $corner_tl = "data/corner/{$img_name}_tl.png";
        $corner_tr = "data/corner/{$img_name}_tr.png";
        $corner_bl = "data/corner/{$img_name}_bl.png";
        $corner_br = "data/corner/{$img_name}_br.png";

        $border_top = "data/rotate/{$img_name}_top.png";
        $border_bottom = "data/rotate/{$img_name}_bottom.png";
        $border_left = "data/rotate/{$img_name}_left.png";
        $border_right = "data/rotate/{$img_name}_right.png";
    }
}

if(!$is_symmetric){

    if($category_name == 'Bordure'){
        $base_img = $inner_img;
    }
    else{
        $base_img = $image_path;
    }

    $img_tile                = imagecreatefrompng($base_img);
    $tmp_img                 = imagerotate($img_tile, -90, 0);
    $tmp_path                = "tmp/m90-".random_string(10).".png";
    imagepng($tmp_img, $tmp_path);
    $img_rotate_m90 = $tmp_path;

    $img_tile                = imagecreatefrompng($base_img);
    $tmp_img                 = imagerotate($img_tile, 90, 0);
    $tmp_path                = "tmp/90-".random_string(10).".png";
    imagepng($tmp_img, $tmp_path);
    $img_rotate_90 = $tmp_path;

    $img_tile                = imagecreatefrompng($base_img);
    $tmp_img                 = imagerotate($img_tile, 180, 0);
    $tmp_path                = "tmp/180-".random_string(10).".png";
    imagepng($tmp_img, $tmp_path);
    $img_rotate_180 = $tmp_path;
}

/*else if($format == 'Hexagonal'){
    $size .= ' clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%); Overflow: hidden;';
}
else if($format == 'Octagonal'){
    $size .= ' clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%); Overflow: hidden;';
}*/



    // FIRST ROW
    $response .= "<table>";

    $response .= "<tr>";
    for($i=0;$i<$loop+2;$i++) {
        $response .= "<td>";
        if($category_name == "Bordure") {
            if($i == 0){
                $response .= "<img  style='" .$border_size. "' src='".$corner_tl."' alt='IMAGE' />";
            }
            else if($i == $loop+1){
                $response .= "<img  style='" .$border_size. "' src='".$corner_tr."' alt='IMAGE' />";
            }
            else{
                $response .= "<img  style='" .$border_size. "' src='".$border_top."' alt='IMAGE' />";
            }
        }
        else {
            // if border already added
            if(!empty($border_img)){
                if($i == 0){
                    $response .= "<img  style='" .$border_size. "' src='".$corner_tl."' alt='IMAGE' />";
                }
                else if($i == $loop+1){
                    $response .= "<img  style='" .$border_size. "' src='".$corner_tr."' alt='IMAGE' />";
                }
                else{
                    $response .= "<img  style='" .$border_size. "' src='".$border_top."' alt='IMAGE' />";
                }
            }
            else{
                $response .= "<img  style='" .$border_size. "' src='border.png' alt='IMAGE' />";
            }
        }
        $response .= "</td>";
    }
    $response .= "</tr>";

// INNER ROWS
    for ($i=0; $i<$loop; $i++) {
        // Row Start
        $response .= "<tr>";
        // BORDER IMAGE
        $response .= "<td>";
        if($category_name == "Bordure") {
            $response .= "<img  style='" .$border_size. "' src='".$border_left."' alt='IMAGE' />";
        }
        else {
            // if border already added
            if(!empty($border_img)){
                $response .= "<img  style='" .$border_size. "' src='".$border_left."' alt='IMAGE' />";
            }
            else{
                $response .= "<img  style='" .$border_size. "' src='border.png' alt='IMAGE' />";
            }
        }
        $response .= "</td>";

        // INNER IMAGE
        for ($j=0; $j<$loop; $j++) {
            if($category_name == 'Bordure'){
                // If inner_image added
                if(!empty($inner_img)){
                    if($is_symmetric){
                        $response .= "<td>";
                        $response .= "<img style='" .$size. "' src='".$inner_img."' alt='IMAGE' />";
                        $response .= "</td>";
                    }
                    else{
                        if($i % 2 == 0){
                            if($j % 2 == 0){
                                $response .= "<td>";
                                $response .= "<img style='" .$size. "' src='".$base_img."' alt='IMAGE' />";
                                $response .= "</td>";
                            }
                            else{
                                $response .= "<td>";
                                $response .= "<img style='" .$size. "' src='".$img_rotate_m90."' alt='IMAGE' />";
                                $response .= "</td>";
                            }
                        }
                        else{
                            if($j % 2 == 0){
                                $response .= "<td>";
                                $response .= "<img style='" .$size. "' src='".$img_rotate_90."' alt='IMAGE' />";
                                $response .= "</td>";
                            }
                            else{
                                $response .= "<td>";
                                $response .= "<img style='" .$size. "' src='".$img_rotate_180."' alt='IMAGE' />";
                                $response .= "</td>";
                            }
                        }
                    }
                }
                else{
                    $response .= "<td>";
                    $response .= "<img style='" .$size. "' src='border2.png' alt='IMAGE' />";
                    $response .= "</td>";
                }
            }
            else{
                if($is_symmetric){
                    $response .= "<td>";
                    $response .= "<img style='" .$size. "' src='".$image_path."' alt='IMAGE' />";
                    $response .= "</td>";
                }
                else{
                    if($i % 2 == 0){
                        if($j % 2 == 0){
                            $response .= "<td>";
                            $response .= "<img style='" .$size. "' src='".$base_img."' alt='IMAGE' />";
                            $response .= "</td>";
                        }
                        else{
                            $response .= "<td>";
                            $response .= "<img style='" .$size. "' src='".$img_rotate_m90."' alt='IMAGE' />";
                            $response .= "</td>";
                        }
                    }
                    else{
                        if($j % 2 == 0){
                            $response .= "<td>";
                            $response .= "<img style='" .$size. "' src='".$img_rotate_90."' alt='IMAGE' />";
                            $response .= "</td>";
                        }
                        else{
                            $response .= "<td>";
                            $response .= "<img style='" .$size. "' src='".$img_rotate_180."' alt='IMAGE' />";
                            $response .= "</td>";
                        }
                    }
                }
            }
        }

        // BORDER IMAGE
        $response .= "<td>";
        if($category_name == "Bordure") {
            $response .= "<img style='" .$border_size. "' src='".$border_right."' alt='IMAGE' />";
        }
        else {
            // if border already added
            if(!empty($border_img)){
                $response .= "<img style='" .$border_size. "' src='".$border_right."' alt='IMAGE' />";
            }
            else{
                $response .= "<img style='" .$border_size. "' src='border.png' alt='IMAGE' />";
            }
        }
        $response .= "</td>";
        // ROW END
        $response .= "</tr>";
    }

// LAST ROW
    $response .= "<tr>";
    for($i=0;$i<$loop+2;$i++) {
        $response .= "<td>";
        if($category_name == "Bordure") {
            if($i == 0){
                $response .= "<img  style='" .$border_size. "' src='".$corner_bl."' alt='IMAGE' />";
            }
            else if($i == $loop+1){
                $response .= "<img  style='" .$border_size. "' src='".$corner_br."' alt='IMAGE' />";
            }
            else{
                $response .= "<img  style='" .$border_size. "' src='".$border_bottom."' alt='IMAGE' />";
            }
        }
        else {
            // if border already added
            if(!empty($border_img)){
                if($i == 0){
                    $response .= "<img  style='" .$border_size. "' src='".$corner_bl."' alt='IMAGE' />";
                }
                else if($i == $loop+1){
                    $response .= "<img  style='" .$border_size. "' src='".$corner_br."' alt='IMAGE' />";
                }
                else{
                    $response .= "<img  style='" .$border_size. "' src='".$border_bottom."' alt='IMAGE' />";
                }
            }
            else{
                $response .= "<img style='" .$border_size. "' src='border.png' alt='IMAGE' />";
            }
        }
        $response .= "</td>";
    }
    $response .= "</tr>";


    if($category_name == 'Bordure') {
        $_SESSION['border_image'] = $image_path;
        $_SESSION['border_img_id'] = $img_id;
        $_SESSION["border_top"] = $border_top;
        $_SESSION["border_bottom"] = $border_bottom;
        $_SESSION["border_left"] = $border_left;
        $_SESSION["border_right"] = $border_right;
        $_SESSION["corner_tl"] = $corner_tl;
        $_SESSION["corner_tr"] = $corner_tr;
        $_SESSION["corner_bl"] = $corner_bl;
        $_SESSION["corner_br"] = $corner_br;
    }
    else{
        $_SESSION['inner_image'] = $image_path;
        $_SESSION['is_symmetric'] = $is_symmetric;
    }

    echo json_encode($response);
?>