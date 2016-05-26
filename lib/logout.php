<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	session_unset();
	//session_destroy();
    //setcookie($cookie_name, '', time() - (60*60*24*30), "/");

	require_once('config_local.php');

	header('Location: ' . HOME . '/index.php');
?>