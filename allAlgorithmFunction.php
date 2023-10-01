<?php 
// Algortima caesar chipper
function caesarCipher($text, $key, $action) {
    $result = "";
    $key = ($action == 'enkripsi') ? $key : -$key;
    // jika action=decrypt, $key akan menjadi negatif agar proses dekripsi berfungsi dengan benar
    // key=key(kunci)
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) { // jika huruf alfabet 
            $isUpperCase = ctype_upper($char); // huruf besar atau kecil
            $char = strtolower($char); // diubah ke huruf kecil
            // RUMUS C = (P+K) mod 26 ; P = (C-K) mod 26 
            $char = chr(((ord($char) - 97 + $key + 26) % 26) + 97);
            // ord=mengambil kode ASCII dari karakter 
            // dikurang 97 untuk memudahkan perhitungan (97=kode ASCII huruf a)
            // tambahkan dengan key atau kunci dan tambahkan 26 dan operasi modulo (%26) untuk memastikan hasil dalam rentang 0-25
            // ditambah 97 untuk mengembalikan dalam kode ASCII
            if ($isUpperCase) {
                $char = strtoupper($char);// jika aslinya huruf besar dikembalikan
            }
        } else {
            $char = $text[$i]; // Jaga karakter non-alphabet seperti spasi atau tanda baca
        }
        $result .= $char; //gabungkan karakter
    }

    return $result;
}

// Algortima vigenere chipper
function vigenereCipher($text, $key, $action) {
    $result = '';
    $key = strtoupper($key);// diubah ke huruf besar untuk mempermudah penjumlahan
    $key = preg_replace("/[^a-zA-Z]/", "", $key);// Filter kata kunci hanya dengan huruf alfabet
    $keyLength = strlen($key);// panjang kunci
    $keyIndex = 0;

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) { // jika huruf alfabet 
            $isLowerCase = ctype_lower($char); // huruf besar atau kecil
            $char = strtoupper($char);
            $shift = ord($key[$keyIndex]) - 65;
            // ord=mengambil kode ASCII dari karakter 
            // dikurang 65 untuk memudahkan perhitungan (65=kode ASCII huruf A)
            if ($action === 'deskripsi') {
                $shift = -$shift;// jika action=decrypt, $shift akan menjadi negatif agar proses dekripsi berfungsi dengan benar
            }
            // RUMUS C = (P+K) mod 26 ; P = (C-K) mod 26 
            $char = chr(((ord($char) - 65 + $shift + 26) % 26) + 65);
            // ord=mengambil kode ASCII dari karakter
            // dikurangkan 65 untuk mengubah indeks ke rentang 0-25
            // tambahkan dengan shift atau kunci dan tambahkan 26 dan operasi modulo (%26) untuk memastikan hasil dalam rentang 0-25
            // ditambah 65 untuk mengembalikan dalam kode ASCII

            if ($isLowerCase) {
                $char = strtolower($char);// jika aslinya huruf kecil dikembalikan
            }

            $keyIndex = ($keyIndex + 1) % $keyLength;
            // karakter kunci berikutnya, jika sudah mencapai panjang kata kunci, maka akan kembali ke 0 untuk diulang dengan modulo
        }
        $result .= $char;
    }

    return $result;
}


//  Algoritma XOR
function xorCipher($text, $key) {
    $result = '';
    $resultb = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $keyChar = $key;
        
        // Memilih jenis kunci berdasarkan pilihan pengguna
        if ($_POST["key-type"] === "ascii-char") {
            $keyChar = $key;
        } elseif ($_POST["key-type"] === "ascii-decimal") {
            $keyChar = chr($key);
        }

        // RUMUS C = P XOR K ; P = C XOR K
        $resultChar = chr(ord($char) ^ ord($keyChar));
        // operasi XOR dalam bentuk ASCII dan diubah kembali menjadi karakter
        
        $result .= $resultChar;
    }
    return $result;
}

?>