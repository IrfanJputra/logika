<?php
require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


	// cek apakah data berhasil di tambahkan atau tidak
	if (absen($_POST) > 0) {
		echo "
			<script>
				alert('Anda Berhasil Absen!');
				document.location.href = 'absen.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Gagal Absen!');
				document.location.href = 'absen.php';
			</script>
		";
	}
}
?>

<?php
session_start();
$_SESSION['halaman'] = 'index.php';
if (!isset($_SESSION["level"])) {
	header("Location: login.php");
	exit;
}

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
if (isset($_POST['submit'])) {
    // Tombol absen ditekan, simpan waktu terakhir tombol absen ditekan
    setLastAbsenTime();
}

?>

<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>latihan</title>
</head>

<?php
$result = mysqli_query($conn, "SELECT * FROM tb_login WHERE id_pegawai");
$data = mysqli_fetch_assoc($result);
?>
<body onload="getLocation();">
	<h1>SILAHKAN ABSEN</h1>
	<?php if (isAbsenButtonVisible()): ?>
	<form class="myForm" action="" method="post" autocomplete="off">
		<label for=""><?=$_SESSION['username']?></label> <br> <br>
		<input type="text" name="nama" value="<?=$_SESSION['id_pegawai']?>">
		<input type="hidden" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s'); ?>">
		<input type="hidden" name="status" id="status" value="Sudah">
		<input type="hidden" name="latitude" value="">
		<input type="hidden" name="longitude" value="">
		<button type='submit' name='submit'>Absen</button>
	</form>
	<?php else: ?>
		<p>anda sudah absen</p>
        <p>Tombol absen akan muncul kembali setelah 1 menit.</p>
    <?php endif; ?>
	
	<br>
	<br>
	<table border="1">

		<tr>
			<th>no</th>
			<th>id pegawai</th>
			<th>tanggal</th>
			<th>status</th>
			<th>maps</th>
		</tr>
		<?php
		$no = 1;
		$data = mysqli_query($conn, "SELECT * FROM tb_absen WHERE id_pegawai= '$_SESSION[id_pegawai]' ORDER BY tanggal DESC ");
		while ($row = mysqli_fetch_assoc($data)) {
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row['id_pegawai']; ?></td>
				<td><?= $row['tanggal']; ?></td>
				<td><?= $row['status']; ?></td>
				<td style="width: 150px; height: 150px;"><iframe src="https://www.google.com/maps?q=<?= $row['latitude']; ?>,<?= $row['longitude']; ?>&hl=es;z=14&output=embed" frameborder="0"></iframe></td>
			</tr>
		<?php }
		?>
	</table>
	<a href="index.php">Home</a>
	<a href="add_user.php">Tambah User</a>
	<a href="logout.php">logout</a>

	<script type="text/javascript">
		function getLocation() {

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			}
		}

		function showPosition(position) {
			document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
			document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
		}

		function showError(error) {
			switch (error.code) {
				case error.PERMISSION_DENIED:
					alert("Aktifkan Lokasi Terlebih dahulu");
					location.reload();
					break;
			}
		}
	</script>
</body>

</html>