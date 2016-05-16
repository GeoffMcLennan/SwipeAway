$.mobile.pushStateEnabled = false;

//adds margin to menu screens based on orientation
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		margins();
	});
	margins();
});

function margins() {
		if (window.orientation == 0 || window.orientation == 180) {
			$('#title').css({"margin-top": "80px"});
			$('#title').css({"margin-bottom": "80px"});
			$('#subTitle').css({"margin-bottom": "140px"});
		} else {
			$('#title').css({"margin-top": "0"});
			$('#title').css({"margin-bottom": "0"});
			$('#subTitle').css({"margin-bottom": "20px"});
		}	
}	

	