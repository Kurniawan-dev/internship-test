<?php 

// fungsi menghitung dense ranking
function denseRanking($scores, $gitsScores) {
    rsort($scores); // mengurutkan skor dari nilai terbesar menjadi terkecil

    $rankings = []; // array untuk menyimpan peringkat

    $currentRank = 1; 

    // Penetapan peringkat pada setiap skor
    foreach ($scores as $index => $score) {
        if ($index > 0 && $score != $scores[$index - 1]){
            $currentRank++;            
        }

        $rankings[$score] = $currentRank;
    }

    // inisialisasi ranking GITS
    $gitsRanks = [];
    
    foreach ($gitsScores as $gitsScore) {
        if  (isset($rankings[$gitsScore])) {
            $gitsRanks[] = $rankings[$gitsScore];
        } else {
            $gitsRanks[] = max($rankings) + 1; // jika score tidak di temukan di daftar, rank naik 1 dari rank tertinggi
        }
    }

    return $gitsRanks;
}

// input score dari user
// input jumlah pemain yang ikut serta
echo "Masukkan jumlah pemain: ";
$player = (int) trim(fgets(STDIN));

// input daftar score pemain
echo "Masukkan Score pemain (pisahkan dengan spasi): ";
$scores = array_map('intval', explode(' ', trim(fgets(STDIN))));

// input jumlah permainan yang di ikuti GITS
echo "Masukkan Jumlah permainan GITS: ";
$gitsPlayer = (int) trim(fgets(STDIN));

// input daftar score yang di dapat oleh GITS
echo "Masukkan Score permainan GITS (pisahkan dengan spasi): ";
$gitsScores = array_map('intval', explode(' ', trim(fgets(STDIN))));

$gitsRanks = denseRanking($scores, $gitsScores);

// Output Hasil peringkat GITS
echo "Hasil Peringkat GITS: " . implode(' ', $gitsRanks) . "\n";
?>