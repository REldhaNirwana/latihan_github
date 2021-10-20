<?php
//add koneksi

include('koneksi/koneksi.php');

$namaruang = $_POST['nama_ruang'];
$kapasitas= $_POST['kapasitas'];
$status = $_POST['status_ruang'];
$idgedung = $_POST['id_gedung'];

//query
$query =  "INSERT INTO data_ruang(nama_ruang , kapasitas , status_ruang, id_gedung) VALUES('$namaruang' , '$kapasitas' , '$status' , '$idgedung')";

if (mysqli_query($db , $query)) {
 header("location:data-ruang.php");
}
else{
 echo "ERROR, tidak berhasil". mysqli_error($db);
}

mysqli_close($db);
?>