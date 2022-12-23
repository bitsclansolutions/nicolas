<?php
function list_dir($name, $level=2) {
	$arr=array();
  if ($dir = opendir($name)) {
    while($file = readdir($dir)) {

      if ($file !='.' && $file !='..') {
       if ((strpos($file,'.png') !== false)||(strpos($file,'.PNG') !== false)) {
        array_push($arr, $file);
       }
      }


    }
    closedir($dir);
  }
  return $arr;
}

	$arr=list_dir("data/Bordure/");

	foreach ($arr as $value) {
		?>
			<li>
		<a href="#" class="borderhref">
		<img   alt="<?php echo $value;?>"  src="<?php echo 'data/Bordure/'.$value;?>"></a></li>


		<?php
	}
?>


<?php




