<?php
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') { header("Location: login.php"); exit(); }
$buku = mysqli_query($conn, "SELECT * FROM books WHERE stok > 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katalog Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark navbar-custom px-4">
    <a class="navbar-brand fw-bold" href="#">Perpustakaan</a>
    <div class="ms-auto">
        <a href="cart.php" class="btn btn-outline-light btn-sm me-2">Keranjang</a>
        <a href="riwayat.php" class="btn btn-outline-light btn-sm me-2">Riwayat</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>
<div class="container my-4">
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($buku)): ?>
        <div class="col-md-4 mb-3">
            <div class="card card-buku p-3 h-100">
                <h5 class="fw-bold"><?= $row['judul']; ?></h5>
                <p>Penulis: <?= $row['penulis']; ?></p>
                <a href="cart_tambah.php?id=<?= $row['id']; ?>" class="btn btn-primary mt-auto">+ Pinjam</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>