$.mobile.pushStateEnabled = false;

$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event) {
		refreshMargin();
	});

	refreshMargin();

	$("#soundIcon").click(function() {
		soundChange();	
	});

	$("a").click(function() {
		clickSound();
	});

	$("a#su_submit").click(function() {
		$("form#signup").submit();
	});
	
	$("a#logsubmit").click(function() {
		$("form#login").submit();
	});
});  		

//adds margin to menu screens based on orientation
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

//changes visial representation of sound icon
function soundChange() {
	var icon = document.getElementById('soundIcon');
	if (icon.innerHTML === '<i class="material-icons">volume_up</i>') {
		icon.innerHTML = '<i class="material-icons">volume_off</i>';
	} else {
		icon.innerHTML = '<i class="material-icons">volume_up</i>';
	}
}

function clickSound() {
	var audioClick = document.getElementById("audioClick");
	audioClick.play();
	/*setTimeout(function() {
	}, 1);*/
}

//button sound kind of working
/*function soundButton() {
	var audioElement = document.getElementById('audClick');	
	$('#options').click(function() {
		audioElement.play();
	});
	$('.material-icons').click(function() {
		audioElement.play();
	});
}
*/

