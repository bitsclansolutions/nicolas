<?php 
include('connect.php');

$id = $_POST['id'];
$link = "";

$sql = "SELECT A.id as image_id , A.name as image_name , B.name as sub_category_name , C.nom as category_name FROM images A , sub_category B , categories C where A.id = '$id' AND A.sub_category_id = B.id AND B.category_id = C.id";
$result = $conn->query($sql);
if($result) {
    $row = $result->fetch_assoc();
    $link .= "../data/".$row['category_name']."/".$row['sub_category_name']."/";
    $sql = "DELETE FROM images WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    if($result) {
        if(unlink($link.$row['image_name'])) {
            $response = ["success" => "Image Deleted Successfully"];
        } else {
            $response = ["error" => "Image File not Deleted Successfully"];
        }
    } else {
        $response = ["error" => "Image not Deleted Successfully"];
    }
} else {
    $response = ["error" => "Category and Sub Category not Found"];
}

echo json_encode($response);
?>