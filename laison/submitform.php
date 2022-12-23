<?php

//print_r($_POST);
//die();

$response = "";

$email              = $_POST['email'];
$first_name         = $_POST['first_name'];
$last_name          = $_POST['last_name'];

$town               = $_POST['town'];
$society            = $_POST['society'];
$address            = $_POST['address'];
$country            = $_POST['country'];
$postal_code        = $_POST['postal_code'];
$telephone          = $_POST['telephone'];
$fax                = $_POST['fax'];

$pattern_amount     = $_POST['pattern_amount'];
$border_amount      = $_POST['border_amount'];
$inner_img          = $_POST['inner_img'];
$border_img         = $_POST['border_img'];
$output             = $_POST['output'];
$message            = $_POST['message'];

//$to = "alihamza.bitsclan@gmail.com";

//$html = <<<OUTPUT
//
//    <h1>Hi, $first_name $last_name</h1>
//    <p><b>Details:</b></p>
//    <p>Town: $town</p>
//    <p>Society: $society</p>
//    <p>Address: $address</p>
//    <p>Country: $country</p>
//    <p>Postal Code: $postal_code</p>
//    <p>Telephone: $telephone</p>
//    <p>Fax: $fax</p>
//    <img src="$inner_img" alt="Ground Image" width="100px">
//    <p>Ground Tile Amount: $pattern_amount</p>
//    <img src="$border_img" alt="Border Image" width="100px">
//    <p>Border Tile Amount: $border_amount</p>
//    <div id="devis-wrap" class="flex-1-box">$output</div>
//OUTPUT;


$html = "<h1>Hi, {$first_name} {$last_name}</h1>";
$html .= "<p><b>Details: Your Sumbitted Information:-</b></p>";
$html .= "<p><b>Town:</b> {$town}</p>";
$html .= "<p><b>Society:</b> {$society}</p>";
$html .= "<p><b>Address:</b> {$address}</p>";
$html .= "<p><b>Country:</b> {$country}</p>";
$html .= "<p><b>Postal:</b> {$postal_code}</p>";
$html .= "<p><b>Telephone:</b> {$telephone}</p>";
$html .= "<p><b>Fax:</b> {$fax}</p>";
$html .= "<img src='https://nicolas.bitsclansolutions.com/laison/{$inner_img}' alt='Ground Image' width='100px'>";
$html .= "<p>Ground Tile Amount: {$pattern_amount}</p>";
$html .= "<img src='https://nicolas.bitsclansolutions.com/laison/{$border_img}' alt='Ground Image' width='100px'>";
$html .= "<p>Border Tile Amount: {$border_amount}</p>";



$to = "nico.brault.13@gmail.com,{$email}";
$subject = "Form Submitted";
//$txt = "Your Response has been Submited We will contact you soon";
$headers = "Content-Type: text/html; charset=UTF-8\r\n";

$sendmail = mail($to, $subject, $html, $headers);

if($sendmail){
    $response = ['success' => 'Email Has Been Send'];
} else {
    $response = ['error' => 'Email not send'];
}
echo json_encode($response);
?>