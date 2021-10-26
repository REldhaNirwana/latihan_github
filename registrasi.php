<?php
include 'koneksi.php';
require 'proses_registrasi.php';
if(isset($_POST['signup']) ){
  if(registrasiakun($_POST)> 0){
    echo "<script>
          alert('Pengguna baru berhasil ditambahkan');
          </script>";
  }else{
    echo mysqli_error($db);
  }
}

?>
<!doctype html>
<html lang="en">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Registrasi</title>
  </head>
    <style>

      .form-signin{
        width: 100%;
        max-width: 330px;
        padding-top: 200px;
        padding-bottom: 100px;
        margin-left: 200px;
        float: left;
      }
    </style>

    <body>
    <form action=" " method="post">
      <div class="container">
        <div class="row justify-content-start">
          <div class="text-left">
             <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                <p>Silahkan isi data dibawah ini untuk melakukan pendaftaran akun</p>
                
                <input for = "name" type="text" id="name" name = "name" class="form-control" placeholder="Name" required autofocus>
                <br>
                
                <input for = "username" type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                <br>
                
                <input for ="password" type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <br>

                <input for ="password2" type="password2" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password" required>
                <br>

                <div>
                <select class="form-select" name="level" id="level" for="level" style="width: 330px">
                  <option selected>Level</option>
                  <option value="admin">Admin</option>
                  <option value="peminjam">Peminjam</option>
                </select>
                </div>
                <br>

                <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button>
              </form>
            </div>
            <div class="col-4" style="padding-top: 150px; margin-left: 200px;">
              <img src="img/logo.png">     
            </div>
    <script type="text/JavaScript" src="js/bootstrap.min.js"></script>
  </body>
</html>