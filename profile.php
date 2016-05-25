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
	
	<title>SwipeAway - Settings</title>
</head>
<body>
	<div id="topBar">
	<a href="index.php" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
	</div>
	
	<div id="subTitle">
		<h1>Profile</h1>
	</div>

	<h2 class="innerText">Welcome back <?php echo $_SESSION["SESS_USERNAME"] ?>!</h2>

	<h2 class="innerText">Your BEST score is . $highscore . </h2>
	

</body>
</html>