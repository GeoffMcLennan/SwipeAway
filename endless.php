<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('lib/config_host.php');

	if (isset($_SESSION['SESS_MEMBER_ID'])) {
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Failed to connect to server: ' . mysqli_error($link));

		$qry = "SELECT * FROM members WHERE id='" . $_SESSION['SESS_MEMBER_ID'] . "'";
		$result = mysqli_query($link, $qry);
		$member = mysqli_fetch_assoc($result);
		$highscore = $member['highscore'];
	}
?>

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
	$lives = 5;
	$cLives = 5;
	</script>
	<script src="scripts/endless.js"></script>
	<script src="scripts/swipemod.js"></script>

</head>
<body>
<div id="desktop">
<h1>SwipeAway</h1>
</div>

<div id="container">
	<!-- Game start overlay -->
	<div id="startOverlay" class="overlay">
		<div id="overlayTitle">
			<h1>Endless Mode</h1>
		</div>

		<h2 class="innerText">5 lives. Unlimited Obstacles</h2>
		
		<div id="options">
			<a class="button" id="quit" href="index.php" rel="external">Quit&nbsp;</a>
			<a class="button" id="start" rel="external">Start</a>
		</div>
	</div>

	<!-- Game over overlay -->
	<?php require_once("lib/endlessover.php"); ?>

	<!-- Game pause overlay -->
	<?php require_once('lib/pauseoverlay.php');?>

	<div id="ui">
		<div id="lives"></div>
		<div id="score"><span id="cScore">0</span></span></div>
		<div id="pause"><img src="images/pause.png" id="pause" onclick="openPauseOverlay()"></div>

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