/*
* File: search.js
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/

//uses ajax to get the mysql results of search
$(document).ready(function(){
	$("#searchbar").on('input',function(){
		$.ajax({url:"search.php",
		data:{search:$("#searchbar").val()},
		method:"POST",
		dataType:"HTML",
		success:function(result){
			$("#searchContent").empty();
			$("#searchContent").append(result);
		},
		error: function(){
			;
		}});
	});
});