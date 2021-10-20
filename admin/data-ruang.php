<!DOCTYPE html>
<html lang="en">
<head>
 <title>DATA RUANG</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 <script src="js/jquery.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

</head>
<body>

 <?php
 //tambahkan koneksi
 include('koneksi/koneksi.php');

 //query
 $query = "SELECT * FROM data_ruang";

 $result = mysqli_query($db , $query);

 ?>

 <div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
  <h3>FORM DATA RUANGAN</h3>
  <hr>
  <div class="row">
   <div class="col-sm-4">
    <h3>Form Tambah Ruang</h3>
    <form role="form" action="insertruang.php" method="post">
     <div class="form-group">
      <label>Nama Ruangan</label>
      <input type="text" name="nama_ruang" class="form-control" required>
     </div>
     <div class="form-group">
      <label>Kapasitas</label>
      <input type="text" name="kapasitas" class="form-control" required>
     </div>
     <div class="form-group">
      <label>Status Ruangan</label>
      <input type="text" name="status_ruang" class="form-control" required>
     </div>
     <div class="form-group">
      <label>ID Gedung</label>
      <input type="text" name="id_gedung" class="form-control" required>
     </div>
     <button type="submit" class="btn btn-info btn-block">Tambah Ruangan</button>     
    </form>
    
   </div>
   <div class="col-sm-8">
    <h3>Tabel Daftar RUANGAN</h3>
    <table class="table table-striped table-hover dtabel">
     <thead>
      <tr>
       <th>No</th>
       <th>Nama Ruangan</th>
       <th>Kapasitas</th>
       <th>Status Ruangan</th>
       <th>ID Gedung</th>
       <th>Aksi</th>
      </tr>
     </thead>
     <tbody> 
      
      <?php
       $no = 1;  
       while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
       <td><?php echo $no++; ?></td>
       <td><?php echo $row['nama_ruang']; ?></td>
       <td><?php echo $row['kapasitas']; ?></td>
       <td><?php echo $row['status_ruang']; ?></td>
       <td><?php echo $row['id_gedung']; ?></td>
       <td>
        <a href="editform.php?id=<?php echo $row['id_ruang'];?>" class="btn btn-success" role="button">Edit</a>
        <a href="delete.php?id=<?php echo $row['id_ruang']?>" class="btn btn-danger" role="button">Delete</a>
       </td>
      </tr>

      <?php
       }
       mysqli_close($db); 
      ?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
</body>

 <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
 <script>
 $(document).ready(function() {
  $('.dtabel').DataTable();
 } );
 </script>

</html>