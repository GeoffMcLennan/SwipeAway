<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('lib/config_host.php');
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
<body>

	<div id="topBar">
		<a href="index.php" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
		<a href="login.php" class="account" rel="external">Login</a>
	</div>
	
	<div id="title">
		<h1 id="titleText">SwipeAway</h1>
	</div>

	<div id="phperr">
		<?php
			if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
				foreach ($_SESSION['ERRMSG_ARR'] as $error) {
					echo $error . "<br>";
				}

				unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</div>
	
	<form method="POST" id="signup" data-ajax="false" action="lib/newuser.php">
		<ul id="options">
			<li><input type="text" class="inputs" name="username" placeholder="Username" rel="external"></li>
			<li><input type="email" class="inputs" name="email" placeholder="Email" rel="external"></li>
			<li><input type="password" class="inputs" name="pass1" placeholder="Password" rel="external"></li>
			<li><input type="password" class="inputs" name="pass2" placeholder="Re-Enter Password" rel="external"></li>

			<li><a class="btn btn-default" id="su_submit" rel="external">Sign Up</a></li>
		</ul>
	</form>
</body>
</html>