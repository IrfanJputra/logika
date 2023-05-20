<?php
session_start(); // Memulai session

if(isset($_POST['absen'])) { // Cek jika tombol absen telah ditekan
    // Lakukan proses absen disini
    // ...

    // Set session untuk menandai bahwa user telah melakukan absen
    $_SESSION['absen_done'] = true;
}

if(isset($_SESSION['absen_done']) && $_SESSION['absen_done'] == true) { // Cek jika user telah melakukan absen sebelumnya
    // Jika user telah melakukan absen sebelumnya, maka tombol absen disembunyikan
    echo '<style>#tombol-absen { display: none; }</style>';
}
?>

<!-- Tampilan tombol absen -->
<button id="tombol-absen" name="absen" type="submit">Absen</button>
