<?php
session_start();

$server = "localhost";
$username = "root";
$pass = "";
$dbname = "6706201053_loginsystem";
$table_name = "users";



$connDatabase = mysqli_connect($server, $username, $pass);

//  CREATE COONECTION AND CHECK THE CONNECTION
if (!$connDatabase) die("Connection failed : " . mysqli_connect_error());

//  CREATE DATABASE AND TABLE ALSO CHECK CONNECTION
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($connDatabase, $sql)) die("Can't create database : " . mysqli_error($connDatabase));

$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
	`iduser` INT(5) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(30) NOT NULL,
	`password` VARCHAR(100),
	PRIMARY KEY (`iduser`)) ENGINE=InnoDB";

$conn = mysqli_connect($server, $username, $pass, $dbname);
if (!mysqli_query($conn, $sql)) die("Can't create table : " . mysqli_error($conn));
//  END OF CREATE DATABASE AND TABLE ALSO CHECK CONNECTION

function register($infologin)
{
	global $conn, $table_name;

	$username = htmlspecialchars(stripslashes($infologin['username']));
	$cek = mysqli_query($conn, "SELECT username FROM $table_name WHERE username = '$username'");

	if (mysqli_num_rows($cek) > 0) {
		echo "<script> alert('username sudah ada!')";
		return false;
	}
	$password = mysqli_escape_string($conn, $infologin['password']);
	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO $table_name (username, password) VALUES ('$username', '$password')");

	return mysqli_affected_rows($conn);
}

function ceklogin($datalogin)
{
	global $conn, $table_name;
	$username = htmlspecialchars(stripslashes($datalogin['username']));
	$password = mysqli_escape_string($conn, $datalogin['password']);

	$sql = "SELECT * FROM $table_name WHERE username='$username'";
	$query = mysqli_query($conn, $sql);

	if (mysqli_num_rows($query) === 1) {
		$row_data = mysqli_fetch_assoc($query);
		if (password_verify($password, $row_data['password'])) {
			$_SESSION['user'] = $username;
			$_SESSION['login'] = true;
			if (isset($datalogin['rememberme'])) {
				setcookie('login', true, time() + 300);
				setcookie('user', $username, time() + 300);
			}
			Header('Location: administrator.php');
		}
	}
	if (mysqli_num_rows($query) === 0)
		echo "<script> alert('Username atau Password anda salah!')</script>";
}

function cekSession()
{
	if (isset($_COOKIE['login']) && $_COOKIE['login'] == true) {
		$_SESSION['login'] = true;
		$_SESSION["user"] = $_COOKIE['user'];
	}
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		echo "<script> alert('Ilegal Akses!');
		document.location.href = 'index.php';</script>";
	}
}

function fetchData()
{
	global $conn, $table_name;
	$query = "SELECT * FROM $table_name";
	$fetch = mysqli_query($conn, $query);
	$rows = [];
	while ($data = mysqli_fetch_assoc($fetch)) {
		$rows[] = $data;
	}

	return $rows;
}
