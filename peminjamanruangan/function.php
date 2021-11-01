<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "pinjamruang1");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat variable array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $idruang = htmlspecialchars($data['idruang']);
    $nama = htmlspecialchars($data['nama']);
    $kapasitas = htmlspecialchars($data['kapasitas']);
    $status = $data['status'];
    $gambar = upload();
    $jurusan = $data['jurusan'];

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO ruang VALUES ('$idruang','$nama','$kapasitas','$status','$gambar','$jurusan')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($idruang)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM ruang WHERE idruang = $idruang");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $idruang = htmlspecialchars($data['idruang']);
    $nama = htmlspecialchars($data['nama']);
    $kapasitas = htmlspecialchars($data['kapasitas']);
    $jurusan = $data['jurusan'];
    $status = $data['status'];
    $gambar = upload();

    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE ruang SET nama = '$nama', kapasitas = '$kapasitas', jurusan = '$jurusan', status = '$status', gambar = '$gambar' WHERE idruang = $idruang";

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

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
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



//pinjam
// Membuat fungsi tambah
function tambah1($data)
{
    global $koneksi;

    $idpinjam = htmlspecialchars($data['idpinjam']);
    $nama_p = htmlspecialchars($data['nama_p']);
    $tgl_pinjam = Date('Y-m-d');
    $jam_awal = date('H:i:s');
    $jam_akhir = '';
    $surat_p = upload1();
    $idruang = $data['idruang'];

    if (!$surat_p) {
        return false;
    }

    $sql = "INSERT INTO peminjaman VALUES ('$idpinjam','$nama_p','$tgl_pinjam','$jam_awal','$jam_akhir','$surat_p','$idruang')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus1($idpinjam)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM peminjaman WHERE idpinjam = $idpinjam");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah1($data)
{
    global $koneksi;

    $idpinjam = htmlspecialchars($data['idpinjam']);
    $nama_p = htmlspecialchars($data['nama_p']);
    $tgl_pinjam = Date('Y-m-d');
    $jam_awal = date('H:i:s');
    $jam_akhir = '';
    $surat_p = upload1();
    $idruang = $data['idruang'];

    $suratLama = $data['suratLama'];

    if ($_FILES['surat_p']['error'] === 4) {
        $surat_p = $suratLama;
    } else {
        $surat_p = upload1();
    }

    $sql = "UPDATE peminjaman SET nama_p = '$nama_p', tgl_pinjam = '$tgl_pinjam',  jam_awal = ' $jam_awal', jam_akhir = '$jam_akhir', surat_p = '$surat_p', idruang ='$idruang'  WHERE idpinjam = $idpinjam";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi upload surat
function upload1()
{
    // Syarat
    $namaFile = $_FILES['surat_p']['name'];
    $ukuranFile = $_FILES['surat_p']['size'];
    $error = $_FILES['surat_p']['error'];
    $tmpName = $_FILES['surat_p']['tmp_name'];

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

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folder img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}