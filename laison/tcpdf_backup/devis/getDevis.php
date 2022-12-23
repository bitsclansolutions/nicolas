<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(null);
$pdf->SetAuthor('');
$pdf->SetTitle('Demande de devis');
$pdf->SetSubject('');
$pdf->SetKeywords('');


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$namprenom=$_POST['namprenom'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$adress=$_POST['adress'];
$metres=$_POST['metres'];
$refcum=$_POST['refcum'];
$refcub=$_POST['refcub'];
$message=$_POST['message'];
$motifr=$_POST['motifr'];
$borderr=$_POST['borderr'];
$motifimg=$_POST['motifimg'];
$borderimg=$_POST['borderimg'];
$motifrs= str_replace('supprimer', ' ', $motifr);
$borderrs= str_replace('supprimer', ' ', $borderr);
// Set some content to print
$html = <<<EOD
<h1>Demande de devis</h1>
<table width="800px" border="1px"><tbody>
<tr><td><h4>Nom/Prenom</h4></td><td>$namprenom</td></tr>
<tr><td><h4>Email</h4></td><td>$email</td></tr>
<tr><td><h4>Tel</h4> </td><td> $tel</td></tr>
<tr><td><h4>Adresse</h4> </td><td> $adress</td></tr>
<tr><td><h4>Metres carrés M²</h4> </td><td>$metres </td></tr>
<tr><td><h4>References couleurs utilisées pour le motif</h4> </td><td>$motifrs </td></tr>
<tr><td><h4>References couleurs utilisées pour la bordure</h4> </td><td>$borderrs </td></tr>
<tr><td><h4>Message</h4> </td><td> $message</td></tr>
<tr><td><h4>Image motif</h4> </td><td> <img src="../../$motifimg" width="230" height="230"/></td></tr>
<tr><td><h4>Image bordure</h4></td><td> <img src="../../$borderimg" width="230" height="230"/></td></tr>
</tbody></table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, 0, true, 0);
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$name=uniqid(date());
$pdf->Output('../../devis/'.$name.'.pdf', 'F');
 $att = $_POST['ifct'];
$arratt=array();
 if ($att!=null && $att!='') {
  $arratt= explode('QWER7', $att);
 }
  $p=0;
    $pg='';
       foreach ($arratt as $value) {
        if ($value!='undefined') {
         $p++;
   $pg=$pg.' PJ'.$p.': '.$value;
        }


      }
 require_once '../../swift/lib/swift_required.php';

    // Create the Transport
    $transport = Swift_MailTransport::newInstance();
    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    // Create a message
    /*$message = Swift_Message::newInstance('Demande de devis')
      ->setFrom(array('mohammed.acherrat@gmail.com' => $namprenom))
      ->setTo(array('info@cimenterie-de-la-tour.com'))
      ->setBody('Ci-joint vous trouverez une nouvelle demande de devis<br/>PJ: '.$pg)
        ->attach(Swift_Attachment::fromPath('../../devis/'.$name.'.pdf'))

      ;*/
    $message = Swift_Message::newInstance('Demande de devis')
      ->setFrom(array($email => $namprenom))
      ->setTo(array('info@cimenterie-de-la-tour.com'))
      ->setBody($html.'Ci-joint vous trouverez une nouvelle demande de devis<br/>PJ: '.$pg)
        ->attach(Swift_Attachment::fromPath('../../devis/'.$name.'.pdf'))

      ;


    // Send the message
    $numSent = $mailer->send($message);
