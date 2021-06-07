<?php
require "config.php";

//Fetch categories from database
$result = mysqli_query($conn, 'SELECT id, label FROM category');

//Initialize array variable
$data = array();

//Fetch into associative array
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

//Print array in JSON format
echo (json_encode($data));
