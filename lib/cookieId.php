<?php
if (!isset($_SESSION)){
	session_start();
}
/*
	require_once("config_local.php");

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());

$user = $_SESSION["SESS_USERNAME"];

$query = "SELECT * FROM members WHERE username='" . $user . "'";
$result = mysqli_query($link, $query);

if ($result){
		if (mysqli_num_rows($result)==1){
			$member = mysqli_fetch_assoc($result);
			$userID = $member["username"];
		}
	} else {
		die("Query Failed");
	}
*/
// If session variable is set, set cookie that expires in 30 days.

if (isset($_POST['checkbox'])) {
    $cookie_name = "user";
    $cookie_value = $_SESSION["SESS_USERNAME"];
    setcookie($cookie_name, $cookie_value, time() + (60*60*24+30), "/");
    echo $_COOKIE[$cookie_name];
}
?>