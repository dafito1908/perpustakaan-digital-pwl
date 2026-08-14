<?php
include 'koneksi.php';
mysqli_query($conn, "DELETE FROM books WHERE id=".$_GET['id']);
header("Location: admin_dashboard.php");
?>