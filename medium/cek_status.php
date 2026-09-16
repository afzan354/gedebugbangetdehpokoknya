<?php
// cek_status.php untuk Level Medium

function cekFileString($filename, $searchString) {
    if (!file_exists($filename)) return false;
    $content = file_get_contents($filename);
    return strpos($content, $searchString) !== false;
}

$status = [
    'config' => false,
    'index' => false,
    'tambah' => false,
    'edit' => false,
    'hapus' => false
];

// Cek config.php: apakah password dikosongkan
if (cekFileString('config.php', '$db_pass = \'\';') || cekFileString('config.php', '$db_pass = "";')) {
    $status['config'] = true;
}

// Cek index.php: apakah fetch_assoc digunakan
if (cekFileString('index.php', 'mysqli_fetch_assoc')) {
    $status['index'] = true;
}

// Cek tambah.php: apakah form method jadi POST
if (cekFileString('tambah.php', 'method="POST"') || cekFileString('tambah.php', 'method="post"')) {
    $status['tambah'] = true;
}

// Cek edit.php: apakah query UPDATE ada klausa WHERE
$edit_content = file_exists('edit.php') ? file_get_contents('edit.php') : '';
if (preg_match('/UPDATE\s+siswa\s+SET.*?WHERE\s+id\s*=/is', $edit_content)) {
    $status['edit'] = true;
}

// Cek hapus.php: apakah query DELETE ada klausa WHERE id=
$hapus_content = file_exists('hapus.php') ? file_get_contents('hapus.php') : '';
if (preg_match('/DELETE\s+FROM\s+siswa\s+WHERE\s+id\s*=/is', $hapus_content)) {
    $status['hapus'] = true;
}

$semuaSelesai = !in_array(false, $status, true);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status - Level Medium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Status Misi Debugging - Level Medium</h2>
    
    <?php if($semuaSelesai): ?>
        <div class="alert alert-success text-center">
            <h4>🎉 Luar Biasa! Level Medium berhasil ditaklukkan! 🎉</h4>
            <p>Silakan lanjut ke Level Hard.</p>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <strong>Ada logika yang masih salah!</strong> Cek kembali kode Anda.
        </div>
    <?php endif; ?>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 1: Perbaiki password database di config.php
            <span class="badge bg-<?php echo $status['config'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['config'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 2: Gunakan fungsi fetch array yang tepat di index.php
            <span class="badge bg-<?php echo $status['index'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['index'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 3: Perbaiki method form di tambah.php menjadi POST
            <span class="badge bg-<?php echo $status['tambah'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['tambah'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 4: Cegah UPDATE semua data di edit.php (tambah WHERE)
            <span class="badge bg-<?php echo $status['edit'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['edit'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 5: Cegah DELETE semua data di hapus.php (tambah WHERE)
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
