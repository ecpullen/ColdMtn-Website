<?php 
	session_start();
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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Edit Home Images</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="admin.js"></script>
</head>
<body>
<?php 
	if( $_FILES['file']['name'] != "" ){
	   $destFile = "main/".$_FILES['file']['name'];
		move_uploaded_file( $_FILES['file']['tmp_name'], $destFile );
	}
?>
	<div id="home">
		<h1>Add Image to Home Page</h1>
		<form action="adminhome.php" method="POST" enctype="multipart/form-data" id="home">
			<input type="file" name="file" size="50">
			<input type="submit" value="Upload File">
		</form>
<?php 
	foreach (array_slice(scandir("main"),3) as $img) {
?>
		<div>
			<img src="main/<?=$img?>">

			<button class="delete" onclick="rem('main/<?=$img?>')">X</button>
		</div>
<?php
	}
?>
	</div>
</body>
</html>