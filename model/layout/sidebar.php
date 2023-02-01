<ul class="nav nav-sidebar">
	<li id="output" style='color:white'>
	</li>
	<?php
	if (isset($_SESSION['pb'])) {
		$link = array("", "add_siswa", "siswa", "absen", "absensi", "lihatBidang", "req_catatan", "catatan", "add_nilai",  "katasandi&id=$_SESSION[id]", "keluar");
		$name = array("", "Tambah Magang", "Daftar Magang", "Absen", "Lihat Absensi", "Data Bidang", "Laporan", "Lihat Laporan", "Tambah Nilai",  "Ubah Password",  "Log Out");

		for ($i = 1; $i <= count($link) - 1; $i++) {
			if (strcmp($page, "$link[$i]") == 0) {
				$status = "class='active'";
			} else {
				$status = "";
			}
			/*if (mysql_num_rows($query_tday)==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				} */
			echo "<li $status ><a href='$link[$i]' style='color:white';font-weight:'bold'>$name[$i]</a></li>";
		}
	} elseif (isset($_SESSION['sw'])) {
		$this_day = date("d");
		$sql = "SELECT*FROM data_absen NATURAL LEFT JOIN tanggal WHERE nama_tgl='$this_day' AND id_user='$_SESSION[id]'";
		$query = $conn->query($sql);

		$query_tday = $query->fetch_assoc();


		$link = array("", "absen", "absensi", "tambah_catatan", "catatan", "lihat_nilai", "cetak_kartu", "keluar");
		$name = array("", "Absen", "Absensiku", "Tambah Laporan", "Laporan", "Lihat Nilai", "Cetak Kartu", "Log Out");

		for ($i = 1; $i <= count($link) - 1; $i++) {
			if (strcmp($page, "$link[$i]") == 0) {
				$status = "class='active'";
			} else {
				$status = "";
			}
			if ($query->num_rows == 0 && $link[$i] === "absen") {
				$warning = "<img src='./lib/img/warning.png' width='20' />";
			} else {
				$warning = "";
			}
			echo "<li $status><a href='$link[$i]'style='color:white'>$name[$i] $warning</a></li>";
		}
	}
	?>
</ul>