
$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		interval = setInterval("checkOrientation();", 1000);
	});
	initialize();
	generateSprites($lanes);
	gameStart = setInterval('tick();', $tickLength);
});

var sprite1 = $('<img src="circle.png" id="circle">');
var sprite2 = $('<img src="circle.png" id="circle">');
var sprite3 = $('<img src="circle.png" id="circle">');
var sprite4 = $('<img src="circle.png" id="circle">');

function collision() {
    var obstacle = $(".obstacle").offset().left;
    var spritePos1 = $(sprite1).offset().left + 25;
    var spritePos2 = $(sprite2).offset().left + 25;
    var spritePos3 = $(sprite3).offset().left + 25;
    var spritePos4 = $(sprite4).offset().left + 25;
    if ($(".obstacle").parent().is("#t1")) {
        if (obstacle <= spritePos1) {
            $(".obstacle").remove();
        }
    }
    if ($(".obstacle").parent().is("#t2")) {
        if (obstacle <= spritePos2) {
            $(".obstacle").remove();
        }
    }
    if ($(".obstacle").parent().is("#t3")) {
        if (obstacle <= spritePos3) {
            $(".obstacle").remove();
        }
    }
    if ($(".obstacle").parent().is("#t4")) {
        if (obstacle <= spritePos4) {
            $(".obstacle").remove();
        }
    }
}

// Generates a new obstacle off-screen, to the right.
function generate() {
	$track = Math.floor(Math.random() * $lanes) + 1
	$trackId = "#t" + $track;
	$block = $('<div></div>');
	$block.addClass("obstacle");

	$trackHeight = $($trackId).css("height");
	//$leftInit = parseInt($("div#container").css("margin-left")) + $("div#container").width() + 2;
	$leftInit = $("div#container").width() + 2;

	$block.css({"height": $trackHeight, "left": $leftInit});
	$($trackId).append($block);
	$topInit = $block.css("top");
	$block.css("top", $topInit - 35);

	setObsListeners();
}

function randomIntForInterval(){
    return Math.floor(Math.random() * (601) + (140*$tickLength));
}

//Generate sprites depending on the number of tracks.
function generateSprites(trackNum) {
    // Width between sprites
    var genRange = parseInt($("#container").css("width")) * 0.5 / $lanes;
    var skew = parseInt($("#container").css("width")) * 0.2 / $lanes;

    // Array containing possible positions
    var pos = [];
    for (i = 0; i < $lanes; i++) {
    	pos[i] = (genRange * (i + 1)) - skew;
    }

    // Shuffles the array
    if (pos.length == 2) {
    	var rand = Math.random();
    	if (rand >= 0.5) {
    		var temp = pos[0];
    		pos[0] = pos[1];
    		pos[1] = temp;
    	}
    } else {
    	function shuffle(a, b) {
	    	return Math.random() > 0.5 ? -1 : 1;
	    }
	    pos.sort(shuffle);
    }

    // Puts a sprite in each array with the given margin value
    for (j = 1; j <= $lanes; j++) {
    	$sprite = $('<img src="circle.png" id="circle">');
    	$sprite.css("margin-left", pos[j - 1] - 15 + "px");
    	$("#t" + j).append($sprite);
    }

    // Adds top margin relative to track height
    $height = $("div.track").height();
    $margin = ($height / 2) - 15;

    $("img#circle").css("margin-top", $margin + "px");
}


// Moves all obstacles by 1 pixel.
// **PENDING** Checks all obstacles to see if they have collided with an object.
function move() {
	$blocks = $(".obstacle");
	$offLeft = parseInt($("div#container").css("margin-left")) - 20;

	$blocks.each(function() {
		$newLeft = parseInt($(this).css("left")) - 1;
		$(this).css("left", $newLeft + "px");

		// Deletes any obstacles that have travelled to the right off screen.
		if ($newLeft <= 0) {
			$(this).remove();
		}
	});
	//collision();
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
	$("img#pause").css({"height": (0.075 * $height) - 2 + "px",
						"width": (0.075 * $height) - 2 + "px"});

	$uiLeft = $("div#ui").width() - $("div#pause").width();
	$("div#progress").css("width", (0.6 * $uiLeft) - 2 + "px");
	$("div#score").css({"width": (0.4 * $uiLeft) - 3 + "px",
						"line-height": $("div#score").height() + "px"});
	$("span#cScore").html("0000");

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

$time = 0;
$interval = 0;
$progress = 0;
function tick() {

	if ($time >= $interval) {
		generate();
		$interval = randomIntForInterval();
		$time = 0;
	}

	$time += $tickLength;
	$progress += $tickLength;
	$current = ($progress / $gameLength) * 100;
	if ($current >= 100) {
		clearInterval(gameStart);
	} else {
		$("div#cProgress").css("width", $current + "%");
	}
	move();
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
		} else {
			easterEgg();
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
		} else {
			easterEgg();
		}
	});
}

function easterEgg() {
	$rand = Math.floor(Math.random() * 4);
	switch ($rand) {
		case 0:
			$newImg = "jim.png";
			break;
		case 1:
			$newImg = "geoff.png";
			break;
		case 2:
			$newImg = "daniel.png";
			break;
		case 3:
			$newImg = "jesse.png";
			break;
		case 4:
			$newImg = "kelvin.png";
			break;
	}

	$("img#pause").attr("src", $newImg);
}