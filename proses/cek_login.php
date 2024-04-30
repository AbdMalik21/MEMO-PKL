<?php
	
	include '../koneksi.php';

	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$data = mysqli_query ($conn,"SELECT * from petugas where idpet = '$username' and password = '$password'") or die (mysqli_error($query));
        while ($row = mysqli_fetch_array($data)) {
            $nama = $row['namapet'];
            $kode = $row['kodepanggilan'];
            $akses = $row['Akses'];
        }
	$cek = mysqli_num_rows($data);

	if ($cek > 0) 
	{
                $_SESSION['kode'] = $kode;
                $_SESSION['akses'] = $akses;
                $_SESSION['name'] = $nama;
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";

		header("location:../view/view_pelanggan.php?pesan=berhasil");
	}

	else
		header("location:../index.php?pesan=gagal");
?>