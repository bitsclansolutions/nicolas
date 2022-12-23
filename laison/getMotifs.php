<?php
$category_id = $_POST['category'];
$sub_category_id = $_POST['subCategory'];
$response = "";

include('admin/connect.php');

$sql = "SELECT A.id as img_id, A.name as image_name, A.is_symmetric, B.name as sub_category_name , C.nom as category_name FROM images A ,sub_category B, categories C WHERE A.sub_category_id = '$sub_category_id' AND A.sub_category_id = B.id AND B.category_id = C.id";
$result = $conn->query($sql);
if($result){
	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
            $arr = explode('.', $row['image_name']);
            $image_name = $arr[0];
			$response .= "<li><a href='#'><img data-img_id='" . $row['img_id'] . "' data-is_symmetric='" . $row['is_symmetric'] . "' data-cat_name='". $row['category_name'] ."' src='data/".$row['category_name']."/".$row['sub_category_name']."/".$row['image_name']."' alt='".$row['image_name']."' /></a><h5 style='text-align: center; font-weight: 800;'>". $image_name ."</h5></li>";
		}
	} else {
		$response = ["error" => "No Image Found"];
	}
} else {
	$response = ["error" => "Error in query => ".$sql.""];
}

echo json_encode($response);
?>