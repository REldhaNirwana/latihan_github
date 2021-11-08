<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika data diklik maka
if (isset($_POST['dataPinjam'])) {
    $output = '';

    // mengambil data
    $sql = "SELECT * FROM peminjaman WHERE idpinjam = '" . $_POST['dataPinjam'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['surat_p'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">idpinjam</th>
                            <td width="60%">' . $row['idpinjam'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama_p'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tgl_pinjam</th>
                            <td width="60%">' . $row['tgl_pinjam'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">jam_awal</th>
                            <td width="60%">' . $row['jam_awal'] . '</td>
                        </tr>
                        <tr>
                        <th width="40%">jam_akhir</th>
                        <td width="60%">' . $row['jam_akhir'] . '</td>
                    </tr>
                        <tr>
                            <th width="40%">idruang</th>
                            <td width="60%">' . $row['idruang'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
