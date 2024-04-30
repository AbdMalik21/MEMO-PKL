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
$lama = $_POST['meterlama'];
$baru = $_POST['meterbaru'];
$merklama = $_POST['merklama'];
$tahunlama = $_POST['tahunlama'];
$tariflama = $_POST['trflama'];
$dayalama = $_POST['dayalama'];
$ketlama = $_POST['ketlama'];
$merkbaru = $_POST['merkbaru'];
$tahunbaru = $_POST['tahunbaru'];
$tarifbaru = $_POST['trfbaru'];
$dayabaru = $_POST['dayabaru'];
$ketbaru = $_POST['ketbaru'];
$ptgs = $_POST['idpet'];
$tgllama = $_POST['tgllama'];
$tglbaru = $_POST['tglbaru'];
$keluhan = $_POST['keluhan'];
$sisa = $_POST['standlama'];

echo "$ketlama + $ketbaru + $merklama + $merklama + $tariflama + $tarifbaru + $tahunlama + $tahunbaru + $ketlama + $ketbaru" ;

$nama = addslashes($nama);
$query = mysqli_query($conn, "SELECT count(idpel) FROM pelanggan WHERE idpel = '$id'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into pelanggan VALUES ('$id','$nama','$alamat','$notlp')";
    $input = mysqli_query($conn, $query);
}

$query = mysqli_query($conn, "SELECT count(idmet) FROM meteran WHERE idmet = '$lama'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    $query = "UPDATE meteran SET tglbongkar = '$tglbaru' WHERE idmet = '$lama'";
    $input = mysqli_query($conn, $query);
} else {
    $query = "INSERT into meteran VALUES ('$lama','$id','$merklama','$tahunlama','$tariflama','$dayalama','$ketlama','$tgllama','$tglbaru')";
    $input = mysqli_query($conn, $query)or die(mysqli_error($conn));
}

$query = mysqli_query($conn, "SELECT count(idmet) FROM meteran WHERE idmet = '$baru'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into meteran VALUES ('$baru','$id','$merkbaru','$tahunbaru','$tarifbaru','$dayabaru','$ketbaru','$tglbaru','')";
    $input = mysqli_query($conn, $query);
}

$query = mysqli_query($conn, "SELECT count(*) FROM pengajuan WHERE idmet = '$lama' AND idpel = '$id'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into pengajuan VALUES ('','$id','$ptgs','$lama','$keluhan','$tglbaru','1')";
    $input = mysqli_query($conn, $query);
}

$query = mysqli_query($conn, "SELECT count(*) FROM penggantian WHERE idmetlama = '$lama' AND idpel = '$id' AND idmetbaru = '$baru'");
list($cek) = mysqli_fetch_row($query);
if ($cek > 0) {
    
} else {
    $query = "INSERT into penggantian VALUES ('','$id','$lama','$baru','$tglbaru','$ptgs','$sisa','$keluhan')";
    $input = mysqli_query($conn, $query);
}
header("location:../view/view_pelanggan.php");
////////////////////////////////////////////