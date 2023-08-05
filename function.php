<?php
$conn = mysqli_connect("localhost","root","mysql","tes");


function tambah($data) {
	global $conn;

    $nama =htmlspecialchars ($data["nama"]);
    $alamat =htmlspecialchars ($data["alamat"]);
    $foto = htmlspecialchars($data["foto"]);
		// tambahkan userbaru ke database
	$query = "INSERT INTO tb_pegawai VALUES (NULL,'$nama','$alamat','$foto')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function absen($data) {
	global $conn;
	$nama	= ($data["nama"]);
    $tanggal = ($data["tanggal"]);
    $status = ($data["status"]);
	$latitude = ($data["latitude"]);
    $longitude = ($data["longitude"]);
    $query = "INSERT INTO tb_absen VALUES (NULL,'$nama','$tanggal','$status','$latitude','$longitude')";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    
}


function edit($data){
    global $conn;
$id = $_GET['id'];
$nama = ($data['nama']);
$alamat = ($data['alamat']);
$foto = ($data['foto']);


$query = "UPDATE tb_pegawai 
              SET nama='$nama', alamat='$alamat', foto='$foto'
              WHERE id= $id";

mysqli_query($conn, $query);
    
return mysqli_affected_rows($conn);

}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_pegawai WHERE id_pegawai = $id");
	return mysqli_affected_rows($conn);
}

//hapus admin

function hapus_admin ($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM tb_login WHERE id_admin = $id");
    return mysqli_affected_rows($conn);
    }

    //registrasi

function registrasi($data) {
	global $conn;
	$id_pegawai	= ($data["id_pegawai"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$level     = htmlspecialchars($data["level"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_login WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	$query = "INSERT INTO tb_login VALUES (NULL '$id_pegawai', '$username', '$password', '$level')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function add_user($data) {
	global $conn;
	$id_pegawai	= ($data["id_pegawai"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$level     = htmlspecialchars($data["level"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_login WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO tb_login VALUES(NULL,'$id_pegawai', '$username', '$password', '$level')");

	return mysqli_affected_rows($conn);

}


?>

