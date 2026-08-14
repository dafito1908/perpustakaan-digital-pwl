<?php
include 'koneksi.php';
$user_id = $_SESSION['user_id'];
$book_id = $_GET['id'];
$cek = mysqli_query($conn, "SELECT * FROM carts WHERE user_id=$user_id AND book_id=$book_id");
if (mysqli_num_rows($cek) == 0) {
    mysqli_query($conn, "INSERT INTO carts VALUES (NULL, $user_id, $book_id, 1)");
}
header("Location: cart.php");
?>