<!DOCTYPE html>
<html>
<head>
	<title>Admin Add Photo</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="admin.js"></script>
</head>
<body>
	<?php 
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
		<form action="adminphoto.php" method="POST" enctype="multipart/form-data" id="database">
			<input type="file" name="file" size="50">
			<br />
			Description:
			<br />
			<textarea rows="6" cols="35" name="description" placeholder="Description"></textarea>
			<br />
			<input type="submit" name="submit" value="Upload File">
		</form>
		<div id="images">
<?php 
	$rows = $db->query("select * from Search");
	foreach ($rows as $row) {
?>
			<div onclick="remDBPhoto('<?=$row['link']?>')">
				<img src="<?=$row['link']?>"><p><?=$row['description']?></p>
			</div>
<?php
	}
?>
		</div>
	</div>
</body>
</html>