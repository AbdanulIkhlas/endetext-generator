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
    <link rel="stylesheet" href="style/caesar.css">
</head>

<body>
    <header>
        <div class="header-container">
            <h1><a href="index.php"><span>ENDETEXT</span>GENERATOR</a></h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="caesar.php">Chaesar Chipper</a></li>
                <li><a href="vignere.php">Vignere</a></li>
                <li><a href="xor.php">XOR</a></li>
                <li><a href="superEnkripsi.php">Super Enkripsi</a></li>
            </ul>
        </div>
    </header>
    <main>
        <section>
            <div class="penjelasan">
                <div class="judul-penjelasan">
                    <div>
                        <p class="important-text">Algoritma Caesar Chipper</p>
                        <p>
                            Melakukan enkripsi atau deskripsi pesan dengan menggeser setiap huruf dalam teks asli
                            sejumlah kunci yang ditentukan.
                        </p>
                    </div>
                    <div class="icon-down">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
                <div class="langkah-langkah">
                    <p>Langkah-langkah : </p>
                    <p>1. Memilih terlebih dahulu apakah akan melakukan enkripsi atau desripsi</p>
                    <p>2. Input pesan yang ingin di eksekusi</p>
                    <p>3. Input key (kunci pergeseran) dengan menggunakan angka antara 1-25</p>
                    <p>4. Tekan tombol proses untuk melihat hasilnya </p>
                </div>
            </div>
        </section>
        <section class="content">
            <form method="post" action="">
                <div class="btn-group mb-4" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="action" id="action1" autocomplete="off" value="enkripsi"
                        <?php echo (isset($_POST['action']) && $_POST['action'] === 'enkripsi') ? 'checked' : ''; ?>
                        required>
                    <label class="btn btn-outline-secondary" for="action1">Enkripsi</label>
                    <input type="radio" class="btn-check" name="action" id="action2" autocomplete="off"
                        value="deskripsi"
                        <?php echo (isset($_POST['action']) && $_POST['action'] === 'deskripsi') ? 'checked' : ''; ?>
                        required>
                    <label class="btn btn-outline-secondary" for="action2">Deskripsi</label>
                </div>
                <div class="mb-4">
                    <label for="textInput" class="form-label">Pesan : </label>
                    <textarea name="textInput" class="form-control" id="textInput" rows="3"
                        required><?php if (isset($_POST['textInput'])) echo htmlspecialchars($_POST['textInput']); ?></textarea>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">Key / shift</span>
                    <input type="number" name="key" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" min="1"
                        value="<?php if (isset($_POST['key'])) echo htmlspecialchars($_POST['key']); ?>" required>
                </div>
                <div align="center" class="mb-3">
                    <button type="submit">Proses</button>
                </div>
            </form>
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $textInput = $_POST["textInput"];
                $key = $_POST["key"];
                $action = $_POST["action"];
                $result = caesarCipher($textInput, $key, $action);
                
                if($action == "enkripsi"){
                    $input = "Plaintext";
                    $output = "ChipperText";
                }else{
                    $input = "ChipperText";
                    $output = "Plaintext";
                }
            }
            ?>
            <?php 
            if (isset($_POST['textInput'])){
            ?>
            <div align="center" class="mb-2">
                <div class="proses">
                    <div class="judul-proses">
                        <div>Proses</div>
                        <div class="icon-down">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>
                    <div class="isi-proses">
                        <table>
                            <tr>
                                <td class="header-table"><?php echo $input ?></td>
                                <td class="header-table"></td>
                                <td class="header-table"><?php echo $output ?></td>
                            </tr>
                            <?php 
                        for($i = 0; $i < strlen($textInput); $i++){
                            if($textInput[$i] != " "){
                        ?>
                            <tr>
                                <td><?php echo $textInput[$i] ?></td>
                                <td> -------------------------></td>
                                <td><?php echo $result[$i] ?></td>
                            </tr>
                            <?php 
                            }
                        }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <div class="mb-4">
                <label for="hasil" class="form-label">Hasil : </label>
                <div class="hasil">
                    <?php 
                        if (isset($_POST['textInput'])) echo $result;
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mengambil elemen judul-penjelasan
            let judulPenjelasan = document.querySelector('.judul-penjelasan');

            // Mengambil elemen langkah-langkah yang terkait
            let langkah = document.querySelector('.langkah-langkah');

            // Menambahkan event listener pada judul-penjelasan
            judulPenjelasan.addEventListener('click', function () {
                // Jika langkah-langkah aktif, maka nonaktifkan (display:none)
                if (langkah.style.display === 'block') {
                    langkah.style.display = 'none';
                } else {
                    // Jika tidak aktif, maka aktifkan (display:block)
                    langkah.style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>