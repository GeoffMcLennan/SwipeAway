$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		/*alert("Orientation is: " + event.orientation);*/
		if (event.orientation == "portrait") {
			$('#title').css({"margin-top": "80px"});
			$('#title').css({"margin-bottom": "80px"});
		} else {
			$('#title').css({"margin-top": "0"});
			$('#title').css({"margin-bottom": "0"});
		}
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
	

