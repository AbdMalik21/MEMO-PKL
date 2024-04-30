<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "pln";

	$conn = new mysqli ($hostname,$username,$password,$database);

	if ($conn -> connect_error) 
	{
		die('Maaf koneksi gagal: '. $connect->connect_error);
	}
?>