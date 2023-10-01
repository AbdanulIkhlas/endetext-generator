// Mengambil elemen judul-proses
let judulProses = document.querySelector('.judul-proses');

// Mengambil elemen isi-proses yang terkait
let isiProses = document.querySelector('.isi-proses');

// Menambahkan event listener pada judul-proses
judulProses.addEventListener('click', function () {
    // Jika isi-proses aktif, maka nonaktifkan (display:none)
    if (isiProses.style.display === 'block') {
        isiProses.style.display = 'none';
    } else {
        // Jika tidak aktif, maka aktifkan (display:block)
        isiProses.style.display = 'block';
    }
});