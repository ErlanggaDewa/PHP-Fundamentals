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
	<title>Edit Data-4403</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container mt-4">
		<h1>Halaman Administrator</h1>
		<br>

<?php
 require "connect2.php";
 
 $id = $_GET['id'];
 $sql = "SELECT * FROM lamarkerja2 WHERE id='$id'";
 $result = mysqli_query($conn, $sql);
 $r=mysqli_fetch_assoc($result);
 
 
 if (isset($_POST["submit"])){
	//BUAT KODE PHP DISINI
	//masukkan hasil POST ke dalam variabel : $iduser, $username, $id_formasi, $status, $id
	//Lakukan Query update berdasarkan data variabel-variabel diatas
	//Jika sukses maka tampilkan notifikasi edit data berhasil
	// Klik ok dan redirect ke adminDataPelamar.php
	//jika salah tampilkan message: terjadikesalahan
	}
?>

<h3>Form Edit Status Pelamar</h3>
<form method="post" action="">
<input type="hidden" 
       name="id" 
       value="<?php echo $r['id']; ?>">
<table>
 <tr>
 	<td>ID USer</td>
 	<td><input type="text" 
             name="iduser" 
             value="<?php echo $r['iduser']; ?>" /></td>
  </tr>
  <tr>
	<td>Username</td>
	<td><input type="text" 
             name="username" 
             value="<?php echo $r['username']; ?>" /></td>
  </tr>
  <tr>
  	<td>Formasi</td>
  	<td><input type="text" 
               name="id_formasi" 
               value="<?php echo $r['id_formasi']; ?>" /></td>
  </tr>
  <tr>
  	<td>Status</td>
  	
	<td><select name="status">
		<option value="<?php echo $r['status']; ?>"><?php echo $r['status']; ?></option>
		<option value="Terdaftar">Terdaftar</option>
         <option value="Diproses">Diproses</option>
		 <option value="Lulus">Lulus</option>
		 <option value="Tidak Lulus">Tidak Lulus</option>
		 </select>
               
  </tr>
  <tr>
	<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
  </tr>
</table>	
</form>
<br>
	<a href="http://localhost/asesmen2/administrator.php">Back To Admin</a>
	<br>
	<a class="btn btn-primary mt-4" href="logout.php" role="button" 
	onclick="return confirm('yakin akan logout ?')">Logout</a>
	</div>

</body>
</html>