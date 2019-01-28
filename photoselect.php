<?php 
/*
* File: photoselect.php
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/
	$files = scandir("main/");
	echo "main/".$files[intval($_POST["count"])+2];
 ?>