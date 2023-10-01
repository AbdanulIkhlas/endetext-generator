// Mengambil elemen .proses-toggle
let prosesToggle = document.querySelector('.proses-toggle');

// Mengambil elemen .proses
let proses = document.querySelector('.proses');

// Menambahkan event listener untuk mengubah tampilan .proses saat .proses-toggle diklik
prosesToggle.addEventListener('click', function () {
  // Toggle class "active" pada .proses-toggle untuk mengubah ikon panah
  prosesToggle.classList.toggle('active');

  // Toggle tampilan .proses
  if (proses.style.display === 'block') {
    proses.style.display = 'none';
  } else {
    proses.style.display = 'block';
  }
});