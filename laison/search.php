<?php
function list_dir($name, $level=2) {
	$arr=array();
  if ($dir = opendir($name)) {
    while($file = readdir($dir)) {
      if ($file !='.' && $file !='..') {
        array_push($arr, $file);
      }


    }
    closedir($dir);
  }
  return $arr;
}
$name="";
if (isset($_GET['name']) && $_GET['name']!="") {
$name=$_GET['name'];
$name=$name.".";
$carreaux_anciens=list_dir("data/Motifs/carreaux_anciens");
$les_colores=list_dir("data/Motifs/les_colores");
	$les_pastels=list_dir("data/Motifs/les_pastels");
	$N_B=list_dir("data/Motifs/N_B");
	$teintes_chaudes=list_dir("data/Motifs/teintes_chaudes");
	$teintes_froides=list_dir("data/Motifs/teintes_froides");
	$Bordure=list_dir("data/Bordure");
	$Unis=list_dir("data/Unis");
	$Hexagones=list_dir("data/Hexagones");
	$cabochons=list_dir("data/Octogones/cabochons");
	$tomette=list_dir("data/Octogones/tomette");
	$de_ranchin=list_dir("data/Artistes/de_ranchin");
	$di_rosa=list_dir("data/Artistes/di_rosa");
	$jordi=list_dir("data/Artistes/jordi");
	$karo_SOKAZO=list_dir("data/Artistes/karo_SOKAZO");
	$les_jardins_de_sylla=list_dir("data/Artistes/les_jardins_de_sylla");
	$mary_virvaire=list_dir("data/Artistes/mary_virvaire");
	$MOCA=list_dir("data/Artistes/MOCA");
	$s_gunji=list_dir("data/Artistes/s_gunji");
	$X14=list_dir("data/Autres_formats/14X14");
	$X15=list_dir("data/Autres_formats/15X15");
	$all=list_dir("data/all");

 $a=0;

	foreach ($carreaux_anciens as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;
if ($a<2) {


		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/carreaux_anciens".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($les_colores as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;
if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/les_colores".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($les_pastels as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;
if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/les_pastels".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($N_B as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/N_B".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($teintes_chaudes as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;
if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/teintes_chaudes".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($teintes_froides as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;
if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Motifs/teintes_froides".'/'.$value;?>"></a></li>

		<?php
	}}
}
	foreach ($Bordure as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="borderhref" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Bordure".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($Unis as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="unis" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Unis".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($Hexagones as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="hex" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Hexagones".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($cabochons as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Octogones/cabochons".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($tomette as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Octogones/tomette".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($de_ranchin as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/de_ranchin".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($di_rosa as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/di_rosa".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($jordi as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/jordi".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($karo_SOKAZO as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/karo_SOKAZO".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($les_jardins_de_sylla as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/les_jardins_de_sylla".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($mary_virvaire as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/mary_virvaire".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($MOCA as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/MOCA".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($s_gunji as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="artiste" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Artistes/s _gunji".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($X14 as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="f14" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Autres_formats/14X14".'/'.$value;?>"></a></li>

		<?php
	}
}}
	foreach ($X15 as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a class="f14" href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/Autres_formats/15X15".'/'.$value;?>"></a></li>

		<?php
	}
	}}
foreach ($all as $value) {
	if (strpos($value,strtoupper($name)) !== false || strpos($value,$name) !== false) {
$a++;if ($a<2) {
		?>

	<li >
		<a  href="#" >
		<img  data-description="<?php echo substr($value, -4) ; ?>" alt="<?php echo $value;?>"  src="<?php echo "data/all".'/'.$value;?>"></a></li>

		<?php
	}}
}

if ($a==0) {

?>
Aucun resultat trouvé
<?php }

} else{
if ($a==0) {

?>
Aucun resultat trouvé
<?php }

}



