/*
* File: admin.js
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/

//handles removing an image from main
function rem(file){
	$.ajax({url:"rem.php",
		data:{"file":file},
		method:"POST",
		dataType:"text",
		success:function(result){
			// alert(result);
			window.location.replace("adminhome.php");
		},
		error: function(){
			alert("failed");
		}});
}

//handles removing image from database
function remDBPhoto(file){
	$.ajax({url:"rem.php",
		data:{"img":file},
		method:"POST",
		dataType:"text",
		success:function(result){
			// alert(result);
			window.location.replace("adminphoto.php");
		},
		error: function(){
			alert("failed");
		}});
}

//handles removing testimony from database
function remtest(id){
	$.ajax({url:"rem.php",
		data:{"id":id},
		method:"POST",
		dataType:"text",
		success:function(result){
			// alert(result);
			window.location.replace("admintest.php");
		},
		error: function(){
			alert("failed");
		}});
}