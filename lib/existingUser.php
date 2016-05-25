<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["SESS_USERNAME"])) {
    $cookie_name = $_SESSION["SESS_USERNAME"];
    $cookie_value = $_SESSION["SESS_PASS"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
    echo $COOKIE[$cookie_name];
}
?>