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
$ptgs = $_SESSION['username'];

$tanggal1 = format_indo($tgl);

$nama = addslashes($nama);

$query = "INSERT into pelanggan VALUES ('$id','$nama','$alamat','$notlp')";
$input = mysqli_query($conn, $query);


$query = "INSERT into meteran VALUES ('$lama','$id','$merk','$tahun','$tarif','$daya','$ket','$tgl','')";
$input = mysqli_query($conn, $query)or die(mysqli_error($conn));

header("location:../view/view_data_sekarang.php")

?>

