$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event) {
		refreshMargin();
	});
	$( "#soundIcon" ).click(function(event) {
		sound();	
	});
	refreshMargin();

	$("a#su_submit").click(function() {
		$("form#signup").submit();
	});
	
	$("a#logsubmit").click(function() {
		$("form#login").submit();
	});
	soundButton();
});  		

function refreshMargin() {

	if (window.innerHeight > window.innerWidth) {
		$('#title').css({"margin-top": "80px"});
		$('#title').css({"margin-bottom": "80px"});
		$('#subTitle').css({"margin-bottom": "140px"});
	} else {
		$('#title').css({"margin-top": "0"});
		$('#title').css({"margin-bottom": "0"});
		$('#subTitle').css({"margin-bottom": "20px"});
	}
}

function sound() {
	var icon = document.getElementById('soundIcon');
	if (icon.innerHTML === '<i class="material-icons">volume_up</i>') {
		icon.innerHTML = '<i class="material-icons">volume_off</i>';
	} else {
		icon.innerHTML = '<i class="material-icons">volume_up</i>';
	}
}

//button sound kind of working
function soundButton() {
	var audioElement = document.createElement('audio');
	audioElement.setAttribute('src', 'http://www.soundjay.com/button/sounds/button-09.mp3');
	$('#options').click(function() {
		audioElement.play();
	});
	$('.material-icons').click(function() {
		audioElement.play();
	});
}


