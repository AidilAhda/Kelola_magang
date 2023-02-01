<h3 class='page-header'>Daftar Nilai Magang</h3>
<div class='table-responsive'>
    <?php
    $sql = "SELECT*FROM tbl_nilai";
    $query = $conn->query($sql);
    if ($query->num_rows !== 0) {
        echo "<table class='table table-striped' style='width:1500px'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kepribadian</th>
                <th>Kedisiplinan</th>
                <th>Keterampilan</th>
                <th>Kerja Sama</th>
                
            </tr>
        </thead>
        <tbody>";
        $no = 0;
        while ($get_siswa = $query->fetch_assoc()) {
            $name = $get_siswa['nama_peserta'];
            $Kepribadian = $get_siswa['kepribadian'];
            $Kedisiplinan = $get_siswa['kedisiplinan'];
            $Keterampilan = $get_siswa['keterampilan'];
            $kerja_sama = $get_siswa['kerja_sama'];
            $no++;
            echo "<tr>
                <td>$no</td>
                <td>$name</td>
                <td><strong>$Kepribadian</strong></td>
                <td><strong>$Kedisiplinan</strong></td>
                <td><strong>$Keterampilan</strong></td>
                <td><strong>$kerja_sama</strong></td>
                <td></td>
            </tr>";
        }
        echo "</tbody>
    </table>";
        $conn->close();
    } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
    }

    ?>
</div>