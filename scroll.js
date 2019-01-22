
$(document).ready(function(){
	$(document).scroll(function(e){
		let left = $(window).scrollLeft();
		if(left !== undefined) {
		    $("header").css('left',-left+10);
		}
	});
	$("input[name=\"search\"").keydown(function(e){
		if(e.keyCode === 13){
			alert("searched");
		}
	});
});
