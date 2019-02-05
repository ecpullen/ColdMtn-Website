<?php 
	session_start();
/*
* File: adminphoto.php
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/ 
	//validate the admin
	try{
		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
			"ecpull21",
			"qyu7hbhsr");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query("select * from admins where password=".
			$db->quote($_SESSION["password"])." and username=".
			$db->quote($_SESSION["username"]).";");
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
	<title>Admin Add Photo</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="admin.js"></script>
</head>
<body>

<header class="nav_bar">
	<a href="adminhome.php">
		Add Image to Home Page
	</a>
	<a href="adminphoto.php">
		Add Image to Search Database
	</a>	
	<a href="admintest.php">
		Add a Testimonial
	</a>
	<form id="logout" action="logout.php">
		<input id="logout_button" type="submit" value="Log out">
	</form>	

</header>

<?php 
	//if a file is sent, add it to adminImg and add the link and description to the database
	try{
		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){}
	if( $_FILES['file']['name'] != "" && isset($_POST['description'])){
	   $destFile = "adminImg/".$_FILES['file']['name'];
		move_uploaded_file( $_FILES['file']['tmp_name'], $destFile );
		try{
			$q = "insert into Search (link,description) values (\"$destFile\",\"$_POST[description]\")";
			$rows = $db->query($q);
		}
		catch(PDOExtension $e){
			echo "an error occured";
		}
	}
?>
	<div id="database">
		<h1>Add image to database</h1>
		<form action="adminphoto.php" method="POST" enctype="multipart/form-data" id="database_form">
			<input type="file" name="file" size="50" id="database_file_chooser">
			<br />
			Description:
			<br />
			<textarea rows="6" cols="35" name="description" placeholder="Description" id="database_description"></textarea>
			<br />
			<input type="submit" name="submit" value="Upload File" id="database_upload">
		</form>
		<p class="warning">Click on any entry below to delete</p>
		<div id="images">
<?php 
	$rows = $db->query("select * from Search");
	foreach ($rows as $row) {
?>
			<div class="entry" onclick="remDBPhoto('<?=$row['link']?>')">
				<img src="<?=$row['link']?>"><p><?=$row['description']?></p>
			</div>
<?php
	}
?>
		</div>
	</div>
</body>
</html>