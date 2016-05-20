<?php 
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		
	}
?>

<div id="passedOverlay" class="overlay">
	<div id="overlayTitle">
		<h1>Game Over</h1>
	</div>

	<h2 id="innerText">
	You scored: <span id="cScore"></span>pts 
	</h2>
	
	<?php 
		if(isset($_SESSION['SESS_MEMBER_ID'])) {
			echo '<h2 id="innerText">Your Highscore: ' . $highscore . '</h2>';
		}
	?>
	
	<div id="options">
		<a class="button" id="quit" href="index.php" rel="external">Quit&nbsp</a>
		<a class="button" id="start" href="level.php" rel="external">Next Level</a>
	</div>
</div>