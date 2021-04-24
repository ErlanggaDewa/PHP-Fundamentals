<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import simple css -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Form</title>
</head>

<body>
    <form method="POST" action="proses.php">
        <h1><strong>Student Union Form</strong></h1>

        <p>
            <label for="name">Name : </label><br>
            <input type="text" id="name" name="name">
        </p>

        <p>
            <label for="email">E-mail : </label><br>
            <input type="text" id="email" name="email">
        </p>

        <p>
            <label for="website">Website</label><br>
            <input type="text" id="website" name="website">
        </p>

        <p>
            <label for="comment">Comment</label><br>
            <textarea rows="5" cols="40" name="comment" id="comment"></textarea>
        </p>

        <p>
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="Female" /> Female <br />
            <input type="radio" name="gender" value="Male" /> Male <br />
        </p>

        <p>
            <label>
                <input type="checkbox" id="checkbox" value="terms" required>
                I agree to the <a href="#">terms and conditions</a>
            </label>
        </p>

        <button name="submit">Send</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>