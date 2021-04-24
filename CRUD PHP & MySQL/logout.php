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
setcookie('login', '', -3600);

header("Location: login.php");
