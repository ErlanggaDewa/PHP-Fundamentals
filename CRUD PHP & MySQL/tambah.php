<?php
require("functionDBS.php");

// * CEK SESSION LOGIN
if (!$_SESSION["login"]) {
    header("Location: login.php");
}

// * FUNCTION TAMBAH DATA
if (isset($_POST["submit_tambah"])) {
    if (addDBMS($_POST) > 0) {
        echo
        "<script>
            alert('Data Berhasil Ditambahkan');
            location.href = 'index1.php';
        </script>";
    } else {
        echo
        "<script>
            alert('Data Gagal Ditambahkan');
            location.href = 'index1.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
        }

        form {
            display: inline-block;
            margin: auto;
        }

        form fieldset {
            display: inline-block;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h3>Form Input Data Mahasiswa</h3>
            </legend>
            <table>
                <tr>
                    <td>
                        <label for="nama">Nama &nbsp;</label>
                    </td>
                    <td>
                        <input type="text" id="nama" name="Nama" size="50px" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nim">NIM &nbsp;</label>
                    </td>
                    <td>
                        <input type="text" id="nim" name="NIM" size="50px" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=" email">Email &nbsp;</label>
                    </td>
                    <td>
                        <input type="text" id="email" name="Email" size="50px" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="univ">Asal Universitas &nbsp;</label>
                    </td>
                    <td>
                        <input type="text" id="univ" name="Asal_Universitas" size="50px" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gambar">Upload Profil</label>
                    </td>
                    <td>
                        <input type="file" name="Profil_Gambar">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit_tambah">Tambah</button>
                        &nbsp;&nbsp;
                        <button type="reset" name="reset">reset</button>
                        &nbsp;&nbsp;
                        <button><a href="index1.php">Kembali</a></button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>