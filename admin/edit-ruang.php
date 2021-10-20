<?php
//add koneksi
include('koneksi/koneksi.php');

$namaruang = $_GET['nama_ruang'];
$kapasitas= $_GET['kapasitas'];
$status = $_GET['status_ruang'];
$idgedung = $_GET['id_gedung'];

//query update
$query = "UPDATE data_ruang SET nama_ruang='$namaruang' , kapasitas='$kapasitas' , status_ruang='$status' , idgedung='$id_gedung' WHERE id_ruang='$idruang' ";

if (mysqli_query($db, $query)) {
 header("location:data-ruang.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($db);
}

mysqli_close($db);
?>