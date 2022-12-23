<?php 
include('connect.php');
$id = $_POST['id'];
$category_name = $_POST['category_name'];
$response="";
$previous_name = "";

$sql = "SELECT * from categories where (`nom` = '$category_name' AND `id` <> '$id')";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "SELECT * from categories where `id` = '$id'";
    $result = $conn->query($sql);
    if($result){
        $data = $result->fetch_assoc();
        $previous_name = $data['nom'];
        $sql = "UPDATE categories SET `nom`='$category_name' WHERE id = '$id' LIMIT 1";
        $result = $conn->query($sql);
        if($result) {
            if(rename("../data/".$previous_name , "../data/".$category_name)){
                $response = ["success" => "Category Name Updated Successfully"];
            } else {
                $response = ["error" => "Category Folder Name Not Updated"];
            }
        } else {
            $response = ["error" => "Category Name Not Updated"];
        }
    } else {
        $response = ["error" => "Category Name Not Get"];
    }
} else {
    $response = ["error" => "Category Name Is already taken Choose Different"];
}

echo json_encode($response);
?>