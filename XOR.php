<!DOCTYPE html>
<html>
<head>
    <title>XOR Cipher</title>
</head>
<body>
    <h1>XOR Cipher</h1>
    <form method="post" action="">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" required><br>
        <label for="key-type">Pilih Tipe Kunci:</label>
        <select id="key-type" name="key-type" required>
            <option value="ascii-char">Karakter ASCII</option>
            <option value="ascii-decimal">Desimal ASCII</option>
        </select><br>
        <div id="ascii-char-input">
            <label for="key-char">Masukkan Kunci (Karakter ASCII):</label>
            <input type="text" id="key-char" name="key-char" maxlength="1">
        </div>
        <div id="ascii-decimal-input">
            <label for="key-decimal">Masukkan Kunci (Desimal ASCII):</label>
            <input type="number" id="key-decimal" name="key-decimal">
        </div>
        <label for="action">Pilih Aksi:</label>
        <select id="action" name="action" required>
            <option value="encrypt">Enkripsi</option>
            <option value="decrypt">Dekripsi</option>
        </select><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    function xorCipher($text) {
        $result = '';
        $resultb = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $keyChar = '';
            
            // Memilih jenis kunci berdasarkan pilihan pengguna
            if ($_POST["key-type"] === "ascii-char") {
                $keyChar = $_POST["key-char"];
            } elseif ($_POST["key-type"] === "ascii-decimal") {
                $keyChar = chr($_POST["key-decimal"]);
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

            echo "<p>Character: ".$char." , ASCII: " . ord($char) . " , Biner: " . decbin(ord($char)) . "</p>";
            echo "<p>Key: ".$keyChar." , ASCII: " . ord($keyChar) . " , Biner: " . decbin(ord($keyChar)) . "</p>";
            echo "<p>Result: ".$resultChar." , ASCII: " . ord($resultChar) . " , Biner: " . $resultBinary . "</p><br>";
        }
        return $result."<br>".$resultb;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $text = $_POST["text"];
        $action = $_POST["action"];

        $result = xorCipher($text);
        
        echo "<h2>".strtoupper($_POST["action"])." : ".$_POST["text"],"</h2>";
        if ($_POST["key-type"] === "ascii-char") {
            echo "<h2>Key/Shift: ".$_POST["key-char"]."</h2>";
        } elseif ($_POST["key-type"] === "ascii-decimal") {
            echo "<h2>Key/Shift: ".$_POST["key-decimal"]."</h2>";
        }
        echo "<h2>Hasil: ".$result."</h2>";
    }
    ?>

    <script>
        // Ambil elemen-elemen yang diperlukan
        var keyTypeSelect = document.getElementById("key-type");
        var keyCharInput = document.getElementById("key-char");
        var keyDecimalInput = document.getElementById("key-decimal");

        // Atur awal: hanya satu input yang aktif
        keyCharInput.disabled = false;
        keyDecimalInput.disabled = true;

        // Tangani perubahan saat pengguna memilih tipe kunci
        keyTypeSelect.addEventListener("change", function() {
            if (keyTypeSelect.value === "ascii-char") {
                keyCharInput.disabled = false;
                keyDecimalInput.disabled = true;
            } else if (keyTypeSelect.value === "ascii-decimal") {
                keyCharInput.disabled = true;
                keyDecimalInput.disabled = false;
            } else {
                keyCharInput.disabled = true;
                keyDecimalInput.disabled = true;
            }
        });
    </script>

</body>
</html>
