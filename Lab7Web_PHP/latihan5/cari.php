<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Latihan GET</title></head><body>
<h2>Pencarian Nama dengan GET</h2>
<form method="GET" action="">
<label for="kata">Kata kunci:</label>
<input id="kata" name="kata" type="text" value="<?= htmlspecialchars($_GET['kata'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
<button type="submit">Cari</button>
</form>
<?php
$daftar = ["Alya", "Bima", "Citra", "Doni", "Erlina"];
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    if ($kata === "") {
        echo "<p>Kata kunci belum diisi.</p>";
    } else {
        $hasil = array_filter($daftar, fn($nama) => stripos($nama, $kata) !== false);
        echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
        if ($hasil) {
            echo "<p>Nama ditemukan: " . htmlspecialchars(implode(", ", $hasil), ENT_QUOTES, "UTF-8") . "</p>";
        } else {
            echo "<p>Nama tidak ditemukan.</p>";
        }
    }
}
?>
</body></html>
