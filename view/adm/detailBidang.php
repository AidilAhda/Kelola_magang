<?php
$id_bidang = mysqli_real_escape_string($conn, $_GET['idBidang']);
$sql_sw = "SELECT*FROM bidang WHERE idBidang= '$id_bidang'";
if ($get_sw = $conn->query($sql_sw)->fetch_assoc()) {
    extract($get_sw);
}
$sql = "SELECT du.id_user,du.nis_user,du.name_user,b.namaBidang,du.sklh_user FROM `detail_user` AS du INNER JOIN bidang as b ON b.idBidang = du.idBidang WHERE du.idBidang = $id_bidang";
$query = $conn->query($sql);



if ($query->num_rows !== 0) {


    echo "<table class='table table-striped' style='width:1500px'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Peserta</th>
							<th>Penempatan</th>
							<th>Asal Sekolah</th>
							
						</tr>
					</thead>
					<tbody>";
    $no = 0;
    while ($get_siswa = $query->fetch_assoc()) {
        $id_siswa = $get_siswa['id_user'];
        $name = $get_siswa['name_user'];
        $penempatan = $get_siswa['namaBidang'];
        $school = $get_siswa['sklh_user'];
        $no++;
        echo "
        <tr>
							<td>$no</td>
							<td>$name</td>
							<td><strong>$penempatan</strong></td>
							<td>$school</td>
							
						</tr>";
    }
    echo "</tbody></table>";
    $conn->close();
}
