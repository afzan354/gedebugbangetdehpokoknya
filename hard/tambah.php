<?php
require 'config.php';

if (isset($_POST['submit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST['id_kelas'];

    $query = "INSERT INTO siswa (nis, nama, jurusan, alamat, id_kelas) VALUES ('$nis', '$nama', '$jurusan', '$alamat', '$id_kelas')";
    
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Hard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Siswa</h2>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        $q_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while($k = mysqli_fetch_assoc($q_kelas)){
                            echo "<option value='{$k['id_kelas']}'>{$k['nama_kelas']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
