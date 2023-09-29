<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher</title>
</head>
<body>
    <h1>Caesar Cipher</h1>
    <form method="post" action="">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" required><br>
        <label for="shift">Masukkan Pergeseran (1-25):</label>
        <input type="number" id="shift" name="shift" min="1" max="25" required><br>

        <label for="action">Pilih Aksi:</label>
        <select id="action" name="action" required>
            <option value="encrypt">Enkripsi</option>
            <option value="decrypt">Dekripsi</option>
        </select><br>

        <input type="submit" value="Proses">
    </form>

    <!-- ALGORITMA CAESAR CHIPPER -->
    <?php
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $shift = $_POST["shift"];
        $action = $_POST["action"];

        $result = caesarCipher($text, $shift, $action);

        echo "<h2>".strtoupper($_POST["action"])." : ".$_POST["text"],"</h2>";
        echo "<h2>Key/Shift: ".$shift."</h2>";
        echo "<h2>Hasil: ".$result."</h2>";
    }
    ?>

    
</body>
</html>
