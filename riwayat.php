<?php
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') { 
    header("Location: login.php"); exit(); 
}

$user_id = $_SESSION['user_id'];


$query = "SELECT borrowings.*, books.judul, books.penulis 
          FROM borrowings 
          JOIN books ON borrowings.book_id = books.id 
          WHERE borrowings.user_id = $user_id 
          ORDER BY borrowings.id DESC";
$riwayat = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-dark navbar-custom px-4 mb-4">
    <a class="navbar-brand fw-bold" href="user_katalog.php">Perpustakaan Digital</a>
    <div class="ms-auto">
        <a href="user_katalog.php" class="btn btn-outline-light btn-sm me-2">Katalog Buku</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container" style="max-width: 900px;">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-primary">📜 Riwayat Peminjaman Buku</h5>
            <span class="badge bg-primary"><?= $_SESSION['nama']; ?></span>
        </div>
        <div class="card-body">
            <?php if(mysqli_num_rows($riwayat) == 0): ?>
                <div class="text-center py-5">
                    <h6 class="text-muted">Kamu belum pernah meminjam buku.</h6>
                    <a href="user_katalog.php" class="btn btn-primary btn-sm mt-2">Mulai Pinjam Buku</a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Harus Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while($row = mysqli_fetch_assoc($riwayat)): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <strong><?= $row['judul']; ?></strong><br>
                                    <small class="text-muted"><?= $row['penulis']; ?></small>
                                </td>
                                <td><?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?></td>
                                <td><?= date('d M Y', strtotime($row['tanggal_kembali'])); ?></td>
                                <td>
                                    <?php if($row['status'] == 'dipinjam'): ?>
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Dikembalikan</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>