<?php
$data = null;
$error = [];
$nama = $nim = $prodi = $email = "";
$semesterInput = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") $error[] = "NIM wajib diisi.";
    elseif (!ctype_digit($nim) || strlen($nim) !== 9) $error[] = "NIM harus terdiri dari 9 angka.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!ctype_digit($semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error[] = "Format email tidak valid.";

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Mini Project Data Mahasiswa</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f6f9;margin:0;padding:30px}
.container{max-width:650px;margin:auto;background:white;padding:25px;border-radius:10px}
label{display:block;margin:12px 0 5px}input{width:100%;padding:10px;box-sizing:border-box}
button{margin-top:16px;padding:10px 18px;cursor:pointer}.error{background:#ffe8e8;padding:12px;color:#9b111e}
.result{background:#e9f7ed;padding:15px;margin-top:18px}
</style></head><body><div class="container">
<h2>Formulir Data Mahasiswa</h2>
<form method="POST" action="">
<label>Nama lengkap</label><input name="nama" value="<?= h($nama) ?>" required>
<label>NIM (9 angka)</label><input name="nim" value="<?= h($nim) ?>" inputmode="numeric" required>
<label>Program studi</label><input name="prodi" value="<?= h($prodi) ?>" required>
<label>Semester (1–14)</label><input name="semester" type="number" min="1" max="14" value="<?= h($semesterInput) ?>" required>
<label>Email</label><input name="email" type="email" value="<?= h($email) ?>" required>
<button type="submit">Kirim Data</button><button type="reset">Reset</button>
</form>
<?php if ($error): ?><div class="error"><b>Data belum valid:</b><ul>
<?php foreach ($error as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
</ul></div><?php endif; ?>
<?php if ($data): ?><div class="result"><h3>Data mahasiswa berhasil diterima</h3>
<p>Nama: <?= h($data["nama"]) ?></p><p>NIM: <?= h($data["nim"]) ?></p>
<p>Program Studi: <?= h($data["prodi"]) ?></p><p>Semester: <?= h($data["semester"]) ?></p>
<p>Email: <?= h($data["email"]) ?></p></div><?php endif; ?>
</div></body></html>
