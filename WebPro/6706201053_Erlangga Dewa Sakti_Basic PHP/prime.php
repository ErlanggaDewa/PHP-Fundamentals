<?php
$angka = 17;
$counter = 0;
for ($i = 1; $i <= $angka; $i++) {
    $counter = ($angka % $i == 0) ? ++$counter : $counter;
}
if ($counter == 2) {
    echo ($angka . " is prime");
} else {
    echo ($angka . " is not prime");
}
