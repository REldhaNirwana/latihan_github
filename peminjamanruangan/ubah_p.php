<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data idruang
$idpinjam = $_GET['idpinjam'];

// Mengambil data dari table
$peminjaman = query("SELECT * FROM peminjaman INNER JOIN ruang on(peminjaman.idruang=ruang.idruang) WHERE status = 'dipinjam' ORDER BY idpinjam DESC");

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah1'])) {
    if (ubah1($_POST) > 0) {
        echo "<script>
                alert('Data pinjam berhasil diubah!');
                document.location.href = 'peminjaman.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data pinjam gagal diubah!');
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
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Ubah Data</title>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="suratLama" value="<?= $peminjaman['surat_p']; ?>">
                    <div class="mb-3">
                        <label for="idpinjam" class="form-label">ID Pinjam</label>
                        <input type="number" class="form-control w-50" id="idpinjam" value="<?= $peminjaman['idpinjam']; ?>" name="idpinjam" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_p" class="form-label">Nama</label>
                        <input type="text" class="form-control w-50" id="nama_p" value="<?php echo $peminjaman['nama_p']; ?>" name="nama_p" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="text" class="form-control w-50" id="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam']; ?>" name="tgl_pinjam" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam_awal" class="form-label">Jam Awal</label>
                        <input type="text" class="form-control w-50" id="jam_awal" value="<?= $peminjaman['jam_awal']; ?>" name="jam_awal" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam_akhir" class="form-label">Jam Akhir</label>
                        <input type="text" class="form-control w-50" id="jam_akhir" value="<?= $peminjaman['jam_akhir']; ?>" name="jam_akhir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="surat_p" class="form-label">Surat Peminjaman <i>(Saat ini)</i></label> <br>
                        <img src="img/<?= $peminjaman['surat_p']; ?>" width="50%" style="margin-bottom: 10px;">
                        <input class="form-control form-control-sm w-50" id="surat_p" name="surat_p" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="idruang" class="form-label">ID ruang</label>
                        <input type="number" class="form-control w-50" id="idruang" value="<?= $peminjaman['idruang']; ?>" name="idruang" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
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