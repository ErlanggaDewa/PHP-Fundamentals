<?php
include('connect.php');
//kode php disini
cekSession();
$data = fetchData();
?>

<!DOCTYPE html>
<html>

<head>
	<title>admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<div class="container mt-4">
		<h1>Halaman Administrator</h1>

		<?php
		echo "selamat datang " . "<b>" . $_SESSION["user"] . "</b>";
		?>
		<table border="1px" cellpadding="5px">
			<tr>
				<th>ID User</th>
				<th>Username</th>
			</tr>
			<?php foreach ($data as $data) : ?>
				<tr>
					<td><?= $data['iduser'] ?></td>
					<td><?= $data['username'] ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<br>
		<a class="btn btn-primary mt-4" href="logout.php" role="button" onclick="return confirm('yakin akan logout ?')">Logout</a>
	</div>
</body>

</html>