	<?php
	session_start();
	if (isset($_COOKIE["login"])) {

		if ($_COOKIE["login"] == "true") {
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
		<title>Data Formasi-4403</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>

		<div class="container mt-4">
			<h1>Halaman Administrator</h1>
			<br>


			<?php
			require 'connect2.php';
			echo "selamat datang " . "<b>" . $_SESSION["user"] . "</b><br><br>";

			$query = mysqli_query($conn, "SELECT * FROM formasi"); // Perbaiki Query sesuai yg diminta

			echo "<a href=\"./adminTambahFormasi.php\">Tambah Data</a>";
			if (mysqli_num_rows($query) > 0) { //Tambahkan kode untuk menampilkan data formasi dalam tabel
				$rows = [];
				while ($data = mysqli_fetch_assoc($query)) { //! fect dengan array assosiatif
					$rows[] = $data;
				}
			} else {
				echo "<br>0 results";
			}
			?>

			<table border="1px solid black" cellspacing="0" cellpadding="5px">
				<tr>
					<th>ID</th>
					<th>Formasi</th>
				</tr>
				<?php foreach ($rows as $hasil) : ?>
					<tr>
						<td><?= $hasil['id_formasi'] ?></td>
						<td><?= $hasil['formasi'] ?></td>
					</tr>
				<?php endforeach; ?>
			</table>

			<br>
			<a href="./administrator.php">Back To Admin</a>
			<br>
			<br>
			<a class="btn btn-primary mt-4" href="logout.php" role="button" onclick="return confirm('yakin akan logout ?')">Logout</a>
		</div>

	</body>

	</html>