<?php 
include "headfoot.php";

head("<script src=\"transition.js\"></script>");
?>

<div class="main">	
	<div class="leftarr" onclick="decrPhoto()"></div>
	<div class="rightarr" onclick="incrPhoto()"></div>
	<img id="image_roulette" src="main/main05.jpg">
	<img id="second_image" src="main/main05.jpg">
	<div id="roulette_control">
		<div class="triangle-left" onclick="decrPhoto()"></div>
		<div id="circles">
<?php 
$files = scandir("main/");
for($i = 2; $i < count($files); $i ++){
?><div class="circle" onclick="setPhoto(<?=$i-1?>)"></div><?php 
}
?>
		</div>
		<div class="triangle-right" onclick="incrPhoto()"></div>
	</div>
</div>
<img src="images/logo.svg" id="logo">

<?php 
	foot();
?>