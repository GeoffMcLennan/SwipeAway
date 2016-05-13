$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		/*alert("Orientation is: " + event.orientation);*/
		if (event.orientation == "portrait") {
			$('#title').css({"margin-top": "80px"});
			$('#title').css({"margin-bottom": "80px"});
			$('form').css({"margin": "0 10px"});
		} else {
			$('#title').css({"margin-top": "0px"});
			$('#title').css({"margin-bottom": "0px"});
			$('#form').css({"margin": "'0 40pxpx'"});
		}
	});
});
	
	$(document).ready(function(){
		$('#soundIcon').click(function(){
			if ($(this).attr('src') == 'sound.png')
				$(this).attr('src', 'mute.png');
			else
				$(this).attr('src', 'sound.png');
		});
	});
	

