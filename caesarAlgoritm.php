<!DOCTYPE html>
<html lang="en">

<?php 
// ALGORITMA CAESAR CHIPPER
function caesarCipher($text, $shift, $action) {
    $result = "";
    $shift = ($action == 'enkripsi') ? $shift : -$shift;
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
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENDETEXT GENERATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/caesar.css">
</head>

<body>
    <header>
        <div class="header-container">
            <h1><a href="index.html"><span>ENDETEXT</span>GENERATOR</a></h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="caesarAlgoritm.php">Chaesar Chipper</a></li>
                <li><a href="xor.php">XOR</a></li>
                <li><a href="vignere.php">Vignere</a></li>
                <li><a href="superEnkripsi.php">Super Enkripsi</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section>
            <p>
                <span class="important-text">Algoritma Caesar Chipper</span>
                <br><br> Melakukan enkripsi atau deskripsi pesan dengan menggeser setiap huruf dalam teks asli
                sejumlah kunci yang ditentukan.
                <br><br>
                Langkah-langkah : <br>
                1. Memilih terlebih dahulu apakah akan melakukan enkripsi/desripsi <br>
                2. Input pesan yang ingin di eksekusi <br>
                3. Input key (kunci pergeseran) dengan menggunakan angka antara 1-25 <br>
                4. Tekan tombol enkripsi/deskripsi untuk melihat hasilnya <br>
            </p>
        </section>
        <section class="content">
            <form method="post" action="">
                <div class="btn-group mb-4" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="action" id="action1" autocomplete="off" value="enkripsi"
                        checked>
                    <label class="btn btn-outline-secondary" for="action1">Enkripsi</label>
                    <input type="radio" class="btn-check" name="action" id="action2" autocomplete="off"
                        value="deskripsi">
                    <label class="btn btn-outline-secondary" for="action2">Deskripsi</label>
                </div>
                <div class="mb-4">
                    <label for="textInput" class="form-label">Pesan : </label>
                    <textarea name="textInput" class="form-control" id="textInput" rows="3"
                        required><?php if (isset($_POST['textInput'])) echo htmlspecialchars($_POST['textInput']); ?></textarea>
                </div>
                <div class="input-group mb-4">

                    <span class="input-group-text" id="basic-addon1">Key / Shift</span>
                    <input type="number" name="shift" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" min="1" max="25"
                        value="<?php if (isset($_POST['shift'])) echo htmlspecialchars($_POST['shift']); ?>" required>
                </div>
                <div align="center" class="mb-3">
                    <button type="submit">Enkripsi</button>
                </div>
            </form>

            <div class="mb-4">
                <label for="hasil" class="form-label">Hasil : </label>
                <div class="hasil">
                    <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $textInput = $_POST["textInput"];
                        $shift = $_POST["shift"];
                        $action = $_POST["action"];
                        $result = caesarCipher($textInput, $shift, $action);

                        echo $result;
                    ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div>&copy;2023 ENDETEXTGENERATOR</div>
        <div class="anggota-kelompok">
            <table>
                <tr>
                    <td>Muhammad Abdanul Ikhlas</td>
                    <td>132210009</td>
                </tr>
                <tr>
                    <td>Muhammad Harish Wijaya</td>
                    <td>132210011</td>
                </tr>
                <tr>
                    <td>Ignasius Satria Wicaksana</td>
                    <td>132210020</td>
                </tr>
            </table>
        </div>
    </footer>
    <!-- <script src="script/index.js"></script> -->
</body>

</html>