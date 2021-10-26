<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'koneksi/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Fasilitas Ruangan</title>

    <!-- file css  -->
    <link rel="stylesheet" href="css/stylehome.css">

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
        <a href="admin/dataruang.php">daftar ruang</a>
        <a href="#peminjaman">peminjaman</a>
        <a href="#notifikasi">notifikasi</a>
        <a href="logout.php">Logout</a>
    </nav>
  </header>
  <!-- header section -->

  <!-- home section -->
  <section class="home" id="home">
    <div class="content">
        <h3>Sistem Peminjaman Fasilitas Ruangan</h3>
        <p>Pinjam Ruang merupakan sebuah project yang dibuat
          dalam memudahkan mahasiswa maupun civitas akademika dalam melakukan peminjaman ruangan di Politeknik Negeri Malang.</p>
        <a href="peminjaman.php" class="btn">Pinjam</a>
    </div>
  </section>
  <!-- home section -->

  <!-- bantuan section -->
  <section class="bantuan" id="bantuan">
  <h1 class="heading"> <span>Bantuan</span> </h1>

  <div class="row">
      <div class="image">
          <img src="img/logo.png" alt="">
      </div>
      <div class="content">
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
  </section>
  <!-- bantuan section -->

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


  <!-- file js  -->
<script src="js/script.js"></script>

</body>
</html>