<?php 
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}
?>

<div id="pauseOverlay" class="overlay">
	<div id="overlayTitle">
		<h1>Game Paused</h1>
	</div>

     <h2 class="innerText">Current score: <span id="cScore">0</span></h2>

    <?php 
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
			echo '<h2 class="innerText">Best: ' . $highscore . '</h2>';
		}
	?>

	<div id="options">
		<a class="button" id="quit" href="index.php" rel="external">Quit</a>
		<a class="button" id="continue" onclick="closePauseOverlay()" rel="external">Continue</a>
	</div>
</div>