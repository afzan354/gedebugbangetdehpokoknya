<?php
// cek_status.php untuk Level Hard

function cekFileString($filename, $searchString) {
    if (!file_exists($filename)) return false;
    $content = file_get_contents($filename);
    return strpos($content, $searchString) !== false;
}

$status = [
    'index1' => false,
    'index2' => false,
    'tambah' => false,
    'edit' => false,
    'hapus' => false
];

// Cek index.php: cek apakah $_GET['cari'] masih diecho langsung tanpa sanitasi/isset
if (!cekFileString('index.php', 'echo $_GET[\'cari\'];') && !cekFileString('index.php', 'echo $_GET["cari"];')) {
    $status['index1'] = true;
}
// Cek index.php: cek penutup tag
if (cekFileString('index.php', '</tbody>') && cekFileString('index.php', '</table>')) {
    $status['index2'] = true;
}

// Cek tambah.php: cek mysqli_real_escape_string
if (cekFileString('tambah.php', 'mysqli_real_escape_string')) {
    $status['tambah'] = true;
}

// Cek edit.php: cek keberadaan input hidden id
if (cekFileString('edit.php', 'type="hidden"') && (cekFileString('edit.php', 'name="id"') || cekFileString('edit.php', "name='id'"))) {
    $status['edit'] = true;
}

// Cek hapus.php: cek logika !empty($id)
if (cekFileString('hapus.php', '!empty($id)') || cekFileString('hapus.php', '$id != ""') || cekFileString('hapus.php', '$id != null')) {
    $status['hapus'] = true;
}

$semuaSelesai = !in_array(false, $status, true);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status - Level Hard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Status Misi Debugging - Level Hard</h2>
    
    <?php if($semuaSelesai): ?>
        <div class="alert alert-success text-center">
            <h4>🏆 MASTER DEBUGGER! Anda berhasil menyelesaikan semua tantangan! 🏆</h4>
            <p>Project siap dinilai oleh instruktur Anda.</p>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <strong>Wah, ini susah ya?</strong> Jangan menyerah, baca komentar ERROR di source code.
        </div>
    <?php endif; ?>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 1: Atasi Undefined Array Key pada pencarian di index.php (Gunakan isset)
            <span class="badge bg-<?php echo $status['index1'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['index1'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 2: Perbaiki layout UI yang hancur di index.php (Tutup tag HTML)
            <span class="badge bg-<?php echo $status['index2'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['index2'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 3: Amankan query INSERT dari SQL Injection di tambah.php
            <span class="badge bg-<?php echo $status['tambah'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['tambah'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 4: Pastikan ID terkirim saat edit data di edit.php (Gunakan input type hidden)
            <span class="badge bg-<?php echo $status['edit'] ? 'success' : 'danger'; ?> rounded-pill">
                <?php echo $status['edit'] ? 'Selesai' : 'Belum Selesai'; ?>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Misi 5: Perbaiki logika if terbalik saat menghapus data di hapus.php
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
