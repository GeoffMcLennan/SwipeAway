<?php
if (isset($_POST['checkbox'])) {
                setcookie('userInfo', $userId, time() + (60*60*24+30), "/");
            }
            
            if (isset($_COOKIE['userInfo'])) {
    $userAccount = $_COOKIE['userInfo'];
    session_start();
    $_SESSION['account'] = $userId;
    
    header('Location: /index.php');
} else {
    header('Location: /login.php');
}
?>