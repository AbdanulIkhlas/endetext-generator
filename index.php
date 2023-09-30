<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENDETEXT GENERATOR</title>
    <link rel="stylesheet" href="style/index.css">
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
                <span class="important-text">ENDETEXT GENERATOR (Enkripsi Deskripsi Text Generator)</span>
                <br><br> sebuah website yang dapat melakukan enkripsi plaintext ataupun
                deskripsi chipper text secara otomatis.
            </p>
        </section>
        <section>
            <div class="center-text">
                Anda dapat melakukan enkripsi atau deskripsi dengan
                menggunakan 4 Algoritma berikut :
            </div>
            <br>
            <div class="algoritma">
                <div class="judul-algoritma">
                    <p> 1. Algoritma Caesar Chipper </p>
                    <div class="icon-down">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
                <div class="content">
                    <div>
                        Caesar Cipher, juga dikenal sebagai Caesar Shift atau Shift Cipher, adalah jenis enkripsi
                        sederhana yang digunakan untuk mengenkripsi pesan dengan menggeser setiap huruf dalam teks asli
                        sejumlah tetap yang ditentukan. Teknik ini dinamai sesuai dengan Julius Caesar, seorang jenderal
                        Romawi kuno, yang dikatakan menggunakannya untuk mengamankan komunikasi militer.
                    </div>
                    <button><a href="caesar.php">Caesar Chipper</a></button>
                </div>
            </div>
            <br><br>
            <div class="algoritma">
                <div class="judul-algoritma">
                    <p> 2. Algoritma XOR </p>
                    <div class="icon-down">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
                <div class="content">
                    <div>
                        XOR Cipher (Xclusive OR Cipher), adalah jenis enkripsi
                        sederhana yang menggunakan operasi XOR (Xclusive OR) untuk mengenkripsi dan mendekripsi pesan.
                        XOR adalah operasi logika yang menghasilkan keluaran "true" (1) hanya jika ada jumlah ganjil
                        dari input yang berisi "true" (1). Dalam konteks enkripsi, XOR digunakan untuk menggabungkan
                        pesan dengan kunci, dan hasilnya adalah pesan terenkripsi.
                    </div>
                    <button><a href="testing/xor.php">XOR</a></button>
                </div>
            </div>
            <br><br>
            <div class="algoritma">
                <div class="judul-algoritma">
                    <p>3. Algoritma Vignere</p>
                    <div class="icon-down">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
                <div class="content">
                    <div>
                        Vigenère Cipher adalah jenis enkripsi yang lebih kuat daripada Caesar Cipher. Ia mengenkripsi
                        pesan dengan menggunakan kunci yang terdiri dari beberapa karakter, bukan hanya satu pergeseran
                        tunggal seperti dalam Caesar Cipher. Nama "Vigenère" berasal dari nama seorang diplomat Prancis,
                        Blaise de Vigenère, yang tidak menemukan metode ini, tetapi populerkannya pada abad ke-16.
                    </div>
                    <button><a href="testing/vignere.php">Vignere</a></button>
                </div>
            </div>
            <br><br>
            <div class="algoritma">
                <div class="judul-algoritma">
                    <p>4. Algoritma Super Enkripsi</p>
                    <div class="icon-down">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
                <div class="content">
                    <div>
                        Algoritma Super Enkripsi merupakan gabungan dari ketiga algoritma sebelumnya yakni Caesar
                        Chipper, Vignere, dan XOR. Dimana untuk enkripsi,
                        pesan plaintext akan di enkripsi terlebih dahulu menggunakan Caesar, kemudian di enkripsi
                        menggunakan alogritma Vignere, dan
                        terakhir akan di enkripsi menjadi biner menggunakan algoritma XOR.
                        Kemudian untuk deskripsi yakni kebalikan nya, dimana pesan Chippertext yang berupa biner akan di
                        deskripsi menggunakan XOR, kemudian
                        di deskripsi lagi menggunakan algoritma Vignere dan terakhir di deskripri menggunakan Algoritma
                        Caesar sehingga menghasilkan
                        Plaintext yang bisa di baca semua orang.
                    </div>
                    <button><a href="superEnkripsi.php">Super Enkripsi</a></button>
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
    <script src="script/index.js"></script>
</body>

</html>