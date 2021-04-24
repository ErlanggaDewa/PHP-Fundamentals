<?php
require("functionDBS.php");

// * CEK SESSION LOGIN
if (!$_SESSION["login"]) {
	header("Location: login.php");
}

$dataMahasiswa = fetchDBMS("SELECT * FROM mahasiswa");

// * UNTUK FIND DATA 
if (isset($_POST["cari"])) {
	$dataMahasiswa = findDataDBMS($_POST["keywordCari"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		div {
			text-align: center;
		}

		div table {
			margin: auto;
		}
	</style>
</head>

<body>
	<div>
		<h1>Data Mahasiswa</h1>
		<a href="logout.php">logout</a>
		<br>
		<br>
		<a href="tambah.php">Tambah Data Mahasiswa</a>
		<br>
		<br>
		<br>
		<form action="" method="post">
			<input type="text" id="keywordCari" name="keywordCari" size="30px" placeholder="Masukan keyword pencarian !!!" autofocus autocomplete="off">
			<button type="submit" name="cari">cari</button>
		</form>
		<br>
		<br>
		<div id="container">
			<table border="1px solid black" cellspacing="0" cellpadding="20px">
				<tr>
					<th>No.</th>
					<th>Profil Gambar</th>
					<th>Aksi</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Email</th>
					<th>Asal Universitas</th>
				</tr>
				<?php $nomor = 1; ?>
				<?php foreach ($dataMahasiswa as $dataPerMahasiswa) : ?>
					<tr>
						<td><?= $nomor ?></td>
						<?php $nomor++; ?>
						<td><img src="<?= $dataPerMahasiswa["Profil_Gambar"] ?>" alt="Profil Gambar" width="100px" height="100px"></td>
						<td>
							<form action="ubah.php" method="get">
								<?php $idChange = $dataPerMahasiswa['id'] ?>
								<button name="idTargetChange" value="<?= $idChange ?>">ubah</button>
							</form>
							<br>
							<form action="hapus.php" method="post">
								<?php $idDeleted = $dataPerMahasiswa['id']; ?>
								<button name="idTargetDeleted" type="submit" value="<?= $idDeleted ?>" onclick="return confirm('YAKIN HAPUS ?');">hapus</button>
							</form>
						</td>
						<td><?= $dataPerMahasiswa["Nama"] ?></td>
						<td><?= $dataPerMahasiswa["NIM"] ?></td>
						<td><?= $dataPerMahasiswa["Email"] ?></td>
						<td><?= $dataPerMahasiswa["Asal_Universitas"] ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<script src="JS/ajax.js"></script>
</body>

</html>