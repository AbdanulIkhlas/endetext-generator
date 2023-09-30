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

    <form method="post" action="">
        <div class="btn-group mb-4" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="action" id="action1" autocomplete="off" value="enkripsi"
                <?php if (isset($_POST['action']) && $_POST['action'] == 'enkripsi') echo 'checked'; ?>>
            <label class="btn btn-outline-secondary" for="action1">Enkripsi</label>
            <input type="radio" class="btn-check" name="action" id="action2" autocomplete="off" value="deskripsi"
                <?php if (isset($_POST['action']) && $_POST['action'] == 'deskripsi') echo 'checked'; ?>>
            <label class="btn btn-outline-secondary" for="action2">Deskripsi</label>
        </div>
        <div class="mb-4">
            <label for="textInput" class="form-label">Plaintext : </label>
            <textarea name="textInput" class="form-control" id="textInput" rows="3"
                required><?php if (isset($_POST['textInput'])) echo htmlspecialchars($_POST['textInput']); ?></textarea>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Key</span>
            <input type="number" name="shift" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
                min="1" max="25" required
                value="<?php if (isset($_POST['shift'])) echo htmlspecialchars($_POST['shift']); ?>">
        </div>
        <div align="center" class="mb-4">
            <button type="submit">Enkripsi</button>
        </div>
    </form>


</body>

</html>