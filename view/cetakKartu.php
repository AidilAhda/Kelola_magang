<script src="https://kit.fontawesome.com/0427cee4dc.js" crossorigin="anonymous"></script>
<?php
if (isset($_SESSION['sw'])) {
    $sql = "SELECT*FROM detail_user WHERE id_user='$_SESSION[id]'";
    $query = $conn->query($sql);
    $get_user = $query->fetch_assoc();
    $name = $get_user['name_user'];
    $id_user = $get_user['id_user'];
    $nis = $get_user['nis_user'];

    echo "<h1 class='page-header'>Welcome, $name </h1>";
    echo "<a class='btn btn-info float-right' href = 'http://localhost/Kelola_magang/cetak/kartu.php?nis=$nis'> <i class='fa-solid fa-download'></i> Download Kartu</a>";
}
?>
<?php
$sql = mysqli_query($conn, "SELECT du.id_user,du.nis_user,du.name_user,b.namaBidang,b.idBidang,du.sklh_user FROM `detail_user` AS du INNER JOIN bidang as b ON b.idBidang = du.idBidang WHERE du.nis_user = ' $nis ' ");
$user = mysqli_fetch_array($sql);
$nis = $user['nis_user'];
$name = $user['name_user'];
$idBidang = $user['idBidang'];
$penempatan = $user['namaBidang'];
$sekolah = $user['sklh_user'];
echo "<center>

<img src='http://localhost/Kelola_magang/assets/logo-indihome.png' style='width: 125px;height: 125px;margin-left: 26px;'>
    <h3 style='text-align: center;'>PT Tusamatel </h3>
    <h3 style='text-align: center;''>KARTU PESERTA MAGANG </h3><hr>
    </center>
    <p><strong>Diberikan kepada yang bertanda di bawah ini :</strong> </p>
    ID Magang                :  $nis <br><br>
    Nama Magang          :  $name <br><br>
    ID Penempatan      :  $idBidang <br><br>
    Penempatan Magang      :  $penempatan <br><br>
    Asal Sekolah    : $sekolah <br><br>
    <strong>Diharapkan kepada seluruh peserta untuk membawa kartu ini ketika akan melaksanakan program magang </strong><br>"
?>