<?php
require 'config.php';

$id = $_GET['id'];


$query = "DELETE FROM siswa";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>
