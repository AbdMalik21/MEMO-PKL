<?php
include '../koneksi.php';

$id = $_GET['id'];
echo "$id";
$query = "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = '$id' AND m.idpel = p.idpel ORDER BY m.tglpasang";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    $nama = $row["nama"];
    $alamat = $row["alamat"];
    $notlp = $row["notlp"];
    $nometer = $row["idmet"];
}
// $tgl=date('Y-m-d');
include '../script/tanggal.php';
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">

            <h4 class="modal-title">Detail Data Meteran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>

        <div class="modal-body">
            <div align="center"><h3 class="control-label">Laporan Data Meteran</h3></div>

            <table >
                <tr>
                    <td>ID Pelanggan </td>
                    <td> &nbsp;:&nbsp;</td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td> &nbsp;:&nbsp;</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td> &nbsp;:&nbsp;</td>
                    <td><?php echo $alamat; ?></td>
                </tr>
                <tr>
                    <td>No Handphone </td>
                    <td> &nbsp;:&nbsp;</td>
                    <td><?php echo $notlp; ?></td>
                </tr>
                <tr>
                    <td>No Meter Sekarang </td>
                    <td> &nbsp;:&nbsp;</td>
                    <td><?php echo $nometer; ?></td>
                </tr>


            </table>
            <br>      
            <table id='tabelku' width='100%' >
                <thead class="table" align="center">
                    <tr>
                        <th scope="col" >No.</th>
                        <th scope="col" >Tanggal Pasang</th>
                        <th scope="col" >No Meter</th>
                        <th scope="col" >Merk</th>
                        <th scope="col" >Tahun</th>
                        <th scope="col" >Tarif</th>
                        <th scope="col" >Daya</th>
                        <th scope="col" >Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';

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
                            <td><?= $bil ?></td>
                            <td><?php echo format_indo($data['tglpasang']) . '<br>'; ?></td>
                            <td><?php echo $data['idmet']; ?></td>
                            <td><?php echo $data['merk']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
                            <td><?php echo $data['Tarif']; ?></td>
                            <td><?php echo $data['Daya']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <?php
                    }
                          ?>
                        </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Ok</button>
            </div>
            <a href="../script/print.php?id=<?= $id; ?>">print</a>
        </div>
    </div>
