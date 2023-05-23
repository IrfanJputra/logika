<?php 
require 'function.php';
session_start();
if( isset($_POST["register"]) ) {

	if( add_user($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" method="post">

	<ul>
        <li>
            <label for="">Pilih User</label>
        <select class="form-select" aria-label="Default select example" name="id_pegawai">
                  <option disabled selected> Pilih Pegawai </option>
                      <?php 
                      include 'koneksi.php';
                        $result = mysqli_query($conn, "SELECT * FROM tb_pegawai");
                        while($data= mysqli_fetch_array($result)){
                        ?>
                          <option value="<?php echo $data['id_pegawai']; ?>"><?php echo $data['nama']; ?></option>
                        <?php
                        }
                            ?> 
                </select>
        </li>
		<li>
			<label for="username">username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
        <li>
            <label for="">Level</label>
        <select class="form-select" aria-label="Default select example" name="level">
                  <option readonly>Pilih level</option>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                </select>
        </li><br>
		<li>
			<button type="submit" name="register">Register!</button>
		</li>
	</ul>
	
</form>

</body>
</html>