<?php

include '../script/tanggalimport.php';
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$notlp = $_POST['notlp'];
$lama = $_POST['lama'];
$baru = $_POST['baru'];
$merk = $_POST['merkbaru'];
$tahun = $_POST['tahunbaru'];
$tarif = $_POST['tarif'];
$daya = $_POST['daya'];
$ket = $_POST['ketbaru'];
$ptgs = $_POST['petugas'];
$tgl = $_POST['tgl'];
$keluhan = $_POST['keluhan'];
$sisa = $_POST['sisa'];

echo $baru;
echo $merk;
echo $ket;
echo $tahun;

$tanggal1 = format_indo($tgl);

echo $tgl;

$query = mysqli_query($conn, "SELECT count(*) FROM pengajuan WHERE idmet = '$lama' AND idpel = '$id' AND atasi = 0");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    $query = mysqli_query($conn, "SELECT count(*) FROM meteran WHERE idmet = '$baru'");
    list($ceklagi) = mysqli_fetch_row($query);
    if ($ceklagi > 0) {
        
    } else {
        $query = "INSERT into meteran VALUES ('$baru','$id','$merk','$tahun','$tarif','$daya','$ket','$tgl','')";
        $input = mysqli_query($conn, $query);
    }
    
    $query = "UPDATE meteran SET tglbongkar = '$tgl' WHERE idmet = '$lama'";
    $input = mysqli_query($conn, $query);
    
    $query = "UPDATE pengajuan SET atasi = '1' WHERE idmet = '$lama' AND idpel = '$id'";
    $input = mysqli_query($conn, $query);
    
    $query = "INSERT into penggantian VALUES ('','$id','$lama','$baru','$tgl','$ptgs','$sisa','$keluhan')";
    $input = mysqli_query($conn, $query);

    header("location:../view/view_pelanggan.php");
    
} else {
    echo "<script>alert('Belum mengajukan keluhan!');history.go(-1);</script>";
    header("location:../view/view_pelanggan.php");
}
?>
