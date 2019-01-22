<?php 
include "headfoot.php";

head("<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script><script src=\"transition.js\"></script>");
?>

<div class="main">	
	<div class="leftarr" onclick="decrPhoto()"></div>
	<div class="rightarr" onclick="incrPhoto()"></div>
	<img id="image_roulette" src="main/main05.jpg">
	<img id="second_image" src="main/main06.jpg">
	<div id="roulette_control">
		<div class="triangle-left" onclick="decrPhoto()"></div>
		<div id="circles">	
		</div>
		<div class="triangle-right" onclick="incrPhoto()"></div>
	</div>
</div>
<img src="images/logo.svg" id="logo">

<?php 
	foot();
?>