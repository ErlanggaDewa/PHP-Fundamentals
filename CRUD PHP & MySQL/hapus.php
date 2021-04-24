<?php
// * UNTUK HAPUS DATA
require("functionDBS.php");

// * CEK SESSION LOGIN
if (!$_SESSION["login"]) {
    header("Location: login.php");
}


if (isset($_POST["idTargetDeleted"])) {
    if (deleteDBMS($_POST["idTargetDeleted"]) > 0) {
        echo
        "<script>
            alert('Data Berhasil Dihapus');
        </script>";
        header("Location: index1.php");
    }
} else {
    header("Location: index1.php");
}
