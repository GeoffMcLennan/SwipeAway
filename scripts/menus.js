$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	var orientation = screen.orientation || screen.mozOrientation || screen.msOrientation;

if (orientation === "landscape-primary") {
  console.log("That looks good.");
} else if (orientation === "landscape-secondary") {
  console.log("Mmmh... the screen is upside down!");
} else if (orientation === "portrait-secondary" || orientation === "portrait-primary") {
  console.log("Mmmh... you should rotate your device to landscape");
}
	// Recalls intialize function if screen orientation is changed.
	/* $(window).on("orientationchange", function(event){
		margins();
	});
	margins(); */
});

/* function margins() {
	var orientation = screen.orientation;
	
		if (orientation === "landscape-primary") {
  console.log("That looks good.");
} else if (orientation === "landscape-secondary") {
  console.log("Mmmh... the screen is upside down!");
} else if (orientation === "portrait-secondary" || orientation === "portrait-primary") {
  console.log("Mmmh... you should rotate your device to landscape");
} */
		
		/* if (orientation === "portrait-primary" || orientation === "portrait-secondary") {
			$('#title').css({"margin-top": "80px"});
			$('#title').css({"margin-bottom": "80px"});
			$('#subTitle').css({"margin-bottom": "140px"});
		} else {
			$('#title').css({"margin-top": "0"});
			$('#title').css({"margin-bottom": "0"});
			$('#subTitle').css({"margin-bottom": "20px"});
		} */
	});

	$("a#su_submit").click(function(){
		$("form#signup").submit();
	});
});
	
	$(document).ready(function(){
		$('#soundIcon').click(function(){
			if ($(this).attr('src') == 'images/sound.png')
				$(this).attr('src', 'images/mute.png');
			else
				$(this).attr('src', 'images/sound.png');
		});
	});
