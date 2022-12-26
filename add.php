<?php
require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>
<body onload="getLocation();">
    <form class="myForm" action="" method="post" autocomplete="off">
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama"><br> <br>
    <label for="alamat">alamat</label>
    <input type="text" name="alamat" id="alamat"><br> <br>
    <label for="foto">foto</label>
    <input type="text" name="foto" id="foto""><br> <br>

	<input type="hidden" name="latitude" value="" >
	<input type="hidden" name="longitude" value=""> <br>
    
    <button type="submit" name="submit"> ADD</button>



    </form>

	<script type="text/javascript">
		function getLocation(){

			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			}
		}
		function showPosition(position){
			document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
			document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
		}
		function showError(error){
			switch(error.code){
				case error.PERMISSION_DENIED:
					alert("Aktifkan Lokasi Terlebih dahulu");
					location.reload();
					break;
			}
		}
	</script>
</body>
</html>