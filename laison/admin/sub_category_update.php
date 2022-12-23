<?php 
include('connect.php');
$id = $_POST['id'];
$category_id = $_POST['category_id'];
$sub_category_name = $_POST['sub_category_name'];
$response="";
$previous_name = "";
$category_name = "";

$sql = "SELECT * from sub_category where (`name` = '$sub_category_name' AND `id` <> '$id')";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "SELECT A.nom as category_name , B.name as sub_category_name FROM categories A ,sub_category B where B.id = '$id' AND A.id = B.category_id";
    $result = $conn->query($sql);
    if ($result) {
        $data = $result->fetch_assoc();
        $category_name = $data['category_name'];
        $previous_name = $data['sub_category_name'];
        $sql = "UPDATE sub_category SET `name`='$sub_category_name' , `category_id` = '$category_id' WHERE id = '$id' LIMIT 1";
        $result = $conn->query($sql);
        if ($result) {
            if (rename("../data/".$category_name."/".$previous_name, "../data/".$category_name."/".$sub_category_name)) {
                $response = ["success" => "Category Name Updated Successfully"];
            } else {
                $response = ["error" => "Category Folder Name Not Updated"];
            }
        } else {
            $response = ["error" => "Category Name Not Updated"];
        }
    } else {
        $response = ["error" => "Category and sub category Name Not Found"];
    }
} else {
    $response = ["error" => "Category Name Is already taken Choose Different"];
}

echo json_encode($response);
?>