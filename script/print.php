<?php ob_start(); ?>
<html>
    <head>
        <title>Cetak PDF</title>
        <style>
            table {
                border-collapse:collapse; 
                table-layout:fixed;width: 630px;
            }
            table td {
                word-wrap:break-word;
                width: 25%;
            }
            .td1{
                word-wrap:break-word;
                width: 30px;
            }
            .td2{
                word-wrap:break-word;
                width: 40px;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">Data Laporan</h1>
        <table width="100%" >
            <?php
// Load file koneksi.php
            include "../koneksi.php";
            $id = $_GET['id'];
            $query = "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = '$id' AND m.idpel = p.idpel ORDER BY m.tglpasang ";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                $nama = $row["nama"];
                $alamat = $row["alamat"];
                $notlp = $row["notlp"];
                $nometer = $row["idmet"];
            }
            $tgl = date('Y-m-d');
            ?>

            <tr>
                <td>ID Pelanggan </td>
                <td class="td1"> &nbsp;:&nbsp;</td>
                <td><?php echo $id; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td  class="td1"> &nbsp;:&nbsp;</td>
                <td><?php echo $nama; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td  class="td1"> &nbsp;:&nbsp;</td>
                <td ><?php echo $alamat; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No Handphone </td>
                <td class="td1"> &nbsp;:&nbsp;</td>
                <td><?php echo $notlp; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No Meter Sekarang </td>
                <td  class="td1"> &nbsp;:&nbsp;</td>
                <td><?php echo $nometer; ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>      
        <table id='tabelku' border="1">
            <thead class="table" align="center">
                <tr>
                    <th class="td1">No.</th>
                    <th >Tanggal Pasang</th>
                    <th >No Meter</th>
                    <th >Merk</th>
                    <th class="td2">Tahun</th>
                    <th class="td2">Tarif</th>
                    <th class="td2">Daya</th>
                    <th class="td2">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                include 'tanggal.php';
                $query = mysqli_query($conn, "SELECT * from meteran where idpel = '$id' ORDER BY tglpasang DESC");

                $bil = 0;
                $i = 0;
                $total = 0;
                while ($data = mysqli_fetch_array($query)) {
                    $bil = $bil + 1;
                    $i++;
                    $total = $total + 1;
                    ?>

                    <tr>
                        <td width="20px"><?= $bil ?></td>
                        <td ><?php echo format_indo($data['tglpasang']) . '<br>'; ?></td>
                        <td ><?php echo $data['idmet']; ?></td>
                        <td ><?php echo $data['merk']; ?></td>
                        <td width="30px"><?php echo $data['tahun']; ?></td>
                        <td width="30px"><?php echo $data['Tarif']; ?></td>
                        <td width="30px"><?php echo $data['Daya']; ?></td>
                        <td width="30px"><?php echo $data['keterangan']; ?></td>

                    </tr>
                    <?php
                }
                ?>

            </tbody>   
        </table>

    </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('../plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pelanggan.pdf', 'D');
?>