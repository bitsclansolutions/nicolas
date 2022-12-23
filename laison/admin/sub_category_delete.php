<?php
include('connect.php');
$id = $_POST['id'];
$response = "";
$category_name = "";
$sub_category_name = "";

$sql = "SELECT * FROM images where sub_category_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "SELECT A.nom as category_name , B.name as sub_category_name FROM categories A ,sub_category B where B.id = '$id' AND A.id = B.category_id";
    $result = $conn->query($sql);
    if($result) {
        $data = $result->fetch_assoc();
        $category_name = $data['category_name'];
        $sub_category_name = $data['sub_category_name'];
        $sql = "DELETE FROM sub_category WHERE id = '$id' LIMIT 1";
        $result = $conn->query($sql);
        if($result) {
            if(rmdir("../data/".$category_name."/".$sub_category_name)) {
                $response = ["success" => "Sub Category Deleted Successfully"];
            } else {
                $response = ["error" => "Sub Category Folder not Deleted Successfully"];
            }
        } else {
            $response = ["error" => "Sub Category not Deleted Successfully"];
        }
    } else {
        $response = ["error" => "Sub Category Name Not Get"];
    }
    
} else {
    $response = ["error" => "Image Present Against this Delete Them First"];
}

echo json_encode($response);
?>