<?php
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') { 
    header("Location: login.php"); exit(); 
}

$user_id    = $_SESSION['user_id'];
$tgl_pinjam  = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days')); 


$cart_query = mysqli_query($conn, "SELECT * FROM carts WHERE user_id=$user_id");

if (mysqli_num_rows($cart_query) > 0) {
    
  
    while($item = mysqli_fetch_assoc($cart_query)) {
        $book_id = $item['book_id'];
        
     
        mysqli_query($conn, "INSERT INTO borrowings (user_id, book_id, tanggal_pinjam, tanggal_kembali, status) 
                             VALUES ($user_id, $book_id, '$tgl_pinjam', '$tgl_kembali', 'dipinjam')");
        
        
        mysqli_query($conn, "UPDATE books SET stok = stok - 1 WHERE id=$book_id");
    }
    
    
    mysqli_query($conn, "DELETE FROM carts WHERE user_id=$user_id");
    
    echo "<script>alert('Peminjaman berhasil diajukan!'); window.location='riwayat.php';</script>";
} else {
    header("Location: user_katalog.php");
}
?>