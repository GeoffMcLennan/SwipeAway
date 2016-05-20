<?php 
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

?>

<div id="endOverlay" class="overlay">
	<div id="overlayTitle">
		<h1>Game Over</h1>
	</div>

	<h2 class="innerText">
	You scored: <span id="cScore"></span>pts 
	</h2>
	
	<?php 
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
			echo '<h2 class="innerText">Your Highscore: ' . $highscore . 'pts</h2>';
		}
	?>

	<h2 class="innerText" id="congrats"></h2>
	
	<div id="options">
		<a class="button" id="quit" href="index.php" rel="external">Quit</a>
		<a class="button" id="start" href="endless.php" rel="external">Retry</a>
	</div>
</div>