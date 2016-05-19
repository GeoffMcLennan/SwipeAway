<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('config_local.php');

	// Array that stores validation errors
	$errmsg_arr = array();

	// Validation error flag
	$errflag = false;

	// Connect to database

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Failed to connect to server: ' . mysqli_error());

	// Function to sanitize form inputs
	function clean($str, $link) {
		$str = trim($str);
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link, $str);
	}

	$user = clean($_POST['username'], $link);
	$email = clean($_POST['email'], $link);
	$pass1 = clean($_POST['pass1'], $link);
	$pass2 = clean($_POST['pass2'], $link);

	// Input validation
	if ($user == '') {
		$errmsg_arr[] = 'Username is missing.';
		$errflag = true;
	}

	if ($email == '') {
		$errmsg_arr[] = 'Email is missing.';
		$errflag = true;
	}

	if ($pass1 == '') {
		$errmsg_arr[] = 'Password is missing.';
		$errflag = true;
	}

	if ($pass2 == '') {
		$errmsg_arr[] = 'Password is missing.';
		$errflag = true;
	}

	if (strcmp($pass1, $pass2) != 0) {
		$errmsg_arr[] = 'Passwords do not match.';
	}

	// Check for duplicate username and email

	if ($user != '') {
		$qry = 'SELECT * FROM members WHERE username="'.$user.'"';
		$result = mysqli_query($link, $qry);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = 'Username already in use.';
				$errflag = true;
			}
			@mysqli_free_result($result);
		} else {
			die('Username compare failure.');
		}
	}

	if ($email != '') {
		$qry = 'SELECT * FROM members WHERE email="'.$email.'"';
		$result = mysqli_query($link, $qry);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = 'Email already in use.';
				$errflag = true;
			}
			@mysqli_free_result($result);
		} else {
			die('Email compare failure.');
		}
	}

	// If there are input validation errors, redirect back to the registration form
	if ($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('Location: '.HOME.'/signup.php');
		exit();
	}

	// Insert new information into database
	$qry = 'INSERT INTO members(username, email, password) VALUES("'.$user.'","'.$email.'","'.md5($_POST['pass1']).'")';
	$result = mysqli_query($link, $qry);

	// Get the newly created user ID
	$id = mysqli_insert_id($link);
	echo $id;

	// Confirm row creation, set user variables, and link to home page.
	if ($result) {
		$_SESSION['SESS_MEMBER_ID'] = $id;
		$_SESSION['SESS_USERNAME'] = $user;
		header("Location: " . HOME . "/index.php");
		exit();
	} else {
		die("Row creation failure.");
	}
?>