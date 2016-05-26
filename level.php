<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	require_once("lib/config_local.php");

	// Gets level progress information from user
	// If not logged in defaults to 1 for level 1
	if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
		// Get user info
		$id = $_SESSION['SESS_MEMBER_ID'];
		$user = $_SESSION['SESS_USERNAME'];

		// Connect to db
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());

		// Get level info
		$qry = "SELECT * FROM members where id='" . $id . "' AND username='" . $user . "'";
		$result = mysqli_query($link, $qry);
		$member = mysqli_fetch_assoc($result);
		$level = $member['level'];
	} else {
		$level = 1;
	}

	// Sets session level variable
	$_SESSION['level'] = $level;
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

	<title>SwipeAway - Level Select</title>
</head>
<body>
	<div id="topBar">
	<a href="index.php" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
	</div>
	
	<div id="subTitle">
		<h1>Level</h1>
	</div>
	
	<div id="levels">
		<?php
			// Loops through levels to see if they are unlocked
			// If unlocked, link to level page; if locked, link nowhere
			for ($i = 1; $i <= 3; $i++) {
				if ($i <= $level) {
					echo '<a href="level' .$i. '.php" class="level" id="level' .$i. '" rel="external">' .$i. '</a>';
				} else {
					echo '<a class="level" id="level' .$i. '" rel="external"><img src="images/lock.png"></a>';
				}
			}
		?>
	</div>

	<div id="endless">
		<?php 
			// Checks to see if endless mode is unlocked
			// If user $level is less equal to 4, the level is unlocked
			// If user $level is less than 4, endless is locked
			if ($level == 4) {
				echo '<a id="endlessBtn" href="endless.php" rel="external">&#8734&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Endless</a>';
			} else {
				echo '<a id="endlessBtn" rel="external"><img src="images/lock.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Endless</a>';
			}
		?>
	</div>

<audio preload="auto" id="audioClick" src="audio/tick.ogg">
</body>
</html>