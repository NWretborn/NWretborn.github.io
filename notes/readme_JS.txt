
function changePic(element, imageName) {
	element.setAttribute('src', imageName);
}

function larger(element){
	var style = window.getComputedStyle(element),
	h = parseFloat(style.height),
	vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
	h = (h*1.2)/vH*100;
	element.style.height = h + 'vh';
}


function smaller(element){
	var style = window.getComputedStyle(element),
	h = parseFloat(style.height),
	vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
	h = (h/1.2)/vH*100;
	element.style.height = h + 'vh';
}

function cachelogo(){
	var style = document.getElementsByClassName('logo')[0].style;
	style.background='url(img/logo_about_gray.png) no-repeat';
	style.background='url(img/logo_blue.png) no-repeat';
	style.backgroundSize='contain';
	style.backgroundPosition='center';
	alert("logo cache try done");
}