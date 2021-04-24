<?php
$nilai = 80;

switch ($nilai) {
    case $nilai >= 80 && $nilai <= 100:
        $huruf = "A";
        break;

    case $nilai >= 70 && $nilai <= 79:
        $huruf = "B";
        break;

    case $nilai >= 60 && $nilai <= 69:
        $huruf = "C";
        break;

    case $nilai >= 50 && $nilai <= 59:
        $huruf = "D";
        break;

    default:
        $huruf = "E";
        break;
}

echo ("Nilai angka  : $nilai<br>");
echo ("Nilai huruf  : $huruf<br>");
