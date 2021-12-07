<?php
session_start();
// Jika bisa login maka ke index.php
// if (isset($_SESSION['login'])) {
//     header('location:index.php');
//     exit;
// }

// Memanggil atau membutuhkan file function.php
require 'function.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);

    // mengambil data dari user dimana username yg diambil
    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");

    $cek = mysqli_num_rows($result);

    // jika $cek lebih dari 0, maka berhasil login dan masuk ke index.php
    if($cek > 0){
 
        $data = mysqli_fetch_assoc($result);
     
        // cek jika user login sebagai admin
        if($data['level']=="admin"){
     
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:index.php");
     
        // cek jika user login sebagai pegawai
        }else if($data['level']=="peminjam"){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "peminjam";
            // alihkan ke halaman dashboard pegawai
            header("location:index_p.php");
     
        }
    
    }
    else{
        echo "<script>
        alert('Maaf Anda Gagal Login')
        </script>";
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

    <title>Login Sistem</title>
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

    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 text-center login">
                <h4 class="fw-bold">Login</h4>
                <!-- Ini Error jika tidak bisa login -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                    </div>
                    <!-- <input type="submit" name="login" value="Login"><br> -->
                    <button class="btn btn-primary text-uppercase" type="submit" name="login">Login</button>
                    <p>Belum punya akun? <a href="registrasi.php" class="daftar">Daftar</a></p>
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>