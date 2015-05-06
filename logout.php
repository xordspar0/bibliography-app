<?php
session_start();
$cookie = session_get_cookie_params();
setcookie(session_name(), "", time() - 3600);
session_destroy();

header("Location: login.php");
?>