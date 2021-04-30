	
	<?php 
	session_start();
	if (isset($_COOKIE["login"])){

				if ($_COOKIE["login"]=="true"){
					$_SESSION["login"] = true;
				}
			}

	if (!isset($_SESSION["login"])) {
		echo "<script>alert('Ilegal akses!');
		document.location.href='index.php';</script>";
		die;
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pelamar-4403</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container mt-4">
		<h1>Halaman PELAMAR</h1>
	
	<?php 
		require 'connect2.php';
		echo "selamat datang ". "<b>".$_SESSION["user"]."</b> di halaman Lowongan Kerja!<br><br>";
		$username =$_SESSION["user"];
		
		echo "<b> Berikut adalah Status Lamaran Anda:</b>";
		
		//PERBAIKI QUERY DISINI
		$query = mysqli_query($conn, "BUAT QUERY DISINI untuk mengambil username, formasi, dan status 
		dari tabel lamarkerja2 dan formasi");
		
		
		if (mysqli_num_rows($query) > 0) {
		// output data of each row
			echo "<table border='1'>";//start table
		//creating our table heading
			echo "<tr>";	
			echo "<th>Username</th>";
			echo "<th>Formasi</th>";
			echo "<th>Status</th>";
			echo "</tr>";

		//loop to show each records
		
			while($row = mysqli_fetch_assoc($query)) {
								
				extract($row);
				//creating new table row per record
				echo "<tr>";
				echo "<td>{$username}</td>";
				echo "<td>{$formasi}</td>";
				echo "<td>{$status}</td>";
				echo "</tr>";				
			}
			echo "</table>";//end table

		} else {
			echo "<br><b>   Lamaran Kerja sdr/i $username masih kosong </b>";
			echo "<br> Silahkan melamar salah satu formasi di bawah ini:<br>";
		  
		  //BUAT QUERY UNTUK MENAMPILKAN DATA FORMASI YANG ADA
		  
		}
		
	?>

	<br>
	<a class="btn btn-primary mt-4" href="logout.php" role="button" 
	onclick="return confirm('yakin akan logout ?')">Logout</a>
	</div>
</body>
</html>