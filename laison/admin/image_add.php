<?php
include('connect.php');

$category_id = $_POST['category'];
$sub_category_id = $_POST['sub_category'];
$is_symmetric = $_POST['is_symmetric'];

//echo var_dump($is_symmetric);
//die();

$response = "";
$target_dir = "";

$image_name = strtolower(preg_replace('/\s+/', '_', trim($_POST['image_name']))); // user provided filename

$filename = $_FILES['img']['name']; // original filename
$dimension = getimagesize($_FILES["img"]["tmp_name"]); // $_FILES["img"]["tmp_name"] => /Applications/MAMP/tmp/php/phpYPzK86
$ext = pathinfo($filename, PATHINFO_EXTENSION); // png
$db_image_name = $image_name.".".$ext; // file.png

//print_r($ext);
//die();

if($category_id == 3){
    // ROTATE Borders
    $border_top       = $image_name . '_top.' . $ext; // img_top.png
    $border_left      = $image_name . '_left.' . $ext; // img_left.png
    $border_right     = $image_name . '_right.' . $ext; // img_right.png
    $border_bottom    = $image_name . '_bottom.' . $ext; // img_bottom.png

    $border_tile              = imagecreatefrompng($_FILES["img"]["tmp_name"]);

    $border_top_img           = imagerotate($border_tile, 180, 0);
    $border_top_path          = "../data/rotate/" . $border_top;
    imagepng($border_top_img, $border_top_path);

    $border_left_img           = imagerotate($border_tile, 270, 0);
    $border_left_path          = "../data/rotate/" . $border_left;
    imagepng($border_left_img, $border_left_path);

    $border_right_img           = imagerotate($border_tile, 90, 0);
    $border_right_path          = "../data/rotate/" . $border_right;
    imagepng($border_right_img, $border_right_path);

    $border_bottom_img           = imagerotate($border_tile, 0, 0);
    $border_bottom_path          = "../data/rotate/" . $border_bottom;
    imagepng($border_bottom_img, $border_bottom_path);
}

$corner_file = false;
if(file_exists($_FILES['corner_img']['tmp_name'][0])) {
    $corner_file = true;

    $corner_filename       = $_FILES['corner_img']['name']; // org_name
    $corner_ext            = pathinfo($corner_filename, PATHINFO_EXTENSION); // png

    $corner_tl     = $image_name . '_tl.' . $corner_ext; // img_tl.png
    $corner_tr     = $image_name . '_tr.' . $corner_ext; // img_tr.png
    $corner_bl     = $image_name . '_bl.' . $corner_ext; // img_bl.png
    $corner_br     = $image_name . '_br.' . $corner_ext; // img_br.png

    $corner_tile   = imagecreatefrompng($_FILES["corner_img"]["tmp_name"]);

    $top_left               = imagerotate($corner_tile, 0, 0);
    $top_left_path          = "../data/corner/" . $corner_tl;
    imagepng($top_left, $top_left_path);

    $top_right              = imagerotate($corner_tile, 270, 0);
    $top_right_path         = "../data/corner/" . $corner_tr;
    imagepng($top_right, $top_right_path);

    $bottom_left            = imagerotate($corner_tile, 90, 0);
    $bottom_left_path       = "../data/corner/" . $corner_bl;
    imagepng($bottom_left, $bottom_left_path);


    $bottom_right           = imagerotate($corner_tile, 180, 0);
    $bottom_right_path      = "../data/corner/" . $corner_br;
    imagepng($bottom_right, $bottom_right_path);
}


if ($dimension['mime'] != 'image/png') {
    $response = ['error' => 'Enter PNG Image'];
} else {
    $sql = "SELECT * FROM images WHERE `name` = '$db_image_name' AND  `sub_category_id`= '$sub_category_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "SELECT A.nom as category_name , B.name as sub_category_name FROM categories A ,sub_category B where B.id = '$sub_category_id' AND A.id = B.category_id";
        $result = $conn->query($sql);
        if ($result) {
            $data = $result->fetch_assoc();
            $category_name = $data['category_name'];
            $sub_category_name = $data['sub_category_name'];
            $target_dir = "../data/".$category_name."/".$sub_category_name."/".$db_image_name;
            if($is_symmetric){
                $sql = "INSERT INTO `images` (`id`, `name`, `is_symmetric`, `sub_category_id`) VALUES (NULL, '$db_image_name', 1, '$sub_category_id')";
            }
            else{
                $sql = "INSERT INTO `images` (`id`, `name`, `is_symmetric`, `sub_category_id`) VALUES (NULL, '$db_image_name', 0, '$sub_category_id')";
            }
            $result = $conn->query($sql);
            if ($result) {
                $uploaded_to_dir = move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir);
                if ($uploaded_to_dir) {
                    $response = ['success' => 'Image Uploaded Successfully'];
                } else {
                    $response = ['error' => 'Image not Uploaded Successfully'];
                }
            } else {
                $response = ['error' => 'Image not inserted in Database'];
            }
        } else {
            $response = ["error" => "Category and Sub Category Name not get"];
        }
    } else {
        $response = ["error" => "Image name already Taken"];
    }    
}
echo json_encode($response);
?>