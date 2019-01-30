

<!DOCTYPE html>
<html>
<head>
	<title>Admin Access</title>
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
	elseif( $_FILES['databasefile']['name'] != "" ){
		$destFile = "adminImg/".$_FILES['databasefile']['name'];
		move_uploaded_file( $_FILES['databasefile']['tmp_name'], $destFile );
	}
?>
	<div class="third" id="home">
		<h1>Add Image to Home Page</h1>
		<form action="admin.php" method="POST" enctype="multipart/form-data" id="home">
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
	<div class="third" id="database">
		<h1>Add image to database</h1>
		<input type="file" name="databasefile" size="50">
		<br />
		Description:
		<br />
		<textarea rows="6" cols="35" name="description" placeholder="Description"></textarea>
		<br />
		<input id="type="button" name="submit" value="Upload File">
	</div>
	<div class="third" id="testimony">
		<h1>Add Testimony</h1>
	</div>
</body>
</html>