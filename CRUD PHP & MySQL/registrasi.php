<?php
require("functionDBS.php");



if (isset($_POST["submit"])) {

	if ($_POST["password"] === $_POST["passwordVerif"]) {
		$username = strtolower($_POST["username"]);
		$cekusername = cekResult("SELECT User_Name FROM account_database WHERE User_Name = '$username'");

		if ($cekusername > 0) {
			echo "<script>
				alert('username anda sudah terdaftar')
				</script>";
		} else {
			if (addAccount($_POST) > 0) {
				echo "<script>
					alert('Registrasi Berhasil')
					</script>";
			} else {
				echo "<script>
					alert('Registrasi Gagal')
					</script>";
			}
		}
	} else {
		echo "<script>
		alert('Password anda tidak cocok')
		</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1>Daftar</h1>
	<form action="" method="post">
		<table>
			<tr>
				<td>
					<label for="username">Username</label>
				</td>
				<td>
					<input type="text" name="username" id="username">
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Password</label>
				</td>
				<td>
					<input type="password" name="password" id="password">
				</td>
			</tr>
			<tr>
				<td>
					<label for="passwordVerif">Retype Password &nbsp;</label>
				</td>
				<td>
					<input type="password" name="passwordVerif" id="passwordVerif">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<br>
					<button style="margin-right: 20px;" name="submit">Daftar</button>
					<a href="login.php">Login</a>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>