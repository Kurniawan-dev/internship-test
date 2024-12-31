<?php 
function balanced($str){
    $stack = []; // stack untuk menyimpan bracket penutup

    $daftarBracket = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i]; // Ambil karakter pada posisi $i

        if (isset($daftarBracket[$char])) { // Jika karakter adalah bracket pembuka
            array_push($stack, $char); // Masukkan ke dalam stack
        } 
        elseif ($char == ')' || $char == '}' || $char == ']') { // Jika karakter adalah bracket penutup
            if (empty($stack) || $daftarBracket[array_pop($stack)] != $char) {
                return "NO";
            }
        }
    }

    // Jika stack kosong, semua bracket seimbang
    return empty($stack) ? "YES" : "NO";
}

// input dari user
echo "Masukkan string dengan bracket: ";
$input = trim(fgets(STDIN));

echo "Hasil: " . balanced($input) . "\n";

?>