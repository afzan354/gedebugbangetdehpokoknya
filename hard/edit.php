<?php
require 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM siswa WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $id_update = $_POST['id']; 
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $id_kelas = $_POST['id_kelas'];

    $update_query = "UPDATE siswa SET nis='$nis', nama='$nama', jurusan='$jurusan', alamat='$alamat', id_kelas='$id_kelas' WHERE id='$id_update'";
    
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - Hard</title>
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
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        $q_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while($k = mysqli_fetch_assoc($q_kelas)){
                            $selected = ($k['id_kelas'] == $data['id_kelas']) ? 'selected' : '';
                            echo "<option value='{$k['id_kelas']}' $selected>{$k['nama_kelas']}</option>";
                        }
                        ?>
                    </select>
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
