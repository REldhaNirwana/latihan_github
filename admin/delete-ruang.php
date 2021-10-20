<?php 

$idruang = $_GET['id_ruang']; 

include('koneksi/koneksi.php');

//query hapus
$query = "DELETE FROM data_ruang WHERE id_ruang = '$idruang' ";

if (mysqli_query($db , $query)) {
 header("location:data-ruang.php");
}
else{
 echo "ERROR, data gagal dihapus". mysqli_error($db);
}

mysqli_close($db);
?>