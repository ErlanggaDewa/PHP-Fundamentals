<h3>Menghitung Keliling dan Luas Persegi Panjang</h3>

<?php
$rumus_keliling = "(panjang x 2) + (lebar x 2)<br>";
$rumus_luas = "panjang x lebar<br>";

$panjang = 10;
$lebar = 15;
$luas = $panjang * $lebar;
$keliling = ($panjang + $lebar) * 2;

echo ("Persegi panjang yang memiliki lebar : $lebar, dan panjang : $panjang, maka : <br>");
echo ("Keliling : $keliling<br>");
echo ("Luas : $luas<br>");
?>