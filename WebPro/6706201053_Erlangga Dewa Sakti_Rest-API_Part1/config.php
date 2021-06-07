<?php
// Pastikan script PHP disimpan di htdocs folder "rest"
// Aplikasi Android akan melakukan request ke http://10.0.3.2/rest/

$server = 'localhost';
$user = 'root';
$pass = '';
$db = '6706201053_rest-api-1';

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
	die('Connection error: ' . mysqli_connect_error());
}
