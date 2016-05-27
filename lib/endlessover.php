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
	You scored: <span id="cScore"></span> 
	</h2>
	
	<?php 
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
			echo '<h2 class="innerText">Your Best: ' . $highscore . '</h2>';
		}
	?>

	<h2 class="innerText" id="congrats"></h2>
	
	<div id="options">
		<a name="link" class="button" id="quit" href="index.php" rel="external">Quit</a>
		<a name="link" class="button" id="retry" rel="external" href ="endless.php">Retry</a>
	</div>
</div>