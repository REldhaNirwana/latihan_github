<?php
session_start();
// Memanggil atau membutuhkan file
include 'koneksi/connect.php';

// Mengambil data dari no ruangan
$no_ruang = $_GET['no_ruang'];

// Mengambil data dari table ruang dari no ruang yang tidak sama dengan 0
$ruang = query("SELECT * FROM ruang WHERE no_ruang = $no_ruang")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data ruangan berhasil diubah!');
                document.location.href = 'dataruang.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data ruangan gagal diubah!');
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
    <!-- CSS -->
    <link rel="stylesheet" href="css/stylehome.css">

    <title>Ubah Data</title>
</head>

<body>
    <!-- header section -->
    <header class="header">
    <a href="#" class="logo">
        <img src="img/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#bantuan">bantuan</a>
        <a href="admin/data-ruang.php">daftar ruang</a>
        <a href="#peminjaman">peminjaman</a>
        <a href="#notifikasi">notifikasi</a>
        <a href="logout.php">Logout</a>
    </nav>
  </header>
  <!-- header section -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Ruangan</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
                    <div class="mb-3">
                        <label for="no_ruang" class="form-label">No</label>
                        <input type="number" class="form-control w-50" id="no_ruang" value="<?= $ruang['no_ruang']; ?>" name="no_ruang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control w-50" id="nama" value="<?= $ruang['nama']; ?>" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="text" class="form-control w-50" id="kapasitas" value="<?= $ruang['kapasitas']; ?>" name="kapasitas" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="status" class="form-control w-50" id="status" value="<?= $ruang['status']; ?>" name="status" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar <i>(Saat ini)</i></label> <br>
                        <img src="img/<?= $ruang['gambar']; ?>" width="50%" style="margin-bottom: 10px;">
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="id_gedung" class="form-label">ID gedung</label>
                        <input type="id_gedung" class="form-control w-50" id="id_gedung" value="<?= $ruang['id_gedung']; ?>" name="id_gedung" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="dataruang.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



   <!-- footer section -->
  <section class="footer">

<nav class="navbar">
  <a href="#home">home</a>
  <a href="#bantuan">bantuan</a>
  <a href="#daftar-ruang">daftar ruang</a>
  <a href="#peminjaman">peminjaman</a>
  <a href="#notifikasi">notifikasi</a>
</nav>
<div class="credit">created by <span>Eldha dan Yurischa</span> | all rights reserved</div>
</section>
<!-- footer section -->

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>