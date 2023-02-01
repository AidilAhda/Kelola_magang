<?php
include "../lib/db/dbconfig.php";
require_once '../vendor/autoload.php'
?>

<?php
$sql = mysqli_query($conn, "SELECT du.id_user,du.nis_user,du.name_user,b.namaBidang,b.idBidang,du.sklh_user FROM `detail_user` AS du INNER JOIN bidang as b ON b.idBidang = du.idBidang WHERE du.nis_user = '" . $_GET['nis'] . "' ");
$user = mysqli_fetch_array($sql);

use Dompdf\Dompdf;

$nis = $user['nis_user'];
$name = $user['name_user'];
$idBidang = $user['idBidang'];
$penempatan = $user['namaBidang'];
$sekolah = $user['sklh_user'];
$html =
    '<html><body>' .
    '<center>' .
    '<h3 style="text-align: center;">PT Tusamatel </h3>'  .
    '<h3 style="text-align: center;">KARTU PESERTA MAGANG </h3><hr>' .
    '</center>' .
    '<p><strong>Diberikan kepada yang bertanda di bawah ini :</strong> </p>' .
    'ID Magang                : ' . $nis  . '<br>' . '<br>' .
    'Nama Magang          : ' . $name . '<br>' . '<br>' .
    'ID Penempatan      : ' . $idBidang . '<br>' . '<br>' .
    'Penempatan Magang      : ' . $penempatan . '<br>' . '<br>' .
    'Asal Sekolah    : ' . $sekolah . '<br>' . '<br>' .
    ' <strong>Diharapkan kepada seluruh peserta untuk membawa kartu ini ketika akan melaksanakan program magang </strong>' . '<br>' .
    '</body></html>';


$pdf = new dompdf();
$pdf->load_html(html_entity_decode($html));

// untuk mengconvert ke PDF
$pdf->render();
ob_end_clean();
// menyimpan ke file pdf dan fungsi attachment agar bisa ditampilkan kedalam pdf apabila nilai nol(0)
$pdf->stream('Kartu.pdf', array("Attachemnt" => 0));
?>
