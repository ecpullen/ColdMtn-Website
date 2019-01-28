<?php 
	$files = scandir("main/");
	echo "main/".$files[intval($_POST["count"])+2];
 ?>