<?php 
	if(isset($_POST["file"])){
		if(unlink($_POST["file"])){
			echo "deleted ".$_POST["file"];
		}
		else{
			echo "failed";
		}
	}
	elseif(isset($_POST["img"])){
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