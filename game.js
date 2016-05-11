
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		interval = setInterval("checkOrientation();", 1000);
	});
	initialize();
	generate();	
	setInterval('move();', $tickLength);
});

// Generates a new obstacle off-screen, to the right.
function generate() {
	$track = Math.floor(Math.random() * $lanes) + 1
	$trackId = "#t" + $track;
	$block = $('<div></div>');
	$block.addClass("obstacle");

	$trackHeight = $($trackId).css("height");
	$leftInit = parseInt($("div#container").css("margin-left")) + $("div#container").width() + 2;

	$block.css({"height": $trackHeight, "left": $leftInit});
	$($trackId).append($block);

	setObsListeners();
}

function generateSprites(trackNum) {
    var randomPosition1 = Math.random() * 210 + 10;
    var randomPosition2 = Math.random() * 210 + 10;
    while ((randomPosition1 >= randomPosition2 - 60) && (randomPosition1 <= randomPosition2 + 60)) {
        randomPosition1 = Math.random() * 210 + 10;
    }
    if (trackNum == 2) {
        var sprite1 = $('<img src="circle.png" id="circle">');
        var sprite2 = $('<img src="circle.png" id="circle">');
        sprite1.css({"left": randomPosition1 + "px"});
        $("#t1").append(sprite1);
        sprite2.css({"left": randomPosition2 + "px"});
        $("#t2").append(sprite2);
    }
}


// Moves all obstacles by 1 pixel.
// **PENDING** Checks all obstacles to see if they have collided with an object.
function move() {
	$blocks = $(".obstacle");
	$targets = $(".obsTarget");
	$offLeft = parseInt($("div#container").css("margin-left")) - 20;

	$blocks.each(function() {
		$newLeft = parseInt($(this).css("left")) - 1;
		$(this).css("left", $newLeft + "px");

		// Deletes any obstacles that have travelled to the right off screen.
		if ($newLeft <= $offLeft) {
			$(this).remove();
		}
	});

	$targets.each(function() {
		$newLeft = parseInt($(this).css("left")) - 1;
		$(this).css("left", $newLeft + "px");

		// Deletes any obstacles that have travelled to the right off screen.
		if ($newLeft + 20 <= $offLeft) {
			$(this).remove();
		}
	});
}

// Sets up appropriate game screen depending on screen size.
function initialize() {
	$("h2#portError").hide();
	
	// Sets up screen for phones or small devices.
	if (screen.height <= 800 && screen.width <= 800) {
		$("div#desktop").hide();
		$width = $(window).width();
		$height = $(window).height();
		$("div#container").css({"width": $width, 
								"height": $height});

		// If the phone is in portrait mode, limits the height of game pane and displays error.
		if ($height > $width) {
			$height = $width / 1.5;
			$("#portError").show();
		}

		$("div#container").css("height", $height - 2 + "px");
	// Sets up screen for a PC.
	} else {
		$("div#container").css({"height": "400px", "width": "750px",
								"border-width": "1px", "margin": "0 auto"});
		$width = $("div#container").width();
		$height = $("div#container").height();
	}

	// Sets height of UI bar and lanes.
	$("div#ui").css("height", (0.075 * $height) - 2 + "px");
	$gameHeight = $height - $("div#ui").height() - 2;
	$laneHeight = ($gameHeight / $lanes) - 2;
	$("div.track").css({"height": $laneHeight, "width": $width});
}

// Helps the goddamn orientation bullshit.
function checkOrientation() {
	$heightCon = ($("div#container").height == screen.height) || ($("div#container") == screen.width / 1.5);
	$widthCon = $("div#container").width() == screen.width;

	if ($heightCon && $widthCon) {
		clearInterval(interval);
	} else {
		initialize();
	}
}

// Sets the listeners for obstacles.
function setObsListeners() {
	jQuery("div.obstacle").on("swipeup", function(event) {
		$parentId = $(this).parent().attr("id").replace(/[^\d.]/g, "");
		$newLane = parseInt($parentId) - 1;
		$newId = "#t" + $newLane;

		if($newLane >= 1) {
			$left = $(this).css("left");
			$height = $(this).css("height");
			$(this).remove();

			$block = $("<div></div>");
			$block.addClass("obstacle").css({"left": $left, "height": $height});

			$($newId).append($block);
			setObsListeners();
		}

	});

	jQuery("div.obstacle").on("swipedown", function(event) {
		$parentId = $(this).parent().attr("id").replace(/[^\d.]/g, "");
		$newLane = parseInt($parentId) + 1;
		$newId = "#t" + $newLane;

		if($newLane <= $lanes) {
			$left = $(this).css("left");
			$height = $(this).css("height");
			$(this).remove();

			$block = $("<div></div>");
			$block.addClass("obstacle").css({"left": $left, "height": $height});

			$($newId).append($block);
			setObsListeners();
		}
	});
}