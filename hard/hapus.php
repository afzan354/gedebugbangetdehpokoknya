<?php
require 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';


if (empty($id)) {
    // Keamanan tambahan: cegah penghapusan jika id = 1 (misal data superadmin/kepsek)
    if ($id == 1) {
        echo "<script>alert('Data ini dilindungi dan tidak boleh dihapus!'); window.location='index.php';</script>";
        exit;
    }

    $query = "DELETE FROM siswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
}
?>
