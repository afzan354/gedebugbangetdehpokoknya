# Project Debugging CRUD PHP Native 

Proyek ini dibuat untuk siswa kelas 11 RPL berlatih memperbaiki error pada aplikasi CRUD menggunakan PHP Native dan Bootstrap. Terdapat 3 tingkat kesulitan: **Easy**, **Medium**, dan **Hard**.

## Persiapan
1. Import file `database.sql` ke dalam MySQL / phpMyAdmin.
2. Clone atau letakkan folder ini di dalam direktori server lokal Anda (misalnya `htdocs` untuk XAMPP atau `www` untuk Laragon).
3. Kerjakan setiap tantangan secara berurutan mulai dari `easy`, `medium`, lalu `hard`.

## Tantangan

### 1. Level Easy (Mudah)
Di level ini, Anda akan menemui error-error dasar (Syntax Error).
- **Misi:** Temukan tanda baca yang hilang (seperti titik koma), typo pada kueri SQL, dan variabel yang salah tulis.
- **Cara cek:** Buka file `easy/cek_status.php` di browser untuk melihat progress Anda.

### 2. Level Medium (Sedang)
Di level ini, syntax program sudah benar, namun logika aplikasi masih salah (Logic Error).
- **Misi:** Perbaiki konfigurasi database, metode pengiriman form (`GET` / `POST`), perbaiki array hasil query, dan amankan operasi `UPDATE` / `DELETE` yang berpotensi merusak semua data.
- **Cara cek:** Buka file `medium/cek_status.php` di browser.

### 3. Level Hard (Sulit)
Di level ini, terdapat isu keamanan, UI yang rusak, dan logika kompleks yang menyebabkan error.
- **Misi:** Cegah aplikasi dari serangan **SQL Injection**, perbaiki tabel Bootstrap yang berantakan, perbaiki logic pengiriman ID yang hilang saat *edit*, dan benahi logika *delete*.
- **Cara cek:** Buka file `hard/cek_status.php` di browser.

## Catatan
Setelah Anda memperbaiki semua error pada suatu level, pastikan seluruh indikator pada halaman `cek_status.php` berubah menjadi "Berhasil / Sukses" (Hijau).

Selamat mengerjakan dan asah logika debugging Anda! 🚀
