<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Local Stylesheets -->
	<link rel="stylesheet" href="css/base.css">	
	<link rel="stylesheet" href="css/2048theme.css">
	
	<!-- 3rd Party Stylesheets + Icon Font -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- 3rd Party JS libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
	
	<!-- Local JS -->
	<script src="scripts/menus.js"></script>
	
	<!-- Adjust screen nicely for mobile--> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
</head>
</head>
<body>
	<?php require_once('lib/topbar.php') ?>
	
	<div id="title">
		<h1 id="titleText">SwipeAway</h1>
	</div>

	<form>
		<ul id="options">
			<li><a class="btn btn-default" id="playButton" href="level1.php" rel="external">Play</a></li>
			<li><a class="btn btn-default" id="levelButton" href="level.php" rel="external">Level</a></li>
			<li><a class="btn btn-default" id="highscoreButton" href="highscore.php" rel="external">Highscore</a></li>
		</ul>
	</form>
</body>
</html>
