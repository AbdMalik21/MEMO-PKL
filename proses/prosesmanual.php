<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = '".mysqli_escape_string($conn, $_POST['idpel'])."' AND  m.idpel = p.idpel AND m.tglpasang IN (SELECT MAX(tglpasang) FROM meteran GROUP BY idpel)");
$data = mysqli_fetch_array($query);

echo json_encode($data);

