<?php
session_start()
?>

<?php
include 'koneksi.php';

$query= mysqli_query($conn, "SELECT * FROM tb_pegawai");
$data = mysqli_fetch_assoc($query);

$id = $data['id_pegawai'];// Contoh nilai ID
$_SESSION['id_pegawai'] = $id;

echo $_SESSION['id_pegawai']; // Menampilkan nilai ID dari sesi
?>