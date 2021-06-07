<?php
require "config.php";

//Parameter check
if (!isset($_GET['catid'])) die("Error Category ID required");


$result = mysqli_query($conn, 'SELECT id, label, sunda FROM word WHERE cat_id = ' . $_GET['catid']);

//Initialize array variable
$data = array();

//Fetch into associative array
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

//Print array in JSON format
echo (json_encode($data));
