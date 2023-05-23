<?php
session_start();

// Fungsi untuk menyimpan waktu terakhir tombol absen ditekan
function setLastAbsenTime() {
    $_SESSION['last_absen_time'] = time();
}

// Fungsi untuk memeriksa apakah tombol absen harus muncul atau tidak
function isAbsenButtonVisible() {
    if (!isset($_SESSION['last_absen_time'])) {
        // Jika belum pernah ditekan sebelumnya, tampilkan tombol absen
        return true;
    }

    $lastAbsenTime = $_SESSION['last_absen_time'];
    $currentTime = time();
    $elapsedTime = $currentTime - $lastAbsenTime;

    // Jika sudah lebih dari 1 jam (3600 detik), tampilkan tombol absen
    if ($elapsedTime >= 60) {
        return true;
    }

    // Jika belum 1 jam, tombol absen tetap disembunyikan
    return false;
}

// Cek apakah tombol absen ditekan
if (isset($_POST['absen'])) {
    // Tombol absen ditekan, simpan waktu terakhir tombol absen ditekan
    setLastAbsenTime();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contoh Tombol Absen</title>
</head>
<body>
    <?php if (isAbsenButtonVisible()): ?>
        <form method="POST">
            <input type="submit" name="absen" value="Absen">
        </form>
    <?php else: ?>
        <p>Tombol absen akan muncul kembali setelah 1 jam.</p>
    <?php endif; ?>
</body>
</html>
