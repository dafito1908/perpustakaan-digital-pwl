# Sistem Informasi Perpustakaan Digital

Aplikasi berbasis web untuk manajemen perpustakaan digital, mencakup pengelolaan katalog buku oleh Admin dan sistem peminjaman buku (Shopping Cart & Checkout) untuk Mahasiswa.

Project ini dibuat untuk memenuhi Tugas Akhir mata kuliah Pemrograman Web Lanjut.

Tim Pengembang (Kelompok Kupu-Kupu)
1. **Reza Septian** - 202343500669
2. **Muhamad Kahfi** - 202343500555
3. **Dafito Mamase** - 202343500661

## Fitur Utama
Sistem ini menggunakan pembagian hak akses (*Role-Based Access Control*) menjadi dua, yaitu:

## Sisi Admin:
- **Authentication & Authorization:** Login khusus akses Admin.
- **Master Data (CRUD):** Tambah, Edit, Hapus, dan Lihat data katalog buku serta manajemen jumlah stok.

## Sisi Mahasiswa (User):
- **Authentication:** Registrasi akun baru dan Login Mahasiswa.
- **Katalog Buku:** Melihat daftar buku yang stoknya tersedia (Stok > 0).
- **Shopping Cart:** Memasukkan buku ke keranjang peminjaman sementara dan menghapus item dari keranjang.
- **Checkout Transaksi:** Mengajukan peminjaman buku yang otomatis memotong stok buku di database.
- **Riwayat Peminjaman:** Memantau status peminjaman dan batas waktu pengembalian buku (default 7 hari).

## Teknologi yang Digunakan
- **Bahasa Pemrograman:** PHP Native
- **Database:** MySQL
- **User Interface:** HTML5, Bootstrap 5, dan CSS Kustom (Glassmorphism Effect)
- **Web Server:** XAMPP (Apache)

## Cara Instalasi & Menjalankan Aplikasi
1. Pastikan **XAMPP** sudah terinstall di komputermu.
2. *Clone* repository ini atau *download* sebagai ZIP, lalu ekstrak ke dalam folder `C:\xampp\htdocs\`.
3. Ubah nama folder hasil ekstrak menjadi `perpustakaan-app`.
4. Buka aplikasi XAMPP Control Panel, lalu jalankan module **Apache** dan **MySQL**.
5. Buka browser dan akses `http://localhost/phpmyadmin`.
6. Buat database baru dengan nama **`db_perpustakaan`**.
7. Lakukan *Import* file `db_perpustakaan.sql` yang ada di dalam folder project ke database tersebut.
8. Buka tab baru di browser dan jalankan aplikasi melalui URL:  
   `http://localhost/perpustakaan-app/`

## Akun Default untuk Testing (Demo)
Gunakan kredensial berikut untuk menguji aplikasi:

**Akun Admin**
- Email: `admin@mail.com`
- Password: `123456`

**Akun Mahasiswa**
- Email: `budi@mail.com`
- Password: `123456`
*(Atau gunakan fitur "Daftar Akun" di halaman login untuk membuat user baru)*
