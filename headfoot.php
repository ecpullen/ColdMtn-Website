<?php
function head($stylesheet){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cold Mountain Builders</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?=$stylesheet?>
</head>

<body>
	<div class="header">
		<header class="header">
			<div class="dd">
				<a class="mainlink" href="index.html">Home</a>
			</div>
			<div class="dd">
				<a class="mainlink" href="">Our Work</a>
					<div class="d-content">
						<a href="">Kitchens</a>
						<a href="">Landscape</a>
						<a href="">Exteriors</a>
						<a href="">Interiors</a>
					</div>
			</div>
			<div class="dd">
				<a class="mainlink" href="aboutus.php">About Us</a>
					<div class="d-content">
						<a href="history.php">History</a>
						<a href="staff.php">Staff</a>
						<a href="services.php">Services</a>
					</div>
			</div>
			<div class="dd">
				<a class="mainlink" href="testimonials.php">Testimonials</a>
					<div class="d-content">
						<a href="testimonials.html#FWCK"><span class="line">Frederic Whittmann</span> 
									<span class="line">Christine Kondoleon</span> 
									<span class="title">Owners</span></a>
						<a href="testimonials.php#JG"><span class="line">John Gillespie</span> 
									<span class="title">Architect</span></a>
						<a href="testimonials.php#DW"><span class="line">Deborah Weisgall</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#CG"><span class="line">Christopher Glass</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#LL"><span class="line">Larry Lasser</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#LRKS"><span class="line">Liv Rockefeller</span>
									<span class="line">Ken Shure</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#TG"><span class="line">Tony Grassi</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#BN"><span class="line">Bruce Norelius</span>
									<span class="title">Owner</span></a>
						<a href="testimonials.php#SVD"><span class="line">Sam Van Dam</span>
									<span class="title">Architect</span></a>
					</div>
			</div>
			<div class="dd">
				<a class="mainlink" href="">Press</a>
			</div>
			<div class="dd">
				<a class="mainlink" href="">Contact Us</a>
			</div>
		</header>
	</div>
<?php
}

function foot(){
?>
	<footer class="footer">
		&copy; Cold Mountain Builders 2019
	</footer>
</body>
</html>
<?php
}
?>