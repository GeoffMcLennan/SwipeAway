$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		/*alert("Orientation is: " + event.orientation);*/
		if (event.orientation == "portrait") {
			$('#title').css({"margin-top": "80px"});
			$('#title').css({"margin-bottom": "80px"});
			$('#subTitle').css({"margin-bottom": "140px"});
		} else {
			$('#title').css({"margin-top": "0"});
			$('#title').css({"margin-bottom": "0"});
			$('#subTitle').css({"margin-bottom": "20px"});
		}
	});
});
	
	$(document).ready(function(){
		$('#soundIcon').click(function(){
			//ORIRGINAL ID="muteicon"
			if ($('.material-icons').text() == 'volume_up'/*$(this).attr('src') == 'sound.png'*/) {
				$(this).text('volume_off')/*$(this).attr('src', 'mute.png')*/;
				alert('yo dawg');
			}else{
				$(this).text('volume_up')/*$(this).attr('src', 'sound.png')*/;
			}
		});
	});
	

