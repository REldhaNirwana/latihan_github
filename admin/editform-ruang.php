<!DOCTYPE html>
<html lang="en">
<head>
 <title>DATA RUANGAN</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 <script src="js/jquery.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
$idruang = $_GET['id_ruang']; 
//koneksi database
include('koneksi/koneksi.php');
//query
$query = "SELECT * FROM data_ruang WHERE id_ruang='$idruang'";
$result = mysqli_query($idruang, $query);
?>

<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
 <h3>Update Data Ruangan</h3>
 <form role="form" action="edit-ruang.php" method="get">
 <?php
 while ($row = mysqli_fetch_assoc($result)) {
 ?>

 <input type="hidden" name="id_ruang" value="<?php echo $row['id_ruang']; ?>">

 <div class="form-group">
  <label>Nama Ruangan</label>
  <input type="text" name="nama_ruang" class="form-control" value="<?php echo $row['nama_ruang']; ?>">   
 </div>

 <div class="form-group">
  <label>Kapasitas</label>
  <input type="text" name="kapasitas" class="form-control" value="<?php echo $row['kapasitas']; ?>">   
 </div>

 <div class="form-group">
  <label>Status Ruang</label>
  <input type="text" name="status_ruang" class="form-control" value="<?php echo $row['status_ruang']; ?>">   
 </div>

 <div class="form-group">
  <label>id gedung</label>
  <input type="text" name="id_gedung" class="form-control" value="<?php echo $row['id_gedung']; ?>">   
 </div>
 <button type="submit" class="btn btn-success btn-block">Update Ruangan</button>

 <?php 
 }
 mysqli_close($db);
 ?>    
 </form>
</div>
</body>
</html>