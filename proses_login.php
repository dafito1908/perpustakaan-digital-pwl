<?php
include 'koneksi.php';
$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    
    if ($user['role'] == 'admin') { header("Location: admin_dashboard.php"); } 
    else { header("Location: user_katalog.php"); }
} else {
    echo "<script>alert('Email/password salah!'); window.location='login.php';</script>";
}
?>