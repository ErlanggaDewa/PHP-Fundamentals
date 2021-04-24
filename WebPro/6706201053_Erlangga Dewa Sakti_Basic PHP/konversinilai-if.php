<?php
$nilai = 80;
if ($nilai >= 80 && $nilai <= 100) {
    $huruf = "A";
} else if ($nilai >= 70 && $nilai <= 79) {
    $huruf = "B";
} else if ($nilai >= 60 && $nilai <= 69) {
    $huruf = "C";
} else if ($nilai >= 50 && $nilai <= 59) {
    $huruf = "D";
} else {
    $huruf = "E";
}
echo ("Nilai angka  : $nilai<br>");
echo ("Nilai huruf  : $huruf<br>");
