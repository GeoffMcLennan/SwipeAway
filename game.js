$(document).ready(function() {
	initialize(2);
	generate(1);
	//generate(2);
	setInterval('move();', 10);
	
});

function generate(track) {
	var trackId = "#t" + track;
	var block = $('<div></div>');
	block.addClass("obstacle");

	var trackHeight = $(trackId).css("height");
	block.css({"height": trackHeight, "left": "450px"});
	$(trackId).append(block);
}

function move() {
	var blocks = $(".obstacle");

	blocks.each(function() {
		var newLeft = parseInt($(this).css("left")) - 1;
		$(this).css("left", newLeft + "px");
	});
}

function initialize(lanes) {
	if(screen.width > screen.height) {
		var uiBar = screen.height * 0.05;
		var trackHeight = screen.height / lanes;
		alert(uiBar);
	}
}