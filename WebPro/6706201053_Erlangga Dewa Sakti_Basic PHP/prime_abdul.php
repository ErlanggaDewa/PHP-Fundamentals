<?php

function is_prime($number)
{
    if ($number == 1 || $number == 0) {
        return false;
    } else if ($number == 2) {
        return true;
    }
    $square_root_number = floor(sqrt($number));

    for ($i = 2; $i <= $square_root_number; $i++) {
        if ($number % $i == 0)
            return false;
    }
    return true;
}

function cek_prima($low, $high)
{
    if ($low > $high) {
        echo ("Batasan nilai salah");
        exit;
    }

    $jumlah = 0;
    for ($low; $low <= $high; $low++) {
        if (is_prime($low)) {
            echo ($low . ", ");
            $jumlah++;
        }
    }
    echo ("<br>Jumlah bilangan prima " . $jumlah . "<br>");
}
cek_prima(0, 100);
