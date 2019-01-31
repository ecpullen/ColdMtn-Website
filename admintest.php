<!DOCTYPE html>
<html>
<head>
	<title>Admin Add Testimonial</title>
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
		
		$rows = $db->query("select * from testimonies");
	}
	catch(PDOException $e){
		die($e);
	}
?>
	<div id="test">
		<h1>Add testimonial to testimonials</h1>
		<form action="admintest.php" method="POST" id="db">
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
					<span class="test">Testimonial: <?=$row["person1"]?> <?=$row["person2"]?> <?=$row["title"]?><br /></span>
					<?=substr($row["testimony"],0,97)?> ...
				</p>
			</div>
<?php
	}
?>
		</div>
	</div>
</body>
</html>