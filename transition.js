/*
* File: transition.js
* Ethan Pullen & Dhruv Joshi
* 2/2019
*/

window.onload = temp;

let timeout;//variable responsible for seting the time between automatic image transitions.
//Automatically reset when the user manually changes the image.
let photoCount = 0;
let numPhotos = 0;

/*
* Starts the timeouts. Determines the number of images being displayed. Selects the first image.
* Sets listener for arrow key
*/
function temp(){
	timeout = setTimeout(changePhoto, 5000);
	circs = document.getElementById("circles");
	numPhotos = circs.childElementCount;
	temp = circs.childNodes[1];
	temp.classList.add("curr");
	photoCount = numPhotos - 1;
	changePhoto();
	changePhoto();
	window.onkeydown = checkKey;
}

/*
* Increments the photo by 1 and then displays it
*/
function changePhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount) % numPhotos + 1;
	circs[photoCount].classList.add("curr");
	showImage();
}

/*
* Uses change photo. Included for completion.
*/
function incrPhoto(){
	changePhoto();
}

/*
* Goes backwards 1 image
*/
function decrPhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount + 11) % numPhotos + 1;
	circs[photoCount].classList.add("curr");
	showImage();
}

/*
* Sets the image based on image-roulette.
*/
function setPhoto(x){
	if(x < 1 || x > numPhotos){
		return;
	}
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = x;
	circs[photoCount].classList.add("curr");
	showImage();
}

/*
* AJAX query to select proper display image.
*/
function showImage(){
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

/*
* Listner for arrow keys
*/
function checkKey(e){
	if(e.keyCode == 37){
		decrPhoto();
	}
	else if(e.keyCode == 39){
		incrPhoto();
	}
}