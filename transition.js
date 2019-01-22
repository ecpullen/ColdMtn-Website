
window.onload = temp;
let timeout;
let photoCount = 1;
function temp(){
	timeout = setTimeout(changePhoto, 5000);
	circs = document.getElementById("circles");
	for(i = 0; i < 13; i++){
		let temp_circle = document.createElement("DIV");
		let j = i;
		temp_circle.className = "circle";
		temp_circle.onclick = function() {setPhoto(j+1)};
		circs.appendChild(temp_circle);
	}
	temp = circs.childNodes[1];
	temp.classList.add("curr");
	changePhoto();
	window.onkeydown = checkKey;
}


function changePhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount) % 13 + 1;
	circs[photoCount].classList.add("curr");
	showImage();
}

function incrPhoto(){
	changePhoto();
}

function decrPhoto(){
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount + 11) % 13 + 1;
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
	$("#second_image").attr("src", "main/main"+leftPad(photoCount, 2) +".jpg");
	$("#image_roulette").fadeOut(2000);
	$("#second_image").fadeIn(2000,function(){
		$("#image_roulette").attr("src", "main/main"+leftPad(photoCount, 2) +".jpg");
		$("#image_roulette").fadeIn(1);
		$("#second_image").fadeOut(1);
	});
	clearTimeout(timeout);
	timeout = setTimeout(changePhoto, 5000);
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