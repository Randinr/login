<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header('Location: index.php'); // Kembali ke halaman utama setelah penghapusan
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
