<?php
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') { 
    header("Location: login.php"); exit(); 
}

$user_id = $_SESSION['user_id'];
$query = "SELECT carts.id as cart_id, books.judul, books.penulis, books.kategori 
          FROM carts 
          JOIN books ON carts.book_id = books.id 
          WHERE carts.user_id = $user_id";
$cart = mysqli_query($conn, $query);
$jumlah_item = mysqli_num_rows($cart);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-dark navbar-custom px-4 mb-4">
    <a class="navbar-brand fw-bold" href="user_katalog.php">Perpustakaan Digital</a>
    <div class="ms-auto">
        <a href="user_katalog.php" class="btn btn-outline-light btn-sm me-2">← Kembali ke Katalog</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container" style="max-width: 850px;">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">🛒 Keranjang Peminjaman Buku</h5>
        </div>
        <div class="card-body">
            <?php if($jumlah_item == 0): ?>
                <div class="text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" width="100" class="mb-3 opacity-50" alt="Empty">
                    <h6 class="text-muted">Keranjang peminjaman kamu masih kosong.</h6>
                    <a href="user_katalog.php" class="btn btn-primary btn-sm mt-3">Cari Buku Sekarang</a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while($row = mysqli_fetch_assoc($cart)): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="fw-semibold"><?= $row['judul']; ?></td>
                                <td class="text-muted"><?= $row['penulis']; ?></td>
                                <td><span class="badge bg-secondary"><?= $row['kategori']; ?></span></td>
                                <td class="text-center">
                                    <!-- Tombol Hapus Buku dari Keranjang -->
                                    <a href="cart_hapus.php?id=<?= $row['cart_id']; ?>" 
                                       class="btn btn-outline-danger btn-sm" 
                                       onclick="return confirm('Hapus buku ini dari keranjang?')">
                                        🗑️ Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info mt-3 d-flex align-items-center" role="alert">
                    <span class="me-2">ℹ️</span>
                    <small>Total buku yang ditaruh di keranjang: <strong><?= $jumlah_item; ?> Buku</strong>. Masa peminjaman standar adalah 7 hari.</small>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <a href="user_katalog.php" class="btn btn-outline-secondary">Tambah Buku Lain</a>
                    <a href="checkout.php" class="btn btn-success px-4 fw-bold" onclick="return confirm('Konfirmasi peminjaman buku ini?')">
                        Ajukan Checkout Sekarang
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>