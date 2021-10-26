<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
// Memanggil
require 'koneksi/connect.php';

// Mengambil data
$no_ruang = $_GET['no_ruang'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($no_ruang) > 0) {
    echo "<script>
                alert('Data ruang berhasil dihapus!');
                document.location.href = 'dataruang.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data ruang gagal dihapus!');
        </script>";
}