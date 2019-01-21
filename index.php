<?php 
include "headfoot.php";

head("<script src=\"transition.js\"></script>");
?>

<div id="main">	
	<img id="image_roulette" src="main01.jpg">
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