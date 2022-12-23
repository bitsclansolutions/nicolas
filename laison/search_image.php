<?php
include('admin/connect.php');

$input = $_POST['input'];
$data = [];
$response = "";

if($input){
    $sql = <<<SQL
        SELECT i.id, i.name, i.is_symmetric, sc.id as 'sid', sc.name as 'subcat', c.id as 'cid', c.nom as 'cat'
        FROM images i
        JOIN sub_category sc
            ON i.sub_category_id = sc.id
        JOIN categories c
            ON sc.category_id = c.id
        WHERE i.name LIKE '%$input%'
        ORDER BY c.nom;
SQL;

    $result = $conn->query($sql);
    if($result){
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $id     = $row['id'];
                $img    = $row['name'];
                $arr    = explode('.', $row['name']);
                $name   = $arr[0];
                $subcat = $row['subcat'];
                $cat    = $row['cat'];
                $is_symmetric = $row['is_symmetric'];
                $data[] = ['id' => $id, 'img' => $img, 'name' => $name, 'subcat' => $subcat, 'cat' => $cat];
                $response .= <<<OUTPUT
                <li>
                    <a href='#' title="$cat">
                        <img data-is_symmetric="$is_symmetric" data-cat_name="$cat" data-img_id="$id" src="data/$cat/$subcat/$img" alt="$img" />
                    </a>
                    <h5 style="text-align: center; font-weight: 800;">$name</h5>
                </li>
OUTPUT;
                $response .= "";
            }
        } else {
            $response = ["error" => "No Image Found"];
        }
    } else {
        $response = ["error" => "Error in query => ".$sql.""];
    }
}

echo json_encode($response);
?>