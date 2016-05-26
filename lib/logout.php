<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	session_unset();
	session_destroy();

	require_once('config_local.php');

	header('Location: ' . HOME . '/index.php');
?>