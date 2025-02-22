<?php
/*
* File: headfoot.php
* Authors: Ethan Pullen & Dhruv Joshi
* Date: 2/2019
*/

//header to be used for all php pages on website with $stylesheet 
//as a stylesheet or javascript code.
function head($stylesheet){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cold Mountain Builders</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Karla|Montserrat">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="scroll.js"></script>
	<script src="search.js"></script>
	<?=$stylesheet?>
</head>

<body>
	<div class="head"></div>
	<header>
		<div class="dd" id="home">
			<a class="mainlink" href="index.php"><img src="images/logo.svg"></a>
		</div>
		<div class="dd" id="about">
			<a class="mainlink" href="aboutus.php">About Us</a>
				<div class="d-content">
					<a href="history.php">History</a>
					<a href="staff.php">Staff</a>
					<a href="services.php">Services</a>
				</div>
		</div>
		<div class="dd" id="test">
			<a class="mainlink" href="testimonials.php">Testimonials</a>
				<div class="d-content">
<?php 
	try{
		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
			"ecpull21",
			"qyu7hbhsr");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query("select * from testimonies");
	}
	catch(PDOException $e){
		die($e);
	}

	foreach ($rows as $row) {
?>
					<a href="<?=$row["link"]?>"><span class="line">
						<?=htmlspecialchars($row["person1"])?></span> 
<?php 
		if($row["person2"]){ 
?>
							<span class="line"><?=htmlspecialchars($row["person2"])?></span> 
<?php 	
		} 
?>
							<span class="title"><?=htmlspecialchars($row["title"])?></span></a>
<?php
	}
?>
				</div>
		</div>
		<div class="dd" id="press">
			<a class="mainlink" href="press.php">Press</a>
		</div>
		<div class="dd" id="contact">
			<a class="mainlink" href="contactus.php">Contact Us</a>
		</div>
		<div class="dd" id="search">
			<input id="searchbar" type="text" name="search" placeholder="Search...">
				<div class="d-content" id="searchContent">
				</div>
		</div>
	</header>
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