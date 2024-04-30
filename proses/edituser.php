<?php
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$notlp = $_POST['notlp'];
$div = $_POST['div'];
$kode = $_POST['kode'];
$pass = $_POST['pass'];
$akses = $_POST['akses'];

$nama = addslashes($nama);

$query = "UPDATE petugas SET namapet = '$nama', notlppet = '$notlp', divisi = '$div', kodepanggilan = '$kode', password = '$pass', Akses = '$akses' WHERE idpet = '$id'";
$input = mysqli_query($conn, $query);
header("location:../view/view_user.php");
?>
