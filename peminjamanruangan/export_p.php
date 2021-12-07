<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table berdasarkan id secara Descending
$peminjaman = query("SELECT * FROM peminjaman ORDER BY idpinjam DESC");

// Membuat nama file
$filename = "data pinjam-" . date('Ymd') . ".xls";

// Kodingan untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pinjam.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>ID Pinjam</th>
            <th>Nama Peminjam</th>
            <th>ID Ruang</th>
            <th>Tgl Pinjam</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($peminjaman as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['idpinjam']; ?></td>
                <td><?= $row['nama_p']; ?></td>
                <td><?= $row['idruang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>