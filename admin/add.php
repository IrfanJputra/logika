<?php
require '../function.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../index.php';
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
<body>
    <form class="myForm" action="" method="post" autocomplete="off">
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama"><br> <br>
    <label for="alamat">alamat</label>
    <input type="text" name="alamat" id="alamat"><br> <br>
    <label for="foto">foto</label>
    <input type="text" name="foto" id="foto""><br> <br>
    <label for="foto">username</label>
    <input type="text" name="username" id="""><br> <br>
    <label for="foto">password</label>
    <input type="password" name="password" id="""><br> <br>
    <label for="foto">konfirmasi password</label>
    <input type="password" name="password2" id="foto""><br> <br>
    <label for="foto">level</label>
    <input type="text" name="level" id="foto""><br> <br>
    <button type="submit" name="submit"> ADD</button>



    </form>

</body>
</html>