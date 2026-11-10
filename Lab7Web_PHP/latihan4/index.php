<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
$hargaAwal = 150000;
$diskon = 10;
$hargaAkhir = hitungDiskon($hargaAwal, $diskon);
$luas = hitungLuasPersegiPanjang(8, 4);
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan 4</title></head><body>
<h2>Contoh Function PHP</h2>
<p>Harga awal: <?= formatRupiah($hargaAwal) ?></p>
<p>Diskon: <?= $diskon ?>%</p>
<p>Harga setelah diskon: <?= formatRupiah($hargaAkhir) ?></p>
<p>Luas persegi panjang (8 x 4): <?= $luas ?></p>
</body></html>
