<?php
require 'config.php';


$id = $_POST['id'];

$query = "DELETE FROM siswa WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>
