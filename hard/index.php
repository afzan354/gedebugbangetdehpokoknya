<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Hard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Siswa (Level: Hard)</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="cek_status.php" class="btn btn-warning mb-3 float-end">Cek Status Error</a>
    

    <p>Hasil pencarian untuk: <strong><?php echo $_GET['cari']; ?></strong></p>

    <form method="GET" class="mb-3 d-flex">
        <input type="text" name="cari" class="form-control me-2" placeholder="Cari nama siswa...">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </form>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
            
            $query = "SELECT siswa.*, kelas.nama_kelas 
                      FROM siswa 
                      LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
                      WHERE siswa.nama LIKE '%$cari%' 
                      ORDER BY siswa.id DESC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nis']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jurusan']; ?></td>
                <td><?php echo $row['nama_kelas']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>

        
</div>
</body>
</html>
