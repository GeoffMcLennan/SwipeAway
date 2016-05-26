<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('lib/config_local.php');

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
	
	<title>SwipeAway - Profile</title>
</head>
<body>
	<div id="topBar">
	<a href="index.php" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
	</div>
	
	<div id="info">
		<h1>Profile</h1>
	</div>

	<h2 class="innerText">Welcome back <?php echo $_SESSION["SESS_USERNAME"] ?>!</h2>

	<h2 class="innerText">Your BEST score is: <?php echo $highscore;?></h2>

	<div id="info">
		<h1>Local Highscores</h1>
	</div>
	
	<div id="levels">
        <table id="table">
            <?php include 'lib/scores.php';?>
        </table>
    </div>
	

</body>
</html>