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
	<a href="info.html" class="account" id="about" rel="external"><i class="material-icons">info_outline</i></a>
	</div>
	
	<div id="subTitle">
		<h1>Settings</h1>
	</div>
	
	<form>
		<ul id="acctOptions">
			<li><a class="btn btn-default" id="reset" href="" rel="external">Reset Profile</a></li>
			<li><a class="btn btn-default" id="delete" href="" rel="external">Delete Account</a></li>
			<li><a class="btn btn-default" id="tutorial" href="" rel="external">Replay Tutorial</a></li>
		</ul>
	</form>

</body>
</html>