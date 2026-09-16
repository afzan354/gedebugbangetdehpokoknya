<?php
// cek_status.php untuk Level Easy

function cekFileString($filename, $searchString) {
    if (!file_exists($filename)) return false;
    $content = file_get_contents($filename);
    return strpos($content, $searchString) !== false;
}

$status = [
    'config' => false,
    'index1' => false,
    'index2' => false,
    'tambah' => false,
    'edit' => false,
    'hapus' => false
];

// Cek config.php: apakah $dbname diganti $db_name (atau minimal tidak ada error saat di-include)
if (cekFileString('config.php', '$db_name);') || cekFileString('config.php', '$db_name );')) {
    $status['config'] = true;
}

// Cek index.php
if (cekFileString('index.php', '$row[\'nama\']') || cekFileString('index.php', '$row["nama"]')) {
    $status['index1'] = true;
}
if (cekFileString('index.php', '$row[\'alamat\']; ?>') || cekFileString('index.php', '$row["alamat"]; ?>')) {
    $status['index2'] = true;
}

// Cek tambah.php
if (cekFileString('tambah.php', 'INSERT INTO')) {
    $status['tambah'] = true;
}

// Cek edit.php
if (cekFileString('edit.php', '} else {') || cekFileString('edit.php', '}else{') || cekFileString('edit.php', '}else {') || cekFileString('edit.php', '} else{')) {
    $status['edit'] = true;
}

// Cek hapus.php
if (cekFileString('hapus.php', '$_GET[\'id\']') || cekFileString('hapus.php', '$_GET["id"]')) {
    $status['hapus'] = true;
}

$semuaSelesai = !in_array(false, $status, true);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status - Level Easy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Status Misi Debugging - Level Easy</h2>
    
    <?php if($semuaSelesai): ?>
        <div class="alert alert-success text-center">
            <h4>🎉 Selamat! Semua error di Level Easy berhasil diperbaiki! 🎉</h4>
            <p>Silakan lanjut ke Level Medium.</p>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <strong>Masih ada error!</strong> Periksa kembali kode Anda berdasarkan panduan di bawah.
        </div>
    <?php endif; ?>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 1: Perbaiki koneksi database di config.php (Variable Typo)
            <span class="badge bg-<?php echo $status['config'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['config'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 2: Perbaiki pemanggilan variabel di index.php (Kurang $)
            <span class="badge bg-<?php echo $status['index1'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['index1'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 3: Perbaiki penutup perintah echo di index.php (Kurang ;)
            <span class="badge bg-<?php echo $status['index2'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['index2'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 4: Perbaiki syntax SQL di tambah.php (INSER INTO)
            <span class="badge bg-<?php echo $status['tambah'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['tambah'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 5: Perbaiki penutup blok kondisi di edit.php (Kurang })
            <span class="badge bg-<?php echo $status['edit'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['edit'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 6: Perbaiki penangkapan parameter di hapus.php (GET vs POST)
            <span class="badge bg-<?php echo $status['hapus'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['hapus'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
    </ul>

    <div class="mt-4 text-center">
        <a href="index.php" class="btn btn-primary">Kembali ke Aplikasi</a>
    </div>
</div>
</body>
</html>
