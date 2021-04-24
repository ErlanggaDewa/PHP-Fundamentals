<?php
require("../functionDBS.php");
$keyword = $_GET["keyword"];
$dataMahasiswa = findDataDBMS($keyword);
?>

<table border="1px solid black" cellspacing="0" cellpadding="20px">
    <tr>
        <th>No.</th>
        <th>Profil Gambar</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Email</th>
        <th>Asal Universitas</th>
    </tr>
    <?php $nomor = 1; ?>
    <?php foreach ($dataMahasiswa as $dataPerMahasiswa) : ?>
        <tr>
            <td><?= $nomor ?></td>
            <?php $nomor++; ?>
            <td><img src="<?= $dataPerMahasiswa["Profil_Gambar"] ?>" alt="Profil Gambar" width="100px" height="100px"></td>
            <td>
                <form action="ubah.php" method="get">
                    <?php $idChange = $dataPerMahasiswa['id'] ?>
                    <button name="idTargetChange" value="<?= $idChange ?>">ubah</button>
                </form>
                <br>
                <form action="hapus.php" method="post">
                    <?php $idDeleted = $dataPerMahasiswa['id']; ?>
                    <button name="idTargetDeleted" type="submit" value="<?= $idDeleted ?>" onclick="return confirm('YAKIN HAPUS ?');">hapus</button>
                </form>
            </td>
            <td><?= $dataPerMahasiswa["Nama"] ?></td>
            <td><?= $dataPerMahasiswa["NIM"] ?></td>
            <td><?= $dataPerMahasiswa["Email"] ?></td>
            <td><?= $dataPerMahasiswa["Asal_Universitas"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>