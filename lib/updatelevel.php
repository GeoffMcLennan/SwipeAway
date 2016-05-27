<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	require_once("config_host.php");

	$passed = $_POST['level'];
	$level = $_SESSION['level'];	

	if ($passed >= $level) {
		$level++;
		$_SESSION['level'] = $level;

		if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
			// Get user info
			$id = $_SESSION['SESS_MEMBER_ID'];
			$user = $_SESSION['SESS_USERNAME'];

			// Connect to db
			$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());

			$qry = "UPDATE members SET level='" . $level . "' WHERE id='" . $id . "'";
			$result = mysqli_query($link, $qry);
		}

		if ($level == 4) {
			if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {
				$qry = "UPDATE members SET ach001=1 WHERE id='" . $id . "'";
				$result = mysqli_query($link, $qry);
			}
			echo "true";
		}

	}

?>