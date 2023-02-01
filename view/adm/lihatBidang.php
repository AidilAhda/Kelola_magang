<script src="https://kit.fontawesome.com/0427cee4dc.js" crossorigin="anonymous"></script>
<h3 class='page-header'>Daftar Bidang</h3>
<?php
if (isset($_GET['st'])) {
    if ($_GET['st'] == 1) {
        echo "<div class='alert alert-warning'><strong>Berhasil Ditambahkan.</strong></div>";
    } elseif ($_GET['st'] == 2) {
    } elseif ($_GET['st'] == 3) {
        echo "<div class='alert alert-success'><strong>Berhasil dihapus.</strong></div>";
    } elseif ($_GET['st'] == 4) {
        echo "<div class='alert alert-danger'><strong>Data tidak boleh kosong.</strong></div>";
    } elseif ($_GET['st'] == 5) {
        echo "<div class='alert alert-danger'><strong>Gagal dihapus.</strong></div>";
    }
}

?>

<div class='table-responsive'>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBidangModal">
        Tambah Bidang
    </button>

    <!--  ubah Modal -->
    <!-- ADD Modal -->
    <div class="modal fade" id="addBidangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold ;">Tambah Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                    <form class="form-horizontal" role="form" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nama_peserta">ID Bidang:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="tIdBidang" placeholder="Masukan ID " required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nilai">Nama Bidang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tNamaBidang" placeholder="Masukan Nama Bidang " required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success " name="tambah_bidang">Simpan</button>
            </div>
            </form>
        </div>
    </div>


    <!-- <a class='btn btn-info float-right' href=''> <i class='fa-sharp fa-id fa-user-plus'></i> Tambah Bidang</a>' -->
    <?php
    if (isset($_GET['idBidang'])) {
        if ($_GET['idBidang'] !== "") {
            $idBidang = $_GET['idBidang'];
            include './view/adm/detailBidang.php';
        }
    } else {
        $sql = "SELECT*FROM bidang ORDER BY idBidang";
        $query = $conn->query($sql);
        if ($query->num_rows !== 0) {

            echo "<table class='table table-striped' style='width:1500px'>
        <thead>
            <tr>
                <th>ID Bidang</th>
                <th>Nama Bidang</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>";
            $no = 0;
            while ($get_siswa = $query->fetch_assoc()) {
                $idBidang = $get_siswa['idBidang'];
                $namaBidang = $get_siswa['namaBidang'];
                $no++;
                echo "<tr>
            
                <td>$idBidang</td>
                <td><strong>$namaBidang</strong></td>
                <td><a href='lihatBidang&idBidang=$idBidang'  class='btn btn-primary'
                    ><i class='fa-solid fa-eye'></i> Lihat </a>

                    <a type='button' class='btn btn-danger' onclick='hapusBidang($idBidang)'><i class='fa-solid fa-trash'></i> 
            Hapus 
    </a> </td>
            </tr>";
            }
            echo "</tbody>
    </table>";
            $conn->close();
        } else {
            echo "<div class='alert alert-danger'><strong>Tidak ada Bidang untuk ditampilkan</strong></div>";
        }
    }
    ?>
    <script src="lib/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/js/sweetalert2.css">
    <script>
        function hapusBidang(idBidang) {
            var id = idBidang;
            swal({
                title: 'Anda Yakin?',
                text: 'Semua data Bidang akan dihapus!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            }, function() {
                window.location.href = "./model/proses.php?del_bidang=" + id;
            });
        }
    </script>