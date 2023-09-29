<!DOCTYPE html>
<html>
<head>
    <title>Vigenère Cipher</title>
</head>
<body>
    <h1>Vigenère Cipher</h1>
    <form method="post" action="">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" required><br>
        <label for="key">Masukkan Kata Kunci:</label>
        <input type="text" id="key" name="key" pattern="[A-Za-z]+" title="Mohon input key dengan Alfabet" required><br>
        <label for="action">Pilih Aksi:</label>
        <select id="action" name="action" required>
            <option value="encrypt">Enkripsi</option>
            <option value="decrypt">Dekripsi</option>
        </select><br>
        <input type="submit" value="Proses">
    </form>

    <!-- Algoritma Vigenere -->
    <?php
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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $text = $_POST["text"];
        $key = $_POST["key"];
        $key = preg_replace("/[^a-zA-Z]/", "", $key);
        $action = $_POST["action"];

        $result = vigenereCipher($text, $key, $action);

        echo "<h2>".strtoupper($_POST["action"])." : ".$_POST["text"],"</h2>";
        echo "<h2>Key/Shift: ".$key."</h2>";
        echo "<h2>Hasil: ".$result."</h2>";
    }
    ?>
</body>
</html>
