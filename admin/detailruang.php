<?php
require 'koneksi/connect.php';

// Jika data ruangan di klik
if (isset($_POST['dataRuang'])) {
    $output = '';

    // mengambil data ruangan
    $sql = "SELECT * FROM ruang WHERE no_ruang = '" . $_POST['dataRuang'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">no_ruang</th>
                            <td width="60%">' . $row['no_ruang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kapasitas</th>
                            <td width="60%">' . $row['kapasitas'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">status</th>
                            <td width="60%">' . $row['status'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">id_gedung</th>
                            <td width="60%">' . $row['id_gedung'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
