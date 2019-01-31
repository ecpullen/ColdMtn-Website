<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Access</title>
<?php 
	if(isset($_POST["username"])&&isset($_POST["password"])){
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
?>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="admin.js"></script>
</head>
<body>
	<h1>Welcome, <?=$_POST["username"]?></h1>
	<a class="third" href="adminhome.php">
		Add Image to home page
	</a>
	<a class="third" href="adminphoto.php">
		Add Image to search database
	</a>
	<a class="third" href="admintest.php">
		Add Testimonial to testimonials
	</a>
</body>
</html>