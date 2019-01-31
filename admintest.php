<?php 
	session_start();
/*
* File: admintest.php
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/ 
	//validate the admin
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
	<title>Admin Add Testimonial</title>
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
	try{

		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//if a testimony is sent add it to the database
		if(isset($_POST["person1"])){
			$names = explode(" ", $_POST["person1"]);
			$id = "";
			foreach ($names as $w) {
			  $id .= $w[0];
			}
			if(isset($_POST["person2"])){
				$names = explode(" ", $_POST["person2"]);
				foreach ($names as $w) {
				  $id .= $w[0];
				}
			}
			$db->query("insert into testimonies (id,person1,person2,title,testimony,link) values 
				('$id','$_POST[person1]','$_POST[person2]','$_POST[title]','".addslashes($_POST['testimony'])."','testimonials.php#$id');");
		}
		//find all testimonials from the database
		$rows = $db->query("select * from testimonies");
	}
	catch(PDOException $e){
		die($e);
	}
?>
	<div id="test">
		<h1>Add testimonial to testimonials</h1>
		<form action="admintest.php" method="POST" id="test_form">
			Person 1:
			<input type="text" name="person1" required>
			<br />
			Person 2:
			<input type="text" name="person2">
			<br />
			Title(Owner):
			<input type="text" name="title">
			<br />
			Testimony:
			<br />
			<textarea rows="6" cols="35" name="testimony" placeholder="Testimony" required></textarea>
			<br />
			<input type="submit" name="submit">
		</form>
		<div id="images">
<?php 
	foreach ($rows as $row) {
?>
			<div onclick="remtest('<?=$row['id']?>')">
				<p>
					<span class="test">Testimonial: <?=htmlspecialchars($row["person1"])?> <?=htmlspecialchars($row["person2"])?> <?=htmlspecialchars($row["title"])?><br /></span>
					<?=substr(htmlspecialchars($row["testimony"]),0,97)?> ...
				</p>
			</div>
<?php
	}
?>
		</div>
	</div>
</body>
</html>