<?php
$error = "";
$barang = "";
$subtotal = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang = trim($_POST["barang"] ?? "");
    $hargaInput = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";
    if ($barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
        $error = "Periksa kembali nama barang, harga, dan jumlah. Jumlah minimal 1.";
    } else {
        $harga = (float)$hargaInput;
        $jumlah = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
    }
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan 7</title></head><body>
<h2>Pengolahan Data Transaksi</h2>
<form method="POST">
<label>Nama barang <input name="barang" required></label><br><br>
<label>Harga <input name="harga" type="number" min="0" step="0.01" required></label><br><br>
<label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label><br><br>
<button type="submit">Hitung</button><button type="reset">Reset</button>
</form>
<?php if ($error !== ""): ?>
<p style="color:red"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p>
<?php elseif ($subtotal !== null): ?>
<h3>Ringkasan Transaksi</h3>
<p>Barang: <?= htmlspecialchars($barang, ENT_QUOTES, "UTF-8") ?></p>
<p>Subtotal: Rp<?= number_format($subtotal, 0, ",", ".") ?></p>
<?php endif; ?>
</body></html>
