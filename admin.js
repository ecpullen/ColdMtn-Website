$(document).ready(function(){
	
});

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