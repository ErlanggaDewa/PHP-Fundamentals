<?php
require('config.php');
prepareDB();
$data = fetchData("SELECT * FROM $nim_tbbuku");

if (isset($_GET['delete_target'])) {
    deleteData($_GET['delete_target']);
    header("Location: index.php");
};

if (isset($_POST['pencarian'])) {
    $data = findBook($_POST['pencarian']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="content read container">
        <h2>Daftar Buku</h2>
        <a href="input_book.php" class="input-book">Input Book</a>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan keyword pencarian ..." aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off" name="pencarian" autofocus>
                <button class="btn btn-outline-info ml-2" type="submit" id="button-addon2">
                    <i class="bi bi-search"> Cari </i>
                </button>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>ID Buku</td>
                    <td>Judul Buku</td>
                    <td>Pengarang</td>
                    <td>Penerbit</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $value) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value["id_buku"] ?></td>
                        <td class="data_buku"><?= $value["judul_buku"] ?></td>
                        <td class="data_buku"><?= $value["pengarang"] ?></td>
                        <td class="data_buku"><?= $value["penerbit"] ?></td>
                        <td>
                            <form action="" method="GET">
                                <button type="submit" class="btn btn-outline-danger" name="delete_target" value="<?= $value['id_buku'] ?>" onclick="return confirm('Yakin Hapus ?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <form action="edit_book.php" method="GET">
                                <button type="submit" class="btn btn-outline-primary mt-2" name="edit_target" value="<?= $value['id_buku'] ?>" onclick="window.location = 'edit_book.php'">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>