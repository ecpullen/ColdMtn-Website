<?php 
/*
* File: rem.php
* Authors: Ethan Pullen & Dhruv Joshi
* Date: 2/2019
*/
	if(isset($_POST["file"])){
		//remove file from main transition
		if(unlink($_POST["file"])){
			echo "deleted ".$_POST["file"];
		}
		else{
			echo "failed";
		}
	}
	elseif(isset($_POST["img"])){
		//remove image from database
		try{
			$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = "delete from Search where link = \"$_POST[img]\"";
			$rows = $db->query($q);
		}
		catch(PDOExtension $e){
			echo "an error occured";
		}
	}
	elseif(isset($_POST["id"])){
		//remobe testimony from the database
		try{
			$db = new PDO("mysql:dbname=ecpull21;host=cs325.colby.edu",
				"ecpull21",
				"qyu7hbhsr");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = "delete from testimonies where id = \"$_POST[id]\"";
			$rows = $db->query($q);
		}
		catch(PDOExtension $e){
			echo "an error occured";
		}
	}
?>