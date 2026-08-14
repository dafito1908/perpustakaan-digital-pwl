<?php
include 'koneksi.php';


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'mahasiswa') { 
    header("Location: login.php"); exit(); 
}

$cart_id = $_GET['id'];
$user_id = $_SESSION['user_id'];


$query = "DELETE FROM carts WHERE id = $cart_id AND user_id = $user_id";
mysqli_query($conn, $query);


header("Location: cart.php");
exit();
?>