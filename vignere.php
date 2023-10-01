<!DOCTYPE html>
<html lang="en">

<?php 
// Memanggil semua function algoritma
include "allAlgorithmFunction.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENDETEXT GENERATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/vignere.css">
</head>

<body>
    <header>
        <div class="header-container">
            <h1><a href="index.html"><span>ENDETEXT</span>GENERATOR</a></h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="caesar.php">Chaesar Chipper</a></li>
                <li><a href="xor.php">XOR</a></li>
                <li><a href="vignere.php">Vignere</a></li>
                <li><a href="superEnkripsi.php">Super Enkripsi</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section>
            <p>
                <span class="important-text">Algoritma Vignere</span>
                <br><br>
                Melakukan enkripsi atau deskripsi pesan dengan menggunakan kunci yang terdiri dari beberapa karakter,
                bukan hanya satu pergeseran tunggal.
                <br><br>
                Langkah-langkah : <br>
                1. Memilih terlebih dahulu apakah akan melakukan enkripsi atau desripsi <br>
                2. Input pesan yang ingin di eksekusi <br>
                3. Input key / shift (harus alfabet) <br>
                4. Tekan tombol proses untuk melihat hasilnya <br>
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
                    <textarea name="text" class="form-control" id="text" rows="3"
                        required><?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></textarea>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">Key / Shift</span>
                    <input type="text" name="key" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" pattern="[A-Za-z]+" title="Mohon input key dengan Alfabet"
                        required value="<?php if (isset($_POST['key'])) echo htmlspecialchars($_POST['key']); ?>"
                        required>
                </div>
                <div align="center" class="mb-3">
                    <button type="submit">Proses</button>
                </div>
            </form>
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $text = $_POST["text"];
                $key = $_POST["key"];
                $key = preg_replace("/[^a-zA-Z]/", "", $key);
                $action = $_POST["action"];
                $result = vigenereCipher($text, $key, $action);
            }
            ?>
            <?php 
            if (isset($_POST['text'])){
            ?>
            <div align="center" class="mb-2">
                <div class="proses">
                    <div class="judul-proses">
                        <div>Proses</div>
                        <div class="icon-down">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>
                    <div class="isi-proses">
                        <?php 
                        $keyIndex = 0;
                        $keyLength = strlen($key);
                        for($i = 0; $i < strlen($text); $i++){
                            if($text[$i] != " "){
                                echo $text[$i]." + ".$key[$keyIndex]. " mod 26 " ."  ---------------------> ".$result[$i]."<br>";
                                $keyIndex++;
                                if($keyIndex > $keyLength-1) $keyIndex = 0;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <div class="mb-4">
                <label for="hasil" class="form-label">Hasil : </label>
                <div class="hasil">
                    <?php 
                        if (isset($_POST['text'])) echo $result;
                    ?>
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
    <script src="script/interactive.js"></script>
</body>

</html>