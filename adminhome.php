<!DOCTYPE html>
<html>
<head>
	<title>Admin Edit Home Images</title>
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
	if( $_FILES['file']['name'] != "" ){
	   $destFile = "main/".$_FILES['file']['name'];
		move_uploaded_file( $_FILES['file']['tmp_name'], $destFile );
	}
?>
	<div id="home_div">
		<h1>Add Image to Home Page</h1>
		<form action="adminhome.php" method="POST" enctype="multipart/form-data" id="home_form">
			<input type="file" name="file" size="50">
			<input type="submit" value="Upload File">
		</form>
<?php 
	foreach (array_slice(scandir("main"),3) as $img) {
?>
		<div id="image_div">
			<img src="main/<?=$img?>">

			<button class="delete" onclick="rem('main/<?=$img?>')">X</button>
		</div>
<?php
	}
?>
	</div>
</body>
</html>