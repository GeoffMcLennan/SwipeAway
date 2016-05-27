<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	require_once("config_host.php");

	$score = $_POST['score'];
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());

	if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
		// Get user info
		$id = $_SESSION['SESS_MEMBER_ID'];
		$user = $_SESSION['SESS_USERNAME'];

		// Check to see if the user already has the achievement
		$check = "SELECT * FROM members WHERE id='" . $id . "'";
		$result = mysqli_query($link, $check);
		$member = mysqli_fetch_assoc($result);
	}

	if ($score >= 100 && $score < 105) {
		if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
			if ($member['ach002'] != 1) {
				$update = "UPDATE members SET ach002=1 WHERE id='" . $id . "'";
				$insert = mysqli_query($link, $update);
			}
		}

		echo "ach002";
	}
	if ($score >= 500 && $score < 505) {
		if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
			if ($member['ach003'] != 1) {
				$update = "UPDATE members SET ach003=1 WHERE id='" . $id . "'";
				$insert = mysqli_query($link, $update);
			}
		}

		echo "ach003";
	}

?>