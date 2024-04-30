<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT m.idpel, m.idmet, p.nama, p.alamat, p.notlp, m.merk, m.tahun, m.keterangan, m.tarif, m.daya, m.tglpasang "
        . "from meteran m, pelanggan p "
        . "WHERE m.idpel = p.idpel AND p.idpel='".mysqli_escape_string($conn, $_POST['idpel'])."' "
        . "ORDER BY m.tglpasang DESC");
$data = mysqli_fetch_array($query);

echo json_encode($data);
