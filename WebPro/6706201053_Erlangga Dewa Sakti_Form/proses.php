<?php


if (isset($_POST['submit'])) {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $website = test_input($_POST['website']);
    $comment = test_input($_POST['comment']);
} else {
    die("Sorry, you cannot access this page");
}

function test_input($data)
{
    $data = trim($data);
    $data =  stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!empty($name)) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        echo "Only letters and white space allowed<br>";
    } else {
        echo "Thanks, <br>$name</br><br>";
    }
} else {
    echo "Name is required <br>";
}

if (!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format<br>";
    } else {
        echo "Your email is: $email<br>";
    }
} else {
    echo "Email is required <br>";
}

if (!empty($website)) {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        echo "Invalid URL<br>";
    } else {
        echo "Your website is: $website<br>";
    }
} else {
    echo "Your website is: none <br>";
}

if (!empty($comment)) {
    echo "Your comment is: $comment<br>";
} else {
    echo "Your comment is: none <br>";
}

if (isset($_POST["gender"])) {
    echo "You are: {$_POST['gender']}<br>";
} else {
    echo "Gender is required <br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import simple css -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Proses</title>
</head>

<body>

</body>

</html>