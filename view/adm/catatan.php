<h3 class='page-header'>Laporan Kegiatan Magang</h3>
<div class='table-responsive' style="width: 1700px;">
	<?php
	if (isset($_GET['id_siswa'])) {
		if ($_GET['id_siswa'] !== "") {
			$id_user = $_GET['id_siswa'];
			include './view/note.php';
		} else {
			header("location:catatan");
		}
	} else {
		$sql = "SELECT du.id_user,du.nis_user,du.name_user,b.namaBidang,du.sklh_user FROM `detail_user` AS du INNER JOIN bidang as b ON b.idBidang = du.idBidang";
		if ($conn->query($sql)->num_rows !== 0) {
			echo "<table class='table table-striped' style='width:50%'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Peserta</th>
							<th>Penempatan</th>
							<th>Asal Sekolah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>";
			$query_siswa = $conn->query($sql);
			$no = 0;
			while ($get_siswa = $query_siswa->fetch_assoc()) {
				$id_siswa = $get_siswa['id_user'];
				$name = $get_siswa['name_user'];
				$school = $get_siswa['sklh_user'];
				$penempatan = $get_siswa['namaBidang'];
				$no++;
				echo "<tr>
							<td>$no</td>
							<td>$name</td>
							<td><strong>$penempatan</strong></td>
							<td>$school</td>
							<td><a href='catatan&id_siswa=$id_siswa' title='Catatan $name' class='btn btn-primary'>Lihat Laporan</a></td>
						</tr>";
			}
			$conn->close();
			echo "</tbody></table>";
		} else {
			echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
		}
	}
	?>
</div>