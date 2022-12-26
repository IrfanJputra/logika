<?php
$conn = mysqli_connect("localhost","root","mysql","tes");


function tambah($data) {
	global $conn;

    $nama =htmlspecialchars ($data["nama"]);
    $alamat =htmlspecialchars ($data["alamat"]);
    $foto = htmlspecialchars($data["foto"]);
    $latitude = ($data["latitude"]);
    $longitude = ($data["longitude"]);
    
    $query = "INSERT INTO tb_latihan VALUES (NULL,'$nama','$alamat','$foto','$latitude','$longitude')";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    
}


function edit($data){
    global $conn;
$id = $_GET['id'];
$nama = ($data['nama']);
$alamat = ($data['alamat']);
$foto = ($data['foto']);


$query = "UPDATE tb_latihan 
              SET nama='$nama', alamat='$alamat', foto='$foto'
              WHERE id= $id";

mysqli_query($conn, $query);
    
return mysqli_affected_rows($conn);

}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_latihan WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>

