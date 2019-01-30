<?php 
	if(isset($_POST["file"])){
		if(unlink($_POST["file"])){
			echo "deleted ".$_POST["file"];
		}
		else{
			echo "failed";
		}
	}
?>