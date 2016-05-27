$.mobile.pushStateEnabled = false;
var audioClick = new Audio('audio/tick.ogg');

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
	
	$("a[name='link']").click(function(e) {
		e.preventDefault();

		target = $(this).attr('href');

		var sound = $("#audioClick");
		sound.get(0).play();

		setTimeout(checkAudio, 5);
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
	setTimeout(function() {
	}, 2);
}

// Play sounds in menus http://stackoverflow.com/questions/15008026/click-sound-on-a-tag-before-it-moves-to-another-page
var target;

function checkAudio() {
    if($("#audioClick")[0].paused) {
        window.location.href  = target;
    } else {
        setTimeout(checkAudio, 5);
    }
}



