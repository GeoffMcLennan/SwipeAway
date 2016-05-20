<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('config_local.php');

	if (isset($_SESSION['SESS_MEMBER_ID'])) {
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Failed to connect to server: ' . mysqli_error($link));

		$score = $_POST['score'];
		$id = $_SESSION['SESS_MEMBER_ID'];
		$name = $_SESSION['SESS_USERNAME'];

		// Add score to users scores
		$qry2 = "INSERT INTO scores(id, score) VALUES ('" . $id . "', '" . $score . "')";
		$result2 = mysqli_query($link, $qry2) or die(mysqli_error($link));

		// Check to see if a new high score was made, and if it was update it.
		$qry = "SELECT * FROM members WHERE id='" . $_SESSION['SESS_MEMBER_ID'] . "'";
		$result = mysqli_query($link, $qry);
		$member = mysqli_fetch_assoc($result);
		$highscore = $member['highscore'];

		if ($score > $highscore) {
			$qry = "UPDATE members SET highscore='" . $score . "' WHERE id='" . $id . "'";
			$result = mysqli_query($link, $qry);
			echo "true";
		} else {
			echo "false";
		}
	}

?>