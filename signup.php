<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('lib/config_local.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/SwipeAway/css/base.css">	
	<link rel="stylesheet" href="/SwipeAway/css/2048theme.css">	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css">
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
	<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="scripts/menus.js"></script>
</head>
<body>

	<div id="topBar">
		<a href="index.html" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
		<a href="login.html" class="account" rel="external">Login</a>
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
			}
		?>
	</div>
	
	<form method="POST" id="signup" data-ajax="false" action="/SwipeAway/lib/newuser.php">
		<ul id="options">
			<li><input type="text" class="inputs" name="username" placeholder="Username" rel="external"></li>
			<li><input type="email" class="inputs" name="email" placeholder="Email" rel="external"></li>
			<li><input type="password" class="inputs" name="pass1" placeholder="Password" rel="external"></li>
			<li><input type="password" class="inputs" name="pass2" placeholder="Re-Enter Password" rel="external"></li>

			<li><a class="btn btn-default" id="su_submit" href="" rel="external">Sign Up</a></li>
		</ul>
	</form>
</body>
</html>