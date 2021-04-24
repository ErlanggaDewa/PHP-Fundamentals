<?php
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "6706201053_DBbuku";
$nim_tbbuku = "6706201053_tbbuku";

$conn = mysqli_connect($server, $username, $pass, $dbname);

function prepareDB()
{
	global $server, $username, $pass, $dbname;

	$connDatabase = mysqli_connect($server, $username, $pass);

	//  CREATE COONECTION AND CHECK THE CONNECTION
	if (!$connDatabase) die("Connection failed : " . mysqli_connect_error());

	//  CREATE DATABASE AND TABLE ALSO CHECK CONNECTION
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($connDatabase, $sql)) die("Can't create database : " . mysqli_error($connDatabase));

	$sql = "CREATE TABLE IF NOT EXISTS `6706201053_TBbuku` (
	`id_buku` INT(3) NOT NULL AUTO_INCREMENT,
	`judul_buku` VARCHAR(75) NOT NULL,
	`pengarang` VARCHAR(50),
	`penerbit` VARCHAR(50),
	PRIMARY KEY (`id_buku`)) ENGINE=InnoDB";

	global $conn;

	if (!mysqli_query($conn, $sql)) die("Can't create table : " . mysqli_error($conn));
	//  END OF CREATE DATABASE AND TABLE ALSO CHECK CONNECTION
}

function fetchData()
{
	global $conn, $nim_tbbuku;
	$query = "SELECT * FROM $nim_tbbuku";
	$fetch = mysqli_query($conn, $query);
	$rows = [];
	while ($data = mysqli_fetch_assoc($fetch)) {
		$rows[] = $data;
	}

	return $rows;
}

function inputData($data)
{
	global $conn, $nim_tbbuku;
	$judul_buku = htmlspecialchars($data["judul_buku"]);
	$pengarang = htmlspecialchars($data["pengarang"]);
	$penerbit = htmlspecialchars($data["penerbit"]);

	$query = "INSERT INTO $nim_tbbuku VALUES(default,'$judul_buku','$pengarang','$penerbit')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function deleteData($data)
{
	global $conn, $nim_tbbuku;
	$query = "DELETE FROM $nim_tbbuku WHERE id_buku = $data";
	mysqli_query($conn, $query);
}
