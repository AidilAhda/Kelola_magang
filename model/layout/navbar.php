<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="color: white;"> <span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="home" style="color: white; font-weight:bold">PENGELOLAAN DATA MAGANG </a>
	<?php
	ob_start();
	if (isset($_SESSION['pb'])) {
		$data = "ADMIN";
	} elseif (isset($_SESSION['sw'])) {
		$data = "PESERTA MAGANG";
	}
	?>

</div>
<div id="navbar" class="navbar-collapse collapse">
	<p><i class="fa-solid fa-user"></i> <?php echo $data ?></p>
	<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
		<li id="output_m"></li>
		37
		<?php
		if (isset($_SESSION['pb'])) {
			$link = array("", "add_siswa", "siswa", "absen", "absensi", "req_catatan", "catatan", "katasandi&id=$_SESSION[id]", "keluar");
			$name = array("", "Tambah Siswa", "Daftar Siswa", "Absen", "Lihat Absensi", "Catatan", "Lihat Catatan", "Ubah Katasandi", "Keluar");

			for ($i = 1; $i <= count($link) - 1; $i++) {
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
				echo "hai";
			}
		} elseif (isset($_SESSION['sw'])) {
			$link = array("", "absen", "absensi", "tambah_catatan", "catatan", "keluar");
			$name = array("", "Absen", "Absensiku", "Tambah Catatan", "Catatan", "Keluar");

			for ($i = 1; $i <= count($link) - 1; $i++) {

				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
		}
		?>
	</ul>
</div>
<style>
	p {
		margin-left: 85%;
		margin-top: 14px;
		color: white;
		font-weight: bold;
		font-size: 15px;
	}
</style>