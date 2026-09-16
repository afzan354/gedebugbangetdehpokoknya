<?php
require 'config.php';

$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $update_query = "UPDATE siswa SET nis='$nis', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE id='$id'";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        header("Location: index.php");

    else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - Easy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Siswa</h2>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required><?php echo $data['alamat']; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
