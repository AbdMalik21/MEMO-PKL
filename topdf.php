<?php

$id = $_GET['id'];
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(190, 7, 'PLN Rayon Kota Yogyakarta', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'Daftar Keluhan', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
//$pdf->Cell(40,10,''.$id);

//$pdf->SetFont('Arial', 'B', 10);
//$pdf->Cell(20, 6, 'ID', 1, 0);
//$pdf->Cell(85, 6, 'NAMA', 1, 0);
//$pdf->Cell(27, 6, 'ALAMAT', 1, 0);
//$pdf->Cell(25, 6, 'KELUHAN', 1, 1);

$pdf->SetFont('Arial', '', 10);
$attr = array('titleFontSize' => 18, 'titleText' => 'First Example Title.');
include 'koneksi.php';
 $query = "SELECT * FROM meteran m , pelanggan p ,merk k WHERE m.id_pelanggan = '$id' AND  m.id_pelanggan = p.idpel AND k.idmerk = m.idmerk AND m.tanggal IN (SELECT MAX(m.tanggal) FROM meteran  m GROUP BY m.id_pelanggan)"; 
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    
    $pdf->Cell(20, 6, $row['nama'], 1, 0);
    $pdf->Cell(20, 6, $row['alamat'], 1, 0);
    $pdf->Cell(20, 6, $row['kriteria'], 1, 0);
    $pdf->Cell(85, 6, $row['notlp'], 1, 0);
    $pdf->Cell(27, 6, $row['tanggal_ajuan'], 1, 1);
    $pdf->Cell(85, 6, $row['kriteria'], 1, 0);
    $pdf->Cell(27, 6, $row['keterangan'], 1, 0);
    $pdf->Cell(27, 6, $row['namaptg'], 1, 0);
    $pdf->Cell(25, 6, $row['tanggal_ajuan'], 1, 1);
}

$pdf->Output();
?>
