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
	<title>Tambah Data-4403</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php 
require 'connect2.php';
if (isset($_POST["submit"])){
//KODE PHP UNTUK TAMBAH FORMASI DISINI!
//ambil data formasi hasil kiriman POST, masukkan kedalam variabel $formasi
//Buat perintah SQL untuk Insert data formasi baru ke dalam tabel 
//Jika tambah data berhasil munculkan notifikasi berhasil dengan java script
//Jika ditekan OK maka akan di-redirect ke adminDataFormasi.php
}
?>


<body>

	<div class="container mt-3" >
		<h1>Tambah Data Formasi</h1>
		<form action="" method="POST">
			<input type="text" name="formasi" placeholder="formasi" autocomplete="off" required="true" autofocus="on"><br>
			<br>
			<button type="submit" name="submit">Tambah Data</button> <br>
			
		</form>
		<br>
	<a href="http://localhost/asesmen2/administrator.php">Back To Admin</a>
	<br>
	<a class="btn btn-primary mt-4" href="logout.php" role="button" 
	onclick="return confirm('yakin akan logout ?')">Logout</a>
	</div>
	</div>

</body>
</html>