function changeimg(element, imageName) {
	element.setAttribute('src', imageName);
}

function larger(element){
	var style = window.getComputedStyle(element),
	h = parseFloat(style.height),
	w = parseFloat(style.width),
	vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
	vW = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	h = (h*1.2)/vH*100;
	w = (w*1.2)/vW*100;
	element.style.height = h + 'vh';
	element.style.width = w + 'vw';
}


function smaller(element){
	var style = window.getComputedStyle(element),
	h = parseFloat(style.height),
	w = parseFloat(style.width),
	vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
	vW = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	h = (h/1.2)/vH*100;
	w = (w/1.2)/vW*100;
	element.style.height = h + 'vh';
	element.style.width = w + 'vw';
}

