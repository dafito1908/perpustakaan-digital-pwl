<?php
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') { header("Location: login.php"); exit(); }
$buku = mysqli_query($conn, "SELECT * FROM books");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark navbar-custom px-4">
    <a class="navbar-brand fw-bold" href="#">Admin Perpus</a>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>
<div class="container my-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Kelola Data Buku</h3><a href="buku_tambah.php" class="btn btn-primary">+ Tambah Buku</a>
    </div>
    <table class="table table-bordered bg-white">
        <thead class="table-dark"><tr><th>No</th><th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($buku)): ?>
            <tr>
                <td><?= $no++; ?></td><td><?= $row['judul']; ?></td><td><?= $row['penulis']; ?></td><td><?= $row['stok']; ?></td>
                <td>
                    <a href="buku_edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="buku_hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>