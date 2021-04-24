<?php
require('config.php');
if (isset($_POST['submit'])) {
    if (inputData($_POST)) {
        echo
        "<script>
            alert('Data buku berhasil ditambahkan');
            location.href = 'index.php';
        </script>";
    } else {
        "<script>
            alert('Data buku gagal ditambahkan');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="content update container pt-5">
        <h2>Input Book</h2>
        <hr>
        <form action="input_book.php" method="POST">
            <div class="form-group row">
                <label for="judul_buku" class="col-sm-3 col-md-2 col-form-label">Judul Buku</label>
                <div class="col-sm-9 col-md-10">
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pengarang" class="col-sm-3 col-md-2 col-form-label">Pengarang</label>
                <div class="col-sm-9 col-md-10">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="penerbit" class="col-sm-3 col-md-2 col-form-label">Penerbit</label>
                <div class="col-sm-9 col-md-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-2" name="submit">Input Data</button>
            <button type="reset" class="btn btn-danger mt-2 ml-2">Reset</button>
            <a href="index.php" class="btn btn-warning mt-2 ml-2">Kembali</a>
        </form>
    </div>
</body>

</html>