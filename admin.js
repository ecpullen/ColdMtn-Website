

function rem(file){
	$.ajax({url:"rem.php",
		data:{"file":file},
		method:"POST",
		dataType:"text",
		success:function(result){
			// alert(result);
			window.location.replace("admin.php");
		},
		error: function(){
			alert("failed");
		}});
}