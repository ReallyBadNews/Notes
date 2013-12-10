function scaleCover(){ 
	document.getElementById("cover").style.width = window.innerWidth + "px";
	document.getElementById("cover").style.height = window.innerHeight + "px";
}

function startCover(){ 
	document.getElementById("cover").style.top = -window.innerHeight + "px"; 
	document.getElementById("cover").style.opacity = 0;
}

function togglePosCover(){
	if ( document.getElementById("cover").style.top == "0px" ){
		document.getElementById("cover").style.top = -window.innerHeight + "px";
		document.getElementById("postForm").style.top = "-100%";
		document.getElementById("cover").style.opacity = 0;
		document.body.style.overflowY = "scroll";
	} else {
		document.getElementById("cover").style.top = "0px";
		document.getElementById("postForm").style.top = "50%";
		document.getElementById("cover").style.opacity = 1;
		document.body.style.overflowY = "hidden";
		document.getElementById("textToPost").focus();
	}
}

function openCover(){
	document.getElementById("cover").style.top = "0px";
	document.getElementById("postForm").style.top = "50%";
	document.getElementById("cover").style.opacity = 1;
	document.body.style.overflowY = "hidden";
}

function submitForm(){
	document.forms["submitpost"].submit();
}

function hidePost(postID){
	document.getElementById(postID).style.opacity = "0";
}

function updateClock(postID){
	var time = parseInt(document.getElementById(postID).innerHTML) - 1;
	if ( time > -1 ){
		document.getElementById(postID).innerHTML = time;
	}
}