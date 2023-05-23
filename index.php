<?php
session_start();
$_SESSION ['halaman']='index.php';
if( !isset($_SESSION["level"]) ) {
	header("Location: login.php");
	exit;
}
?>

<?php 
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM tb_pegawai");
$no=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan</title>
</head>
<body>
    <br>
    <br>
    <a href="admin/add.php"><button>tambah data</button></a>
    <table border="1"> 

        <tr>
            <th>no</th>
            <th>nama</th>
            <th>alamat</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
<?php 
while($data= mysqli_fetch_array($query)){
    ?>
        <tr>
            <td><?=$no++?></td>
            <td><?= $data['nama'];?></td>
            <td><?=$data['alamat'];?></td>
            <td><?=$data['foto'];?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id'];?>">ubah</a>
                <a href="del.php?id=<?php echo $data['id'];?>"onclick="return confirm('yakin?');">hapus</a>
            </td>
        </tr>
    <?php }
    ?>
    </table>
    <a href="absen.php">Absen</a>
    <a href="logout.php">logout</a>
</body>
</html>