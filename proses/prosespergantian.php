<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT j.idpel, j.idmet, p.nama, p.alamat, p.notlp, j.keluhan from pengajuan j, pelanggan p WHERE j.idpel = p.idpel AND j.idpel='".mysqli_escape_string($conn, $_POST['idpel'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);