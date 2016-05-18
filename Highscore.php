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

	<script src="scripts/menus.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div id="topBar">
	<a href="index.html" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
	</div>
	
	<div id="subTitle">
		<h1>Highscores</h1>
	</div>
	
    <div id="levels">
        <table id="table">
            <?php include '/lib/scores.php';?>
        </table>
    </div>

</div>

</body>
</html>