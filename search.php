<?php 
/*
* File: search.js
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/
if(isset($_POST["search"])){
	try{
		$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
			"ecpull21",
			"qyu7hbhsr");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query("select * from testimonies where testimony like \"%".$db->quote($_POST[search])."%\"");

	$i=0;
	foreach ($rows as $row) {
		if($i == 5){
			break;
		}
?>
<a href="<?=$row["link"]?>">
	<p>
		<span class="test">Testimonial: <?=$row["person1"]?> <?=$row["person2"]?> <?=$row["title"]?><br /></span>
		<?=substr($row["testimony"],0,97)?> ...
	</p>
</a>
<?php
		$i ++;
	}
	$rows = $db->query("select * from Search where description like \"%$_POST[search]%\"");
	foreach ($rows as $row) {
		if($i == 5){
			break;
		}
?>
<a href="<?=$row["link"]?>" class="image">
	<img src="<?=$row['link']?>" alt="search result for '<?=$_POST['search']?>'">
	<p>
		<?=$row["description"]?>
	</p>
</a>
<?php
		$i ++;
	}
		}
	catch(PDOException $e){
		
	}
}
?>