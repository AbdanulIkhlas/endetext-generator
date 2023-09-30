<!DOCTYPE html>
<html>
<head>
    <title>Super Cipher</title>
</head>
<body>
    <h1>Super Cipher</h1>
    <form method="post" action="">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" required><br>
        
        <label for="action">Pilih Aksi:</label>
        <select id="action" name="action" required>
            <option value="encrypt">Enkripsi</option>
            <option value="decrypt">Dekripsi</option>
        </select><br>
        
        <label for="caesar-key">Masukkan Kunci Caesar (1-25):</label>
        <input type="number" id="caesar-key" name="caesar-key" min="1" max="25" required><br>
        
        <label for="vigenere-key">Masukkan Kata Kunci Vigenère (Alfabet):</label>
        <input type="text" id="vigenere-key" name="vigenere-key" pattern="[A-Za-z]+" title="Mohon input key dengan Alfabet" required><br>
        
        <label for="xor-key-type">Pilih Tipe Kunci untuk XOR Cipher:</label>
        <select id="xor-key-type" name="xor-key-type" required>
            <option value="ascii-char">Karakter ASCII</option>
            <option value="ascii-decimal">Desimal ASCII</option>
        </select><br>
        
        <div id="xor-ascii-char-input">
            <label for="xor-key-char">Masukkan Kunci XOR (Karakter ASCII):</label>
            <input type="text" id="xor-key-char" name="xor-key-char" maxlength="1" required>
        </div>
        
        <div id="xor-ascii-decimal-input">
            <label for="xor-key-decimal">Masukkan Kunci XOR (Desimal ASCII):</label>
            <input type="number" id="xor-key-decimal" name="xor-key-decimal" required>
        </div>

        <input type="submit" value="Proses">
    </form>

    <?php
    // Fungsi Caesar Cipher
    function caesarCipher($text, $shift, $action) {
        $result = "";
        $shift = ($action == 'encrypt') ? $shift : -$shift;
        // jika action=decrypt, $shift akan menjadi negatif agar proses dekripsi berfungsi dengan benar
        // shift=key(kunci)
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            if (ctype_alpha($char)) { // jika huruf alfabet 
                $isUpperCase = ctype_upper($char); // huruf besar atau kecil
                $char = strtolower($char); // diubah ke huruf kecil
                // RUMUS C = (P+K) mod 26 ; P = (C-K) mod 26
                $char = chr(((ord($char) - 97 + $shift + 26) % 26) + 97);
                // ord=mengambil kode ASCII dari karakter 
                // dikurang 97 untuk memudahkan perhitungan (97=kode ASCII huruf a)
                // tambahkan dengan shift atau kunci dan tambahkan 26 dan operasi modulo (%26) untuk memastikan hasil dalam rentang 0-25
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

    // Fungsi Vigenère Cipher
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
                if ($action === 'decrypt') {
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

    // Fungsi XOR Cipher
    function xorCipher($text) {
        $result = '';
        $resultb = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $keyChar = '';
            
            // Memilih jenis kunci berdasarkan pilihan pengguna
            if ($_POST["xor-key-type"] === "ascii-char") {
                $keyChar = $_POST["xor-key-char"];
            } elseif ($_POST["xor-key-type"] === "ascii-decimal") {
                $keyChar = chr($_POST["xor-key-decimal"]);
            }

            // RUMUS C = (P+K) mod 26 ; P = (C-K) mod 26 
            $resultChar = chr(ord($char) ^ ord($keyChar));
            // operasi XOR dalam bentuk ASCII dan diubah kembali menjadi karakter
            
            $result .= $resultChar;

            // Konversi hasil ke biner
            $resultBinary = '';
            for ($j = 0; $j < strlen($resultChar); $j++) {
                $resultBinary .= str_pad(decbin(ord($resultChar[$j])), 8, '0', STR_PAD_LEFT) . ' ';
                // decbin() mengonversi kode ASCII tersebut ke dalam representasi biner
                // str_pad(..., 8, '0', STR_PAD_LEFT) menambahkan nol pada awal biner jika panjang biner kurang dari 8 digit.
            }
            
            // semua hasil biner
            $resultb .= $resultBinary;

            echo "<br><p>Character: ".$char." , ASCII: " . ord($char) . " , Biner: " . decbin(ord($char)) . "</p>";
            echo "<p>Key: ".$keyChar. " , ASCII: " . ord($keyChar) . " , Biner: " . decbin(ord($keyChar)) . "</p>";
            echo "<p>Result: ".$resultChar." , ASCII: " . ord($resultChar) . " , Biner: " . $resultBinary . "</p>";
        }
        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $text = $_POST["text"];
        $action = $_POST["action"];
        
        $caesarKey = $_POST["caesar-key"];
        $vigenereKey = $_POST["vigenere-key"];

        if($action === 'encrypt'){
            // Enkripsi
            $caesarResult = caesarCipher($text, $caesarKey, $action);
            //Hasil Caesar
            echo "<h2>".strtoupper($_POST["action"])." : ".$_POST["text"],"</h2>";
            echo "<h2>Key/Shift: ".$caesarKey."</h2>";
            echo "<h2>Hasil Caesar Cipher: ".$caesarResult."</h2><br>";       

            // Enkripsi
            $vigenereResult = vigenereCipher($caesarResult, $vigenereKey, $action);
            //Hasil Vigenere
            echo "<h2>".strtoupper($_POST["action"])." : ".$caesarResult,"</h2>";
            echo "<h2>Key/Shift: ".$vigenereKey."</h2>";
            echo "<h2>Hasil Vigenère Cipher: ".$vigenereResult."</h2><br>";

            // Menghilangkan spasi dari teks sebelum enkripsi
            $vigenereResult = str_replace(' ', '', $vigenereResult);
            // Enkripsi    
            $xorResult = xorCipher($vigenereResult);
            // Hasil XOR
            echo "<h2>".strtoupper($_POST["action"])." : ".$vigenereResult,"</h2>";
            if ($_POST["xor-key-type"] === "ascii-char") {
                echo "<h2>Key/Shift(Char): ".$_POST["xor-key-char"]."</h2>";
            } elseif ($_POST["xor-key-type"] === "ascii-decimal") {
                echo "<h2>Key/Shift(Decimal): ".$_POST["xor-key-decimal"]."</h2>";
            }
            
            // Tampilkan hasil dari ketiga algoritma
            echo "<h2>Hasil XOR Cipher: ".$xorResult."</h2><br>";

        }else{
            // Dekripsi   
            $xorResult = xorCipher($text);
            // Hasil XOR
            echo "<h2>".strtoupper($_POST["action"])." : ".$text."</h2>";
            if ($_POST["xor-key-type"] === "ascii-char") {
                echo "<h2>Key/Shift(Char): ".$_POST["xor-key-char"]."</h2>";
            } elseif ($_POST["xor-key-type"] === "ascii-decimal") {
                echo "<h2>Key/Shift(Decimal): ".$_POST["xor-key-decimal"]."</h2>";
            } 
            echo "<h2>Hasil XOR Cipher: ".$xorResult."</h2><br>";
            
            // Dekripsi
            $vigenereResult = vigenereCipher($xorResult, $vigenereKey, $action);
            //Hasil Vigenere
            echo "<h2>".strtoupper($_POST["action"])." : ".$xorResult."</h2>";
            echo "<h2>Key/Shift: ".$vigenereKey."</h2>";
            echo "<h2>Hasil Vigenère Cipher: ".$vigenereResult."</h2><br>";

            // Dekripsi
            $caesarResult = caesarCipher($vigenereResult, $caesarKey, $action);
            //Hasil Caesar
            echo "<h2>".strtoupper($_POST["action"])." : ".$vigenereResult."</h2>";
            echo "<h2>Key/Shift: ".$caesarKey."</h2>";

            // Tampilkan hasil dari ketiga algoritma
            echo "<h2>Hasil Caesar Cipher: ".$caesarResult."</h2><br>";  
        }

    }
    ?>

    <script>
        // Ambil elemen-elemen yang diperlukan
        var xorKeyTypeSelect = document.getElementById("xor-key-type");
        var xorAsciiCharInput = document.getElementById("xor-ascii-char-input");
        var xorAsciiDecimalInput = document.getElementById("xor-ascii-decimal-input");

        // Inisialisasi: hanya satu input yang aktif untuk XOR Cipher
        xorAsciiCharInput.style.display = "block";
        xorAsciiDecimalInput.style.display = "none";

        // Tangani perubahan saat pengguna memilih tipe kunci XOR
        xorKeyTypeSelect.addEventListener("change", function() {
            if (xorKeyTypeSelect.value === "ascii-char") {
                xorAsciiCharInput.style.display = "block";
                xorAsciiDecimalInput.style.display = "none";
                // Menonaktifkan input desimal
                document.getElementById("xor-key-decimal").disabled = true;
                // Mengaktifkan input karakter ASCII
                document.getElementById("xor-key-char").disabled = false;
            } else if (xorKeyTypeSelect.value === "ascii-decimal") {
                xorAsciiCharInput.style.display = "none";
                xorAsciiDecimalInput.style.display = "block";
                // Menonaktifkan input karakter ASCII
                document.getElementById("xor-key-char").disabled = true;
                // Mengaktifkan input desimal
                document.getElementById("xor-key-decimal").disabled = false;
            }
        });

        // Inisialisasi: Set default tipe kunci XOR ke ASCII Char
        xorKeyTypeSelect.value = "ascii-char";
        // Memanggil event change secara manual untuk mengatur tampilan awal
        xorKeyTypeSelect.dispatchEvent(new Event("change"));
    </script>

</body>
</html>
