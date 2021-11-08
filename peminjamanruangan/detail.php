<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika data diklik maka
if (isset($_POST['dataRuang'])) {
    $output = '';

    // mengambil data
    $sql = "SELECT * FROM ruang WHERE idruang = '" . $_POST['dataRuang'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">idruang</th>
                            <td width="60%">' . $row['idruang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . $row['jurusan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Status</th>
                            <td width="60%">' . $row['status'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
