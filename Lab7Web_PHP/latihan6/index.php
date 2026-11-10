<?php
$pesan = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    if ($nama === "" || $prodi === "") {
        $pesan = "<p>Semua kolom wajib diisi.</p>";
    } else {
        $pesan = "<h3>Data diterima</h3><p>Nama: " .
            htmlspecialchars($nama, ENT_QUOTES, "UTF-8") .
            "</p><p>Program Studi: " .
            htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") . "</p>";
    }
}
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan POST</title></head><body>
<h2>Form Data Mahasiswa</h2>
<form method="POST" action="">
<label>Nama: <input name="nama" type="text" required></label><br><br>
<label>Program Studi: <input name="prodi" type="text" required></label><br><br>
<button type="submit" name="kirim">Kirim Data</button>
<button type="reset">Reset</button>
</form>
<?= $pesan ?>
</body></html>
