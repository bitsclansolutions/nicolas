<?php
$name=$_GET['name'];
$org= substr($name,-5,-4);
 echo substr_replace($name,9,-5,-4);