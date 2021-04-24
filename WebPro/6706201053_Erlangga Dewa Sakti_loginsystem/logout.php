<?php
//kode php disini
session_start();
session_unset();
session_destroy();
setcookie('login', true, time() - 3600);
Header('Location: index.php');
