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
    <link rel="stylesheet" href="style/xor.css">
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
                        <p class="important-text">Algoritma XOR</p>
                        <p>
                            Melakukan enkripsi atau deskripsi pesan dengan menggunakan operasi XOR (Xclusive OR).
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
                    <p>3. Input key / shift</p>
                    <p>
                        &nbsp;&nbsp;&nbsp; - Untuk Karakter ASCII disarankan input antara (<span
                            class="important-text">!</span>
                        sampai dengan
                        <span class="important-text">_</span>)
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp; - Untuk Desimal ASCII disarankan input antara (<span
                            class="important-text">1</span>
                        sampai dengan
                        <span class="important-text">95</span>)
                    </p>
                    <p>Berikut adalah tabel ASCII </p>
                    <span class="ascii-image"><img src="image/ascii.png" alt=""></span>
                    <p>4. Tekan tombol proses untuk melihat hasilnya</p>
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
                    <textarea name="text" class="form-control" id="text" rows="3"
                        required><?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></textarea>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">Key / Shift</span>
                    <select id="key-type" name="key-type" required>
                        <!-- setelah submit, akan menampilkan yang dipilih sebelumnya -->
                        <option value="ascii-char"
                            <?php echo (isset($_POST['key-type']) && $_POST['key-type'] === 'ascii-char') ? 'selected' : ''; ?>>
                            Karakter ASCII
                        </option>
                        <option value="ascii-decimal"
                            <?php echo (isset($_POST['key-type']) && $_POST['key-type'] === 'ascii-decimal') ? 'selected' : ''; ?>>
                            Desimal ASCII
                        </option>
                    </select>
                    <input type="text" id="key-input" name="key" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" required
                        value="<?php if (isset($_POST['key'])) echo htmlspecialchars($_POST['key']); ?>" maxlength="1"
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
                $action = $_POST["action"];
                $keyType = $_POST["key-type"];
                $result = xorCipher($text, $key, $keyType);

                if($action == "enkripsi"){
                    $input = "Ptext";
                    $output = "CText";
                }else{
                    $input = "CText";
                    $output = "Ptext";
                }
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
                        // Konversi hasil ke biner
                        $resultBinary = '';
                        for ($j = 0; $j < strlen($result); $j++) {
                            $resultBinary .= str_pad(decbin(ord($result[$j])), 8, '0', STR_PAD_LEFT) . ' ';
                            // decbin() mengonversi kode ASCII tersebut ke dalam representasi biner
                            // str_pad(..., 8, '0', STR_PAD_LEFT) menambahkan nol pada awal biner jika panjang biner kurang dari 8 digit.
                        }

                        for($i = 0; $i < strlen($text); $i++){
                            if($text[$i] != " "){
                        ?>
                        <table>
                            <tr>
                                <td><?php echo $input ?></td>
                                <td>:</td>
                                <td><?php echo $text[$i] ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo "ASCII     : " . ord($text[$i])  ?></td>
                                <td><?php echo "Biner     : " . decbin(ord($text[$i])) ?></td>
                            </tr>
                            <tr>
                                <td><?php echo "Key " ?></td>
                                <td>:</td>
                                <td><?php echo $key ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo "ASCII     : " . ord($key)  ?></td>
                                <td><?php echo "Biner     : " . decbin(ord($key)) ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $output ?></td>
                                <td>:</td>
                                <td><?php echo $result[$i] ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo "ASCII     : " . ord($result[$i])  ?></td>
                                <td><?php echo "Biner     : " . decbin(ord($result[$i])) ?></td>
                            </tr>
                            <br>
                        </table>
                        <?php 
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