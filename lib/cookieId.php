<?php
if (!isset($_SESSION)){
	session_start();
}

// If session variable is set, set cookie that expires in 30 days.
if (isset($_SESSION["SESS_USERNAME"])) {
    $cookie_name = "user";
    $cookie_value = $_SESSION["SESS_USERNAME"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
} /*else {
    $cookie_name = "user";
    $cookie_value = $_SESSION["SESS_USERNAME"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30));   
}*/
?>