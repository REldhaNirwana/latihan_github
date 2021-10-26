<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "pinjamruangan");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



// Membuat fungsi tambah ruang
function tambah($data)
{
    global $koneksi;

    $no_ruang = htmlspecialchars($data['no_ruang']);
    $nama = htmlspecialchars($data['nama']);
    $kapasitas = htmlspecialchars($data['kapasitas']);
    $status = htmlspecialchars($data['status']);
    $gambar = upload();
    $nama_gedung = htmlspecialchars($data['nama_gedung']);

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO ruang VALUES ('$no_ruang','$nama','$kapasitas','$status','$gambar','$nama_gedung')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($no_ruang)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM ruang WHERE no_ruang = $no_ruang");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $no_ruang = htmlspecialchars($data['no_ruang']);
    $nama = htmlspecialchars($data['nama']);
    $kapasitas = htmlspecialchars($data['kapasitas']);
    $status = htmlspecialchars($data['status']);
    $gambar = upload();
    $nama_gedung = htmlspecialchars($data['nama_gedung']);

    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE ruang SET nama = '$nama', kapasitas = '$kapasitas', status ='$status', gambar = '$gambar', nama_gedung = '$nama_gedung' WHERE no_ruang = $no_ruang";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}