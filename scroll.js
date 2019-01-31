/*
* File: search.js
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/

//handles horizontal scroll of the header
$(document).ready(function(){
	$(document).scroll(function(e){
		let left = $(window).scrollLeft();
		if(left !== undefined) {
		    $("header").css('left',-left);
		}
	});
	$("input[name=\"search\"").keydown(function(e){
		if(e.keyCode === 13){
			alert("searched");
		}
	});
});
