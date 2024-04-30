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
$merk = $_POST['merk'];
$tahun = $_POST['tahun'];
$tarif = $_POST['tarif'];
$daya = $_POST['daya'];
$ket = $_POST['ket'];
$tgl = $_POST['tgl'];
$keluhan = $_POST['keluhan'];
$ajukan = $_POST['ajukan'];
$ptgs = $_SESSION['username'];

$tanggal1 = format_indo($tgl);
$tanggal2 = format_indo($ajukan);

echo $ajukan;
echo $tanggal2;

$nama = addslashes($nama);
$query = mysqli_query($conn, "SELECT count(*) FROM pelanggan WHERE idpel = '$id'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into pelanggan VALUES ('$id','$nama','$alamat','$notlp')";
    $input = mysqli_query($conn, $query);
}

$query = mysqli_query($conn, "SELECT count(idmet) FROM meteran WHERE idmet = '$lama'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into meteran VALUES ('$lama','$id','$merk','$tahun','$ket','$tanggal1','')";
    $input = mysqli_query($conn, $query)or die(mysqli_error($conn));
}

$query = mysqli_query($conn, "SELECT count(*) FROM pengajuan WHERE idmet = '$lama' AND idpel = '$id'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    $query = "UPDATE pengajuan SET tglpengajuan = '$tanggal2' WHERE idmet = '$lama'";
    $input = mysqli_query($conn, $query);
} else {
    $query = "INSERT into pengajuan VALUES ('','$id','$ptgs','$lama','$keluhan','$tanggal2','0')";
    $input = mysqli_query($conn, $query);
}
header("location:../view/view_data.php");

?>
