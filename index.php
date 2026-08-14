<?php
include 'koneksi.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') { header("Location: admin_dashboard.php"); } 
    else { header("Location: user_katalog.php"); }
} else {
    header("Location: login.php");
}
exit();
?>