<?php

$name=$_GET['name'];
$name= str_replace("m", "M", $name);
$motif='data/all/';
$org= substr($name,-5,-4);
$ar=false;
if (strpos($name,'MJ') !== false ||strpos($name,'MFR') !== false ||strpos($name,'BFR') !== false ||strpos($name,'BDR') !== false || strpos($name,'MDR') !== false ||strpos($name,'K') !== false ||strpos($name,'k') !== false ||strpos($name,'MJS') !== false || strpos($name,'BMV') !== false ||strpos($name,'MMV') !== false ||strpos($name,'pearl') !== false ||strpos($name,'MADR') !== false ) {
    $ar=true;
}

?><ul style="float:left;"><?php
	for ($i = 0; $i < 9; $i++) {
	 if ($i != $org && file_exists($motif.substr_replace($name,$i,-5,-4))) {


	?>
	<li style="display:inline">
		<a href="#" class="itmb <?php if ($ar) {echo ' artiste';}?>">
		<img style="height:55px;width:55px; margin:5px;" data-description="<?php echo substr(substr_replace($name,$i,-5,-4), -4) ; ?>" alt="<?php echo strtoupper(substr_replace($name,$i,-5,-4));?>"  src="<?php echo $motif.substr_replace($name,$i,-5,-4);?>"></a></li>

		<?php
	}
	 }
?>
</ul>
<?php






