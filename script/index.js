// Mengambil semua elemen dengan kelas "judul-algoritma"
let judulAlgoritma = document.querySelectorAll('.judul-algoritma');

// Loop melalui setiap elemen judul-algoritma
for (let i = 0; i < judulAlgoritma.length; i++) {
    // Tambahkan event listener untuk setiap elemen judul-algoritma
    judulAlgoritma[i].addEventListener('click', function () {
        // Mengambil elemen content yang terkait dengan judul-algoritma yang di-klik
        let content = this.nextElementSibling;

        // Menghapus class "active" dari semua elemen algoritma
        let algoritma = document.querySelectorAll('.algoritma');
        for (let j = 0; j < algoritma.length; j++) {
            algoritma[j].classList.remove('active');
        }

        // Jika content aktif, maka nonaktifkan (display:none)
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            // Jika tidak aktif, maka aktifkan (display:block)
            content.style.display = 'block';
            // Menambahkan class "active" ke elemen algoritma yang di-klik
            this.closest('.algoritma').classList.add('active');
        }
    });
}
