
$.mobile.pushStateEnabled = false;

$(document).ready(function() {
	// Recalls intialize function if screen orientation is changed.
	$(window).on("orientationchange", function(event){
		interval = setInterval("checkOrientation();", 1000);
	});

	// Initialize the game screen and generate the sprites on the screen.
	initialize();
	generateSprites($lanes);
    $("a#start").click(function() {
		$("div#startOverlay").fadeOut("slow", function() {
			startGame();

	//gameStart = setInterval('tick();', $tickLength);

	//gameStart = setInterval('tick();', $tickLength);

	// Initialize the start overlay start game button listener
	$("a#start").click(function() {
		startGame();
	});

	$("div#pause").click(function() {
		openPauseOverlay();
	});

	$("a#resume").click(function() {
		closePauseOverlay();
	});

	// Override the default function of swiping up and down
	$(document).on("swipeup", function(e) {
		e.preventDefault();
	});
	$(document).on("swipedown", function(e) {
		e.preventDefault();
	});

});

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
	$("img#pause").css({"height": (0.075 * $height) - 1 + "px",
						"width": (0.075 * $height) - 1 + "px"});

	$uiLeft = $("div#ui").width() - $("div#pause").width();
	$("div#progress").css("width", (0.6 * $uiLeft) - 2 + "px");
	$("div#score").css({"width": (0.4 * $uiLeft) - 4 + "px",
						"line-height": $("div#score").height() + "px"});
	$("span#cScore").html("0");
	$("span#scorePass").html($scorePass);

	$gameHeight = $height - $("div#ui").height() - 2;
	$laneHeight = ($gameHeight / $lanes) - 2;
	$("div.track").css({"height": $laneHeight, "width": $width});

	// Initializes Start Overlay
	$("div#startOverlay").css("height", "100%");
	$("span#putLevel").html($levelNum);
	$("span#putScore").html($scorePass);

	// Hides other overlays
	$("div#passedOverlay").hide();
	$("div#failedOverlay").hide();
    $("div#pauseOverlay").hide();

	jQuery("div.target").on("swipedown", function(event) {
		alert("fml");
    	//$.playSound('http://localhost/swipeaway/audio/psst1.ogg');
	});

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
    	$sprite = $('<i id="circle" class="material-icons">brightness_1</i>');
    	$sprite.css("margin-left", pos[j - 1] - 15 + "px");
        $sprite.attr("id", ("s" + j));
    	$("#t" + j).append($sprite);
    }

    // Adds top margin relative to track height
    $height = $("div.track").height();
    $margin = ($height / 2) - 15;

    $("i#circle").css("margin-top", $margin + "px");
}

$time = 0;
$interval = 0;
$progress = 0;
function tick() {
	// Checks to see if another obstacle should be generated
	// Generates obstacle, randomly selects an interval, and resets timer
	if ($time >= $interval) {
		generate();
		$interval = randomIntForInterval();
		$time = 0;
	}

	// Increments time values and updates progress bar
	$time += $tickLength;
	$progress += $tickLength;
	$current = ($progress / $gameLength) * 100;
	if ($current >= 100) {
		clearInterval(gameStart);
		gameEnd();
	} else {
		$("div#cProgress").css("width", $current + "%");
	}

	move();
}

// Generates a new obstacle off-screen, to the right.
function generate() {
	// Randomly selects lane to spawn in
	$track = Math.floor(Math.random() * $lanes) + 1;
	$trackId = "#t" + $track;

	// Creates target
	$target = $('<div></div>');
	$target.addClass("target");
	// Creates obstacle
	$block = $('<div></div>');
	$block.addClass("obstacle");
	$target.append($block);

	// Gets height and initial left value for new obstacle
	$trackHeight = $($trackId).css("height");
	$leftInit = $("div#container").width() + 2;

	// Applies height and left values to obstacle and inserts it into the lane
    $target.css({"height": $trackHeight, "left": $leftInit});
    $($trackId).append($target);
	$topInit = $target.css("top");
	$target.css("top", "0");

	// Attaches swipe listeners to obstacle
	setObsListeners();
}

// Sets the listeners for obstacles.
function setObsListeners() {
	// Swipe up listener
	jQuery("div.target").on("swipeup", function(event) {
		// Finds current lane and generates id of new lane
		$parentId = $(this).parent().attr("id").replace(/[^\d.]/g, "");
		$newLane = parseInt($parentId) - 1;
		$newId = "#t" + $newLane;

		// If the new lane is a valid lane, destroy current obstacle and generate a 
		// new one with the same parameters
		if($newLane >= 1) {
			$left = $(this).css("left");
			$height = $(this).css("height");
			$(this).remove();

			$target = $('<div></div>');
			$target.addClass("target").css({"left": $left, "height": $height, "top": "0"});
			
			$block = $('<div></div>');
			$block.addClass("obstacle");
			$target.append($block);

			$($newId).append($target);

		// If the new lane is invalid, do not change the obstacle, and instead run the easter egg
		} else {
			easterEgg();
		}

	});

	// Swipe down listener
	jQuery("div.target").on("swipedown", function(event) {
		$parentId = $(this).parent().attr("id").replace(/[^\d.]/g, "");
		$newLane = parseInt($parentId) + 1;
		$newId = "#t" + $newLane;

		if($newLane <= $lanes) {
			$left = $(this).css("left");
			$height = $(this).css("height");
			$(this).remove();

			$target = $('<div></div>');
			$target.addClass("target").css({"left": $left, "height": $height, "top": "0"});
			
			$block = $('<div></div>');
			$block.addClass("obstacle");
			$target.append($block);

			$($newId).append($target);
			setObsListeners();
		} else {
			easterEgg();
		}
	});
}

// Randomly selects an image and replaces the pause button with that image
function easterEgg() {
	$rand = Math.floor(Math.random() * 4);
	switch ($rand) {
		case 0:
			$newImg = "images/jim.png";
			break;
		case 1:
			$newImg = "images/geoff.png";
			break;
		case 2:
			$newImg = "images/daniel.png";
			break;
		case 3:
			$newImg = "images/jesse.png";
			break;
		case 4:
			$newImg = "images/kelvin.png";
			break;
	}

	$("img#pause").attr("src", $newImg);
}

// Generates a random interval that is plus or minus a standard interval relative to the tick length
function randomIntForInterval(){
    return Math.floor(Math.random() * (601) + (140*$tickLength));
}

// Moves all obstacles by 1 pixel.
$cScore = 0;
function move() {
	$blocks = $(".target");
	$offLeft = parseInt($("div#container").css("margin-left")) - 20;

	$blocks.each(function() {
		$newLeft = parseInt($(this).css("left")) - 1;
		$(this).css("left", $newLeft + "px");

		// Deletes any obstacles that have travelled to the right off screen.
		if ($newLeft <= 0) {
			$(this).remove();
			$cScore += 1;
		}
	});

	$("span#cScore").html($cScore);
	collision();
}

// Removes obstacle if it collides with a sprite.
function collision() {
    var block = $(".target");
    $innerMargin = parseInt($("div.obstacle").css("margin-left"));
    // Left position of each sprite.
    var spritePos1 = $("#s1").offset().left;
    var spritePos2 = $("#s2").offset().left;
    $leftOffset = 25 - $innerMargin;
    $rightOffset = -$innerMargin;
	
	$(block).each(function() {
		var object = $(this).offset().left;
		if ($(this).parent().is("#t1")) {
			if ((object <= spritePos1 + $leftOffset) && (object >= spritePos1 + $rightOffset)) {
				$(this).remove();
			}
		}
		if ($(this).parent().is("#t2")) {
			if ((object <= spritePos2 + $leftOffset) && (object >= spritePos2 + $rightOffset)) {
				$(this).remove();
			}
		}
		if ($(this).parent().is("#t3")) {
            var spritePos3 = $("#s3").offset().left;
			if ((object <= spritePos3 + $leftOffset) && (object >= spritePos3 + $rightOffset)) {
				$(this).remove();
			}
		}
		if ($(this).parent().is("#t4")) {
            var spritePos3 = $("#s3").offset().left;
            var spritePos4 = $("#s4").offset().left;
			if ((object <= spritePos4 + $leftOffset) && (object >= spritePos4 + $rightOffset)) {
				$(this).remove();
			}
		}
	});
}

<<<<<<< HEAD
    //loads game start overlay on game load
function openStartOverlay() {
    document.getElementById("startOverLay").style.height = "100%";

    //opens pause overlay and stops obstacle movement
=======
// Starts the game from start overlay
function startGame() {
	$("div#startOverlay").fadeOut(300);
	gameStart = setInterval('tick();', $tickLength);
}

>>>>>>> c02f34c6ce751a9da69d032e2ff04e4e1541e258
    //loads game paused overlay on clicking pause button
function openPauseOverlay() { 
    $("div#pauseOverlay").fadeIn(300); 
    clearInterval(gameStart); 
}
    //closes pause overlay and resumes obstacle movement
function closePauseOverlay(){
    $("div#pauseOverlay").fadeOut(300);
    gameStart = setInterval('tick();', $tickLength);   
}

function gameEnd() {
	if ($cScore >= $scorePass) {
		$("span#cScore").html($cScore);
		$("div#passedOverlay").fadeIn(300);
	} else {
		$("span#cScore").html($cScore);
		$("div#failedOverlay").fadeIn(300);
	}
}
}

// Play sound on swipe NOT WORKING
function swipeAudio() {
	jQuery("div.target").on("swipedown", function(event) {
		alert("fml");
    	//$.playSound('http://localhost/swipeaway/audio/psst1.ogg');
	});
}
