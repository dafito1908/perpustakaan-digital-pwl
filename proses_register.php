<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah dipakai!'); window.location='register.php';</script>";
} else {
    mysqli_query($conn, "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', 'mahasiswa')");
    echo "<script>alert('Berhasil daftar! Silakan login.'); window.location='login.php';</script>";
}
?>