<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
// if (!isset($_SESSION['login'])) {
//     header('location:login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Bantuan</title>
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

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">BANTUAN</h3>
                <hr>
                <img class="tengah" src="img/logo.png" />
                <h3>Bagaimana tata cara peminjaman ruangan?</h3>
                
                <p>
            1. Untuk dapat melakukan peminjaman ruangan, anda diharuskan melakukan login.<br>
            2. Jika ingin mengetahui ruangan yang tersedia, silahkan menuju menu daftar ruang.<br>
            3. Perhatikan kapasitas dari ruangan yang diinginkan.<br>
            4. Jika sudah mengetahui ruangan yang ingin dipinjam, silahkan klik menu peminjaman.<br>
            5. Isikan data-data yang dibutuhkan, wajib menyertakan surat permohonan peminjaman.<br>
            6. Jika semua data telah terisi klik tombol pinjam.<br>
            7. Peminjaman telah terproses, silahkan tunggu pemberitahuan lebih lanjut.<br>
            8. Untuk mengecek peminjaman, silahkan pilih notifikasi peminjaman.</p> 
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Footer -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2">
                <h4 class="fw-bold text-uppercase">About</h4>
                <p>Sistem Peminjaman Fasilitas Ruangan di Politeknik Negeri Malang ini dibuat
                    untuk memudahkan proses peminjaman ruangan agar lebih efisien dan terkomputerisasi.
                </p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Account Links</h4>
                <a href="https://www.facebook.com/polinema/" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="https://github.com/polinema-gui" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="https://www.instagram.com/polinema_campus/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="https://twitter.com/polinema_campus" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created by Eldha dan Yurischa</a></p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>