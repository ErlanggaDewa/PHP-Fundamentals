<?php
// * START SESSION
session_start();

// * CONNECT KE DATABASE
// $conn = mysqli_connect("localhost:3306", "erlanggadewa", "12122000Na", "erlanggadewa");
$conn = mysqli_connect("localhost", "root", "", "tabel_mahasiswa");

// * AMBIL DATA DARI DATABASE
function fetchDBMS($jenisQuery)
{
	global $conn;
	$result = mysqli_query($conn, $jenisQuery);
	mysqli_query($conn, $jenisQuery);
	$rows = [];
	while ($data = mysqli_fetch_assoc($result)) { //! fect dengan array assosiatif
		$rows[] = $data;
	}
	return $rows; //! hasil return array 2 dimensi
}

// * TAMBAH DATA KE DATABASE
function addDBMS($data)
{
	global $conn;

	$name = htmlspecialchars($data["Nama"]);
	$nim = htmlspecialchars($data["NIM"]);
	$email = htmlspecialchars($data["Email"]);
	$univ = htmlspecialchars($data["Asal_Universitas"]);

	// * CEK GAMBAR SEBELUM UPLOAD
	$gambar = uploadGambar();
	if (!($gambar)) {
		// ! jika gambar bernilai false maka fungsi addDBMS akan bernilai false
		return false;
	}

	$jenisQuery = "INSERT INTO mahasiswa VALUE (default,'$gambar','$name','$nim','$email','$univ')";
	mysqli_query($conn, $jenisQuery);
	return mysqli_affected_rows($conn);
}

// * HAPUS DATA DI DATABASE
function deleteDBMS($deleteID)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $deleteID");
	return mysqli_affected_rows($conn);
}

// * EDIT DATA DATABASE
function editDBMS($data)
{
	global $conn;
	$id = htmlspecialchars($data["id"]);
	$name = htmlspecialchars($data["Nama"]);
	$nim = htmlspecialchars($data["NIM"]);
	$email = htmlspecialchars($data["Email"]);
	$univ = htmlspecialchars($data["Asal_Universitas"]);

	$gambarLama = htmlspecialchars($data["GambarLama"]);
	if ($_FILES["Profil_Gambar"]["error"] === 4) {
		$gambar = htmlspecialchars($gambarLama);
	} else {
		$gambar = uploadGambar();
	}

	$jenisQuery = "UPDATE mahasiswa SET 
		Nama = '$name', 
		NIM = '$nim', 
		Email = '$email', 
		Asal_Universitas = '$univ',
		Profil_Gambar = '$gambar' 
		WHERE id = $id";
	mysqli_query($conn, $jenisQuery);
	return mysqli_affected_rows($conn);
}

// * CARI DATA DI DATABASE
function findDataDBMS($keyword)
{
	$jenisQuery = "SELECT * FROM mahasiswa WHERE 
		Nama LIKE '%$keyword%' OR
		NIM LIKE '%$keyword%' OR
		Email LIKE '%$keyword%' OR
		Asal_Universitas LIKE '%$keyword%'";

	return fetchDBMS($jenisQuery);
}

// * UPLOAD GAMBAR 

function uploadGambar()
{
	// ! $_FILES = array assosiatif 2 dimensi
	$namaGambar = $_FILES["Profil_Gambar"]["name"];
	$errorGambar = $_FILES["Profil_Gambar"]["error"];
	$sizeGambar = $_FILES["Profil_Gambar"]["size"];
	$tmpName = $_FILES["Profil_Gambar"]["tmp_name"];
	$ektensiValid = ["jpg", "jpeg", "png"];

	// * Mengambil ektensi gambar
	$ektensiGambar = explode(".", $namaGambar);
	$ektensiGambar = strtolower(end($ektensiGambar));

	if ($errorGambar === 4) {
		echo "<script>
				alert('Pilih Gambar Terlebih Dahulu');		
				</script>";
		return false;
	} else if ($sizeGambar > 5000000) {
		echo "<script>
				alert('Size Gambar Melebihi 5 mega byte');		
				</script>";
		return false;
	} else if ((!in_array($ektensiGambar, $ektensiValid))) {
		echo "<script>
				alert('Harap masukan gambar dengan type (jpg, jpeg, png)');		
				</script>";
		return false;
	} else { // ! STEP INI BERARTI SUKSES DAN SIAP UNTUK DI UPLOAD
		$namaGambarAcak = uniqid(uniqid());
		// ! memnindahkan gambar ke folder yang posisinya relatif terhadap file ini
		$namaGambarFinal = $namaGambarAcak . "." . $ektensiGambar;
		move_uploaded_file($tmpName, "img/" . $namaGambarFinal);
		return ("img/" . $namaGambarFinal);
	}
}

// * CEK APAKAH ADA DATA YANG DICARI
function cekResult($jenisQuery)
{
	global $conn;
	$result = mysqli_query($conn, $jenisQuery);
	return mysqli_num_rows($result);
}

function addAccount($data)
{
	global $conn;
	$userName = strtolower($data["username"]);
	$password = password_hash(mysqli_real_escape_string($conn, $data["password"]), PASSWORD_DEFAULT);
	$jenisQuery = "INSERT INTO account_database VALUE (default,'$userName', '$password','')";
	mysqli_query($conn, $jenisQuery);
	return mysqli_affected_rows($conn);
}

function loginAccount($jenisQuery, $data)
{
	global $conn;
	$result = mysqli_query($conn, $jenisQuery);
	$rowData = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) === 1) {
		if (password_verify($data["password"], $rowData["Password"])) {
			$_SESSION["login"] = true;
			if (isset($data["remember"])) {
				setcookie('login', true, time() + 300); // ! Setting cookie 5 menit
			}
			header("Location: index1.php");
		}
	}
}
