<?php
require('config.php');
prepareDB();
$data = fetchData();
if (isset($_GET['delete_target'])) {
    deleteData($_GET['delete_target']);
    header("Location: index.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="content read container">
        <h2>List Book</h2>
        <a href="inputBook.php" class="input-book">Input Book</a>
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
                        <td><?= $value["judul_buku"] ?></td>
                        <td><?= $value["pengarang"] ?></td>
                        <td><?= $value["penerbit"] ?></td>
                        <td>
                            <form action="" method="GET">
                                <button type="submit" class="btn btn-outline-danger" name="delete_target" value="<?= $value['id_buku'] ?>" onclick="return confirm('Yakin Hapus ?')">
                                    <i class="bi bi-trash"></i>
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