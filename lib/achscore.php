<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	require_once("config_local.php");

	$score = $_POST['score'];

	if ($score >= 100 && $score < 105) {
		echo "ach002";
	}
	if ($score >= 500 && $score < 505) {
		echo "ach003";
	}

?>