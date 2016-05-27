<?php
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
		<a name="link" class="button" id="quit" href="index.php" rel="external">Quit</a>
		<a class="button" id="resume" rel="external">Resume</a>
	</div>
</div>