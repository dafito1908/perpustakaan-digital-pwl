<?php
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') { 
    header("Location: login.php"); exit(); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $stok     = $_POST['stok'];

    mysqli_query($conn, "INSERT INTO books (judul, penulis, kategori, stok) VALUES ('$judul', '$penulis', '$kategori', '$stok')");
    header("Location: admin_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex align-items-center vh-100">
    
    <div class="container" style="max-width: 500px;">
        <div class="card p-4 shadow-sm border-0">
            <h4 class="text-center mb-4 fw-bold text-primary">Tambah Buku Baru</h4>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required placeholder="Masukkan judul buku">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="penulis" class="form-control" required placeholder="Nama penulis">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="kategori" class="form-control" required placeholder="Contoh: Informatika">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Stok</label>
                    <input type="number" name="stok" class="form-control" required placeholder="0">
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Data Buku</button>
                <a href="admin_dashboard.php" class="btn btn-outline-secondary w-100">Batal / Kembali</a>
            </form>
        </div>
    </div>

</body>
</html>