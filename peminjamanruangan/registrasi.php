<?php
require 'function.php';
if(isset($_POST['signup']) ){
  if(registrasiakun($_POST)> 0){
    header("location: login.php");
  }else{
    echo mysqli_error($koneksi);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">

    <title>Register Sistem</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href=#>SISTEM PEMINJAMAN RUANGAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bantuan.php">Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peminjaman.php">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->
    
    <body>
    <form action=" " method="post">
      <div class="container" >
             <form class="form-signin"  style= "margin: 0 auto">
                <h3 style=padding-top:50px;>Registrasi</h3>
                
                <input for = "name" type="text" id="name" name = "name" class="form-control" placeholder="Name" style="width: 370px" required autofocus>
                <br>
                
                <input for = "username" type="text" id="username" name="username" class="form-control" placeholder="Username" style="width: 370px" required autofocus>
                <br>
                
                <input for ="password" type="password" id="password" name="password" class="form-control" placeholder="Password" style="width: 370px" required>
                <br>

                <input for ="password2" type="password2" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password" style="width: 370px" required>
                <br>

                <div>
                    <select class="form-select" name="level" id="level" for="level" style="width: 370px">
                    <option selected>Level</option>
                    <option value="admin">Admin</option>
                    <option value="peminjam">Peminjam</option>
                    </select>
                </div><br>
                <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button>  
              </form>    

    </div>
</form>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>