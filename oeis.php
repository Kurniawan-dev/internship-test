<?php
// Fungsi untuk menghitung bilangan dalam barisan A000124
function rumusA000124($n) {
    return ($n * ($n + 1)) / 2;
}

// fungsi menghitung bilangan
function generateA000124($n) {
    $sequence = []; // fungsi untuk menyimpan hasil urutan kedalam array

    for ($i = 1; $i <= $n; $i++) {
        // $value = $i * ($i + 1) + 1; // rumus A000124
        $sequence[] = rumusA000124($i);
    }
    
    return implode("-", $sequence);
}

// input dari user
echo "Masukkan jumlah deret yang diinginkan: ";
$n = intval(trim(fgets(STDIN)));

$result = generateA000124($n);

echo "hasil :" . $result;

?>