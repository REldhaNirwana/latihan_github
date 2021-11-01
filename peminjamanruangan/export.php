<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table berdasarkan id secara Descending
$ruang = query("SELECT * FROM ruang ORDER BY idruang DESC");

// Membuat nama file
$filename = "data Ruang-" . date('Ymd') . ".xls";

// Kodingan untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Ruang.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>ID Ruang</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($ruang as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['idruang']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jurusan']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>