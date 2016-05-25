<?php
	
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	require_once("config_local.php");

	// Grab level information
	$passed = $_GET['level'];
	$level = $_SESSION['level'];

	// Compare level info, update if necessary
	if ($passed >= $level) {
		$level = $passed + 1;
		$_SESSION['level'] = $level;
	}

	if ($level <= 3) {
		header('Location: ' . HOME . '/level' . $level . '.php');
	} else {
		header('Location: ' . HOME . '/endless.php');
	}

?>