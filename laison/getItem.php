<?php

$name=$_GET['name'];
$tom="";
if (isset($_GET['tom'])) {
//$tom=$_GET['tom'];
}
$name= str_replace("m", "M", $name);
$motif='data/all/';
$org= substr($name,-5,-4);
  $hex=false;
   $ar=false;
if ((strpos($name,'H-') !== false)||(strpos($name,'H2') !== false)) {
    $hex=true;
}
if (strpos($name,'MJ') !== false ||strpos($name,'MFR') !== false ||strpos($name,'BFR') !== false ||strpos($name,'BDR') !== false || strpos($name,'MDR') !== false ||strpos($name,'K') !== false ||strpos($name,'k') !== false ||strpos($name,'MJS') !== false || strpos($name,'BMV') !== false ||strpos($name,'MMV') !== false ||strpos($name,'pearl') !== false ||strpos($name,'MADR') !== false ) {
    $ar=true;
}


$br=false;
if (strpos($name,'BFR') !== false ||strpos($name,'BDR') !== false || strpos($name,'BMV') !== false  ) {
    $br=true;
}



?><ul style="float:left;" id="itmm"><?php

	for ($i = 0; $i < 9; $i++) {

	 if ($i != $org && file_exists($motif.substr_replace($name,$i,-5,-4))) {


	?>
	<li style="display:inline" id="<?php echo strtoupper(substr_replace($name,$i,-5,-4));?>">
		<a href="#" class="itm <?php if($br){echo "itmb ";}else{echo "itm ";} if ($hex) {echo ' hex';} if ($ar) {echo ' artiste';} if ($tom=="tom") {echo " octo";}?>">
		<img style="height:55px;width:55px; margin:5px;" data-description="<?php echo substr(substr_replace($name,$i,-5,-4), -4) ; ?>"
		 alt="<?php echo strtoupper(substr_replace($name,$i,-5,-4));?>"  src="<?php if ($tom=="tom") {echo str_replace(".png", "octo.png", "data/Octogones/tomette/".substr_replace($name,$i,-5,-4));}else{ echo $motif.substr_replace($name,$i,-5,-4);}?>"></a></li>

		<?php
	}
	 }
?>
</ul>
<?php






