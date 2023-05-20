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
$result = mysqli_query($conn, "SELECT * FROM tb_pegawai");
$data = mysqli_fetch_assoc($result);
?>
<body onload="getLocation();">
	<h1>SILAHKAN ABSEN</h1>
	<form class="myForm" action="" method="post" autocomplete="off">
		<input type="hidden" name="nama" value="<?php echo $data['id_pegawai']; ?>">
		<input type="hidden" name="tanggal" id="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s'); ?>">
		<input type="hidden" name="status" id="status" value="Sudah">
		<input type="hidden" name="latitude" value="">
		<input type="hidden" name="longitude" value="">
		<?php
		error_reporting(0); // Untuk menonaktifkan semua pesan error
		$query = mysqli_query($conn, "SELECT * FROM tb_absen ORDER BY id_absen DESC");
		if ($query) {
			$data = mysqli_fetch_assoc($query);
			$statusAbsensi = $data['status'];

			// Jika absensi sudah selesai, sembunyikan tombol absen
			if ($statusAbsensi == 'Sudah') {
				echo "Sudah Absen";
			} else {
				echo "<br> <br>";
				echo "<button type='submit' name='submit'>Absen</button>";
			}
		} else {
			echo "Gagal mengambil data absensi.";
		}


		?>

	</form>

	<br>
	<br>
	<table border="1">

		<tr>
			<th>no</th>
			<th>tanggal</th>
			<th>status</th>
			<th>maps</th>
		</tr>
		<?php
		$no = 1;
		$data = mysqli_query($conn, "SELECT * FROM tb_absen ORDER BY id_absen DESC");
		while ($row = mysqli_fetch_assoc($data)) {
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row['tanggal']; ?></td>
				<td><?= $row['status']; ?></td>
				<td style="width: 150px; height: 150px;"><iframe src="https://www.google.com/maps?q=<?= $row['latitude']; ?>,<?= $row['longitude']; ?>&hl=es;z=14&output=embed" frameborder="0"></iframe></td>
			</tr>
		<?php }
		?>
	</table>
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