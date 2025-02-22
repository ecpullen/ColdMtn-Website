<?php
/*
* File: testimonials.php
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/ 
include "headfoot.php";

head("<link rel=\"stylesheet\" type=\"text/css\" href=\"testimonials.css\">");
?>
<div class="sidebar">
<?php 
	try{
		// search the testimony database for all testimonies
		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
			"ecpull21",
			"qyu7hbhsr");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query("select * from testimonies");
	}
	catch(PDOException $e){
		die($e);
	}
	// for evvery testimony add it to sidebar
	foreach ($rows as $row) {
?>
	<a href="<?=$row["link"]?>"><span class="line"><?=htmlspecialchars($row["person1"])?></span> 
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
	// $rows can only be traversed once without calling execute();
	$rows->execute();
?>
</div>
<div class="testimonies">
	<div id="intro">
		<p id="header-intro">In Our Clients’ Words</p>
		<p id="main-intro">
			Cold Mountain Builders has worked with owners, architects and consultants from all over the United States. We understand that we are only as good as our last project.<br /><br />To that end, we share with you an unvarnished look at what our clients and partners have to say about their experiences working with Cold Mountain Builders.
		</p>
	</div>
<?php 
	foreach ($rows as $row) {
?>
		<div class="loc" id='<?=$row["id"]?>'></div>	
		<div class="testimonial">
			<p class="testimony"><?=$row["testimony"]?></p>
			<p class = "client">
				<span class="line"><?=htmlspecialchars($row["person1"])?></span> 
<?php 
		if($row["person2"]){ 
?>
				<span class="line"><?=htmlspecialchars($row["person2"])?></span> 
<?php 	
		} 
?>
				<span class="title"><?=htmlspecialchars($row["title"])?></span></a>
			</p>	
		</div>
<?php
	}
?>
<div class="loc"></div>
</div>
<?php
foot();
?>
