<h3 class='page-header'>Tambah Nilai Magang</h3>
<?php
if (isset($_GET['st'])) {
    if ($_GET['st'] == 1) {
        echo "<div class='alert alert-warning'><strong>Berhasil Ditambahkan.</strong></div>";
    } elseif ($_GET['st'] == 2) {
        echo "<div class='alert alert-danger'><strong>Gagal Menambahkan.</strong></div>";
    } elseif ($_GET['st'] == 4) {
        echo "<div class='alert alert-danger'><strong>Semua kolom wajib di isi.</strong></div>";
    }
}

?>

<form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
    <div class="form-group">
        <label class="control-label col-sm-2" for="nama_peserta">Nama Lengkap:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_peserta" placeholder="Masukan Nama Lengkap" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nilai">Kepribadian:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="kepribadian" placeholder="Masukan Nilai Kepribadian Peserta" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nilai">Kedisiplinan:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="kedisiplinan" placeholder="Masukan Nilai Kedisiplinan Peserta" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nilai">Keterampilan:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="keterampilan" placeholder="Masukan Nilai Keterampilan Peserta" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nilai">Kerja Sama:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="kerja_sama" placeholder="Masukan Nilai Kerja Sama Peserta" required>
        </div>
    </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class='btn btn-success' name="add_nilai">Simpan</button>
        </div>
    </div>
</form>