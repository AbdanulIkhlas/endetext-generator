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
<div class="proses-vignere">
    <div class="judul-proses">
        <div>Proses Algoritma Vignere</div>
        <div class="icon-down">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-chevron-down"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
    </div>
    <div class="isi-proses">
        <table>
            <tr>
                <td class="header-table">Plaintext</td>
                <td class="header-table"></td>
                <td class="header-table">key</td>
                <td class="header-table"></td>
                <td class="header-table"></td>
                <td class="header-table">Chippertext</td>
            </tr>
            <?php 
                        $keyIndex = 0;
                        $keyLength = strlen($keyVignere);
                        for($i = 0; $i < strlen($resultCaesar); $i++){
                            if($resultCaesar[$i] != " "){
                        ?>
            <tr>
                <td><?php echo $resultCaesar[$i] ?></td>
                <td> + </td>
                <td><?php echo $key[$keyIndex] ?></td>
                <td><?php echo "mod 26" ?></td>
                <td> ---------></td>
                <td><?php echo $resultVignere[$i] ?></td>
            </tr>
            <?php 
                                $keyIndex++;
                                if($keyIndex > $keyLength-1) $keyIndex = 0;
                            }
                        }
                        ?>
        </table>
    </div>
</div>
<div class="proses-xor">
    <div class="judul-proses">
        <div>Proses Algortima XOR</div>
        <div class="icon-down">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-chevron-down"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
    </div>
    <div class="isi-proses">
        <?php 
                            // Konversi hasil ke biner
                            $resultBinary = '';
                            for ($j = 0; $j < strlen($finalResult); $j++) {
                                $resultBinary .= str_pad(decbin(ord($finalResult[$j])), 8, '0', STR_PAD_LEFT) . ' ';
                                // decbin() mengonversi kode ASCII tersebut ke dalam representasi biner
                                // str_pad(..., 8, '0', STR_PAD_LEFT) menambahkan nol pada awal biner jika panjang biner kurang dari 8 digit.
                            }

                            for($i = 0; $i < strlen($resultVignere); $i++){
                                if($resultVignere[$i] != " "){
                            ?>
        <table>
            <tr>
                <td><?php echo "Character " ?></td>
                <td>:</td>
                <td><?php echo $resultVignere[$i] ?></td>
                <td></td>
                <td></td>
                <td><?php echo "ASCII     : " . ord($resultVignere[$i])  ?></td>
                <td><?php echo "Biner     : " . decbin(ord($resultVignere[$i])) ?></td>
            </tr>
            <tr>
                <td><?php echo "Key " ?></td>
                <td>:</td>
                <td><?php echo $keyXor ?></td>
                <td></td>
                <td></td>
                <td><?php echo "ASCII     : " . ord($keyXor)  ?></td>
                <td><?php echo "Biner     : " . decbin(ord($keyXor)) ?></td>
            </tr>
            <tr>
                <td><?php echo "Result "?></td>
                <td>:</td>
                <td><?php echo $finalResult[$i] ?></td>
                <td></td>
                <td></td>
                <td><?php echo "ASCII     : " . ord($finalResult[$i])  ?></td>
                <td><?php echo "Biner     : " . decbin(ord($finalResult[$i])) ?></td>
            </tr>
            <br>
        </table>
        <?php 
                                }
                            }
                            ?>
    </div>
</div>




<div class="proses">
    <div class="proses-xor">
        <div class="judul-proses">
            <div>Proses Algortima XOR</div>
            <div class="icon-down">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-chevron-down"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        </div>
        <div class="isi-proses">
            <?php 
                            // Konversi hasil ke biner
                            $resultBinary = '';
                            for ($j = 0; $j < strlen($resultXor); $j++) {
                                $resultBinary .= str_pad(decbin(ord($resultXor[$j])), 8, '0', STR_PAD_LEFT) . ' ';
                                // decbin() mengonversi kode ASCII tersebut ke dalam representasi biner
                                // str_pad(..., 8, '0', STR_PAD_LEFT) menambahkan nol pada awal biner jika panjang biner kurang dari 8 digit.
                            }

                            for($i = 0; $i < strlen($text); $i++){
                                if($text[$i] != " "){
                            ?>
            <table>
                <tr>
                    <td><?php echo "Character " ?></td>
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
                    <td><?php echo $keyXor ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo "ASCII     : " . ord($keyXor)  ?></td>
                    <td><?php echo "Biner     : " . decbin(ord($keyXor)) ?></td>
                </tr>
                <tr>
                    <td><?php echo "Result "?></td>
                    <td>:</td>
                    <td><?php echo $resultXor[$i] ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo "ASCII     : " . ord($resultXor[$i])  ?></td>
                    <td><?php echo "Biner     : " . decbin(ord($resultXor[$i])) ?></td>
                </tr>
                <br>
            </table>
            <?php 
                                }
                            }
                            ?>
        </div>
    </div>
    <div class="proses-vignere">
        <div class="judul-proses">
            <div>Proses Algoritma Vignere</div>
            <div class="icon-down">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-chevron-down"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        </div>
        <div class="isi-proses">
            <table>
                <tr>
                    <td class="header-table">Chippertext</td>
                    <td class="header-table"></td>
                    <td class="header-table">key</td>
                    <td class="header-table"></td>
                    <td class="header-table"></td>
                    <td class="header-table">Plaintext</td>
                </tr>
                <?php 
                        $keyIndex = 0;
                        $keyLength = strlen($keyVignere);
                        for($i = 0; $i < strlen($resultXor); $i++){
                            if($resultXor[$i] != " "){
                        ?>
                <tr>
                    <td><?php echo $resultXor[$i] ?></td>
                    <td> + </td>
                    <td><?php echo $key[$keyIndex] ?></td>
                    <td><?php echo "mod 26" ?></td>
                    <td> ---------></td>
                    <td><?php echo $resultVignere[$i] ?></td>
                </tr>
                <?php 
                                $keyIndex++;
                                if($keyIndex > $keyLength-1) $keyIndex = 0;
                            }
                        }
                        ?>
            </table>
        </div>
    </div>
    <div class="proses-caesar">
        <div class="judul-proses">
            <div>Proses Algoritma Caesar</div>
            <div class="icon-down">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-chevron-down"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        </div>
        <div class="isi-proses">
            <table>
                <tr>
                    <td class="header-table">Chippertext</td>
                    <td class="header-table"></td>
                    <td class="header-table">Plaintext</td>
                </tr>
                <?php 
                            for($i = 0; $i < strlen($resultVignere); $i++){
                                if($resultVignere[$i] != " "){
                            ?>
                <tr>
                    <td><?php echo $resultVignere[$i] ?></td>
                    <td> -------------------------></td>
                    <td><?php echo $finalResult[$i] ?></td>
                </tr>
                <?php 
                                }
                            }
                            ?>
            </table>
        </div>
    </div>

</div>