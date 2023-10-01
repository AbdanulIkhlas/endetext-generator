//! Mengambil elemen judul-proses
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


//! Script untuk key XOR
// Mengambil elemen select dan input
let keyTypeSelect = document.getElementById('key-type');
let keyInput = document.getElementById('key-input');

// Menambahkan event listener pada perubahan nilai select menggunakan event input
keyTypeSelect.addEventListener('input', function () {
    // Mendapatkan nilai yang dipilih dalam select
    let selectedValue = keyTypeSelect.value;

    // Mengubah tipe input berdasarkan nilai yang dipilih
    if (selectedValue === 'ascii-char') {
        keyInput.setAttribute('type', 'text');
    } else if (selectedValue === 'ascii-decimal') {
        keyInput.setAttribute('type', 'number');
    }
});
