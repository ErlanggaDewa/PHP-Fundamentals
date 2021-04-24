<?php

// * KONEKSI KE DATABASE
// ? mysqli_connect("host","username","password","nama database"); -> untuk connect ke database
$conn = mysqli_connect("localhost", "root", "", "data mahasiswa");


// * AMBIL DATA DARI DATABASE
// ? mysqli_query("koneksi web", "syntax SQL"); -> untuk meng-query / mengambil data dari database
// ? ketika ada data didalamnya maka bersifat true , jika data didalamya tidak ada atau salah maka bernilai false
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ? jalankan code dibawah ini untuk membuktikan argumen diatas
// if (!$result) {
//     echo mysqli_error($conn);
// }

// * AMBIL DATA (FETCH) MAHASISWA DARI $RESULT -> ADA BEBERAPA CARA
// var_dump(mysqli_fetch_all($result)); // ! ambil semua data  dengan array numerik
// var_dump(mysqli_fetch_row($result)); // ! ambil 1 baris data dengan array numerik
// var_dump(mysqli_fetch_assoc($result)); // ! ambil 1 baris data dengan array assosiatif
// var_dump(mysqli_fetch_array($result)); // ! ambil 1 baris data dengan array numerik sekaligus array assosiatif
// var_dump(mysqli_fetch_object($result)); // ! ambil 1 baris data sebagai object
