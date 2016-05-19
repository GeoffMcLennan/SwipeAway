<?php

	if (!isset($_SESSION)){
		session_start();
	}

	require_once("config_local.php");
	
	$errmsg_arr = array();
	
	$errflag = false;
	
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());
	
	function clean($str, $link) {
		$str = trim($str);
		if (get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link, $str);
	}
	
	$user = $_POST['username'];
	
	$pass = $_POST['password'];
	
	$user = clean($user, $link);
	
	$pass = clean($pass, $link);
	
	if ($user == '') {
		$errmsg_arr[] = 'Username is missing.';
		$errflag = true;
	}
	
	if ($pass == '') {
		$errmsg_arr[] = 'Password is missing.';
		$errflag = true;
	}
	
	$query = "SELECT * FROM members WHERE username='" . $user . "' AND password='" . md5($_REQUEST['password'])."'";
	
	$result = mysqli_query($link, $query);
	
	if ($result){
		if (mysqli_num_rows($result)==1){
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION["SESS_MEMBER_ID"] = $member["id"];
			$_SESSION["SESS_USERNAME"] = $member["username"];
			session_write_close();
			header("location: " . HOME . "/index.html");
			exit();
		} else {
			$errmsg_arr[]="Login Failed";
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("location: " . HOME . "/login.php");
			exit();
		}
	} else {
		die("Query Failed");
	}
?>