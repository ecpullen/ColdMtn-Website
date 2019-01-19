
window.onload = temp;
let photoCount = 1;
function temp(){
	setInterval(changePhoto, 5000);
	circs = document.getElementById("circles");
	for(i = 0; i < 13; i++){
		let temp_circle = document.createElement("DIV");
		let j = i;
		temp_circle.className = "circle";
		temp_circle.onclick = function() {setPhoto(j+1)};
		circs.appendChild(temp_circle);
	}
	temp = circs.childNodes[1];
	console.log(temp);
	console.log(temp.classList);
	temp.classList.add("curr");
	changePhoto();
	window.onkeydown = checkKey;
}


function changePhoto(){
	let photo = document.getElementById("image_roulette");
	let circs = document.getElementById("circles").childNodes;
	console.log(circs);
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount) % 13 + 1;
	console.log(photoCount);
	circs[photoCount].classList.add("curr");
	photo.src = "main"+photoCount.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})+".jpg";
	
}

function incrPhoto(){
	console.log("incr");
	changePhoto();
}

function decrPhoto(){
	console.log("decr");
	let photo = document.getElementById("image_roulette");
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = (photoCount + 11) % 13 + 1;
	circs[photoCount].classList.add("curr");
	photo.src = "main"+photoCount.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})+".jpg";
}

function setPhoto(x){
	console.log(x);
	let photo = document.getElementById("image_roulette");
	let circs = document.getElementById("circles").childNodes;
	circs[photoCount].classList.remove("curr");
	photoCount = x;
	circs[photoCount].classList.add("curr");
	photo.src = "main"+photoCount.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})+".jpg";
}

function checkKey(e){
	if(e.keyCode == 37){
		decrPhoto();
	}
	else if(e.keyCode == 39){
		incrPhoto();
	}
}