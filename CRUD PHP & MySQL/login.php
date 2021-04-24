<?php
require("functionDBS.php");

// * CEK SESSION & COOKIE LOGIN
if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login"]) {
        $_SESSION["login"] = true;
    }
}
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"]) {
        header("Location: index1.php");
    }
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $jenisQuery = "SELECT * FROM account_database WHERE User_Name = '$username'";
    loginAccount($jenisQuery, $_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <br>
                    <button style="margin-right: 20px;" type="submit" name="submit">Login</button>
                    <a href="registrasi.php">Daftar</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>