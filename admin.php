<?php 
	session_start();
/*
* File: admin.php
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/ 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Access</title>
<?php 
	// determines which point the page is being accessed from.
	if(isset($_POST["username"])&&isset($_POST["password"])){
		//came from admin.html so needs to setup session
		try{
			$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $db->query("select * from admins where password='".addslashes($_POST["password"])."' and username='".addslashes($_POST["username"])."';");
			if($rows->rowCount() == 0){
				die("<h1>Invalid Login</h1><a href='admin.html'>Try again</a>");
			}
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["password"] = $_POST["password"];
		}
		catch(PDOException $e){
			die("<h1>Invalid Login</h1><a href='admin.html'>Try again</a>");
		}
	}
	elseif (isset($_SESSION["username"])&&isset($_SESSION["password"])) {
		//came to the page for a second time so uses session data
		try{
			$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $db->query("select * from admins where password='".addslashes($_SESSION["password"])."' and username='".addslashes($_SESSION["username"])."';");
			if($rows->rowCount() == 0){
				die("<h1>Invalid Login</h1><a href='admin.html'>Try again</a>");
			}
		}
		catch(PDOException $e){
			die("<h1>Invalid Login</h1><a href='admin.html'>Try again</a>");
		}
	}
	else{
		//neigher session or post were stored so someone coming from a random site.
		die("<h1>Invalid Login</h1><a href='admin.html'>Try again</a>");
	}
?>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="admin.js"></script>
</head>
<body>
	<h1>Welcome, <?=$_POST["username"]?></h1>
	<div class="third left">	
		<a href="adminhome.php">
			Add Image to home page
		</a>
	</div>
	<div class="third center">	
		<a href="adminphoto.php">
			Add Image to search database
		</a>
	</div>
	<div class="third right">	
		<a href="admintest.php">
			Add Testimonial to testimonials
		</a>
	</div>
</body>
</html>