<?php
$nama = "Siti";
$tugas = 85;
$uts = 78;
$uas = 90;
$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

if ($nilaiAkhir >= 85) {
    $predikat = "A";
} elseif ($nilaiAkhir >= 75) {
    $predikat = "B";
} elseif ($nilaiAkhir >= 60) {
    $predikat = "C";
} else {
    $predikat = "D";
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan 2</title></head>
<body>
<h2>Perhitungan Nilai Mahasiswa</h2>
<p>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></p>
<p>Nilai akhir: <?= number_format($nilaiAkhir, 2, ',', '.') ?></p>
<p>Predikat: <?= $predikat ?></p>
</body></html>
