
window.onload = temp;
let timeout;
let photoCount = 1;
let numPhotos = 0;
function temp(){
	timeout = setTimeout(changePhoto, 5000);
	circs = document.getElementById("circles");
	numPhotos = circs.childElementCount;
	temp = circs.childNodes[1];
	temp.classList.add("curr");
	changePhoto();
	window.onkeydown = checkKey;
}


function changePhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount) % numPhotos + 1;
	circs[photoCount].classList.add("curr");
	showImage();
}

function incrPhoto(){
	changePhoto();
}

function decrPhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount + 11) % numPhotos + 1;
	circs[photoCount].classList.add("curr");
	showImage();
}

function setPhoto(x){
	console.log(x);
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = x;
	circs[photoCount].classList.add("curr");
	showImage();
}

function showImage(){
	console.log("here");
	$.ajax({
        url: 'photoselect.php',
        dataType: 'text',
        type: 'POST',
        data: {count:photoCount},
        success: function(returndata){
            $("#second_image").attr("src", $("#image_roulette").prop("src"));
			$("#second_image").fadeIn(1);
			$("#image_roulette").fadeOut(1,function(){
				$("#image_roulette").attr("src", returndata);
				$("#second_image").fadeOut(1000);
				$("#image_roulette").fadeIn(1000);});
				clearTimeout(timeout);
				timeout = setTimeout(changePhoto, 5000);
        },
        error: function () {
        	alert("An error occured");
        }
    });
	
}

function checkKey(e){
	if(e.keyCode == 37){
		decrPhoto();
	}
	else if(e.keyCode == 39){
		incrPhoto();
	}
}

function leftPad(i,pad){
	return (i).toLocaleString('en-US', {minimumIntegerDigits: pad, useGrouping:false})
}