<?php
require("functionDBS.php");

// * CEK SESSION LOGIN
if (!$_SESSION["login"]) {
    header("Location: login.php");
}

if (!isset($_GET["idTargetChange"])) {
    header("Location: index1.php");
}

$id = $_GET["idTargetChange"];
$selectedDataMahasiswa = fetchDBMS("SELECT * FROM mahasiswa WHERE id = $id");

// * FUNCTION UBAH DATA
if (isset($_POST["submit_edit"])) {
    if (editDBMS($_POST) > 0) {
        echo
        "<script>
            alert('Data Berhasil Diubah');
            location.href = 'index1.php';
        </script>";
    } else {
        echo
        "<script>
            alert('Data Tidak Ada Yang Diubah');
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
                <?php foreach ($selectedDataMahasiswa as $data) : ?>
                    <input type="hidden" value="<?= $_GET['idTargetChange'] ?>" name="id">
                    <input type="hidden" value="<?= $data['Profil_Gambar'] ?>" name="GambarLama">
                    <tr>
                        <td>
                            <label for="nama">Nama &nbsp;</label>
                        </td>
                        <td>
                            <input type="text" id="nama" name="Nama" size="50px" required value="<?= $data["Nama"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=" nim">NIM &nbsp;</label>
                        </td>
                        <td>
                            <input type="text" id="nim" name="NIM" size="50px" required value="<?= $data["NIM"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=" email">Email &nbsp;</label>
                        </td>
                        <td>
                            <input type="text" id="email" name="Email" size="50px" required value="<?= $data["Email"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=" univ">Asal Universitas &nbsp;</label>
                        </td>
                        <td>
                            <input type="text" id="univ" name="Asal_Universitas" size="50px" required value="<?= $data["Asal_Universitas"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gambar">Upload Profil</label>
                        </td>
                        <td>
                            <img src="<?= $data["Profil_Gambar"] ?>" alt="Gambar Profil" width="80px">
                            <br>
                            <input type="file" name="Profil_Gambar" value="<?= $data["Profil_Gambar"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <button type="submit" name="submit_edit">Edit</button>
                            &nbsp;&nbsp;
                            <button type="reset" name="reset">Undo</button>
                            &nbsp;&nbsp;
                            <button><a href="index1.php">Kembali</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </fieldset>
    </form>
</body>

</html>