<?php
include('connect.php');
$id = $_POST['id'];
$response = "";
$category_name = "";

$sql = "SELECT * FROM sub_category where category_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = $conn->query($sql);
    if($result){
        $data = $result->fetch_assoc();
        $category_name = $data['nom'];
        $sql = "DELETE FROM categories WHERE id = '$id' LIMIT 1";
        $result = $conn->query($sql);
        if($result) {
            if(rmdir("../data/".$category_name)) {
                $response = ["success" => "Category Deleted Successfully"];
            } else {
                $response = ["error" => "Category Folder not Deleted Successfully"];
            }
        } else {
            $response = ["error" => "Category not Deleted Successfully"];
        }
    } else {
        $response = ["error" => "Category Name Not Get"];
    }
    
} else {
    $response = ["error" => "Sub Categories Present Against this Delete Them First"];
}

echo json_encode($response);
?>