<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<meta name="viewport" content="width=device-width, user-scalable=no">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
	<script>
	$lanes = 4;
	$tickLength = 5;
	$gameLength = 60000;
	$scorePass = 40;
	$levelNum = 3;
	</script>
	<script src="scripts/game.js"></script>
	<script src="scripts/swipemod.js"></script>

</head>
<body>
<div id="desktop">
<h1>SwipeAway</h1>
</div>

<div id="container">

	<!-- Game start overlay -->
	<?php require_once('lib/startoverlay.php'); ?>

	<!-- Level passed overlay -->
	<?php require_once('lib/levelpassed.php'); ?>

	<!-- Level failed overlay -->
	<?php require_once('lib/levelfailed.php'); ?>

	<div id="ui">
		<div id="progress"><div id="cProgress"></div></div>
		<div id="score">Score: <span id="cScore">0</span> / <span id="scorePass"></span></div>
		<div id="pause"><img src="images/pause.png" id="pause"></div>
		<!-- UI Bar -->
	</div>
	<div class="track" id="t1">
		<!-- Track 1 -->
	</div>
	<div class="track" id="t2">
		<!-- Track 2 -->
	</div>
	<div class="track" id="t3">
		<!-- Track 3 -->
	</div>
	<div class="track" id="t4">
		<!-- Track 4 -->
	</div>
</div>
<h2 id="portError">You are holding your phone in portrait mode.<br>
For the best experience playing our game, please hold your phone in landscape mode.</h2>
</body>
</html>