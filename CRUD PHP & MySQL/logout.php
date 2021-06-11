<?php
require("functionDBS.php");

// * CEK SESSION LOGIN
if (!$_SESSION["login"]) {
    header("Location: login.php");
}

// * DELETE SESSION
$_SESSION = [];
session_unset();
session_destroy();

// * DELETE COOKIE
setcookie('login', '', time() - 3600);
unset($_COOKIE['login']);

header("Location: login.php");
exit();
