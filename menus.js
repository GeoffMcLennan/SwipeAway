$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		alert("Orientation is: " + event.orientation);
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
	

