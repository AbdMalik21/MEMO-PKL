<?php
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}

$idpel = $_GET['id'];

$query = mysqli_query($conn, "SELECT j.idpel, j.idmet, p.nama, p.alamat, p.notlp, j.keluhan from pengajuan j, pelanggan p WHERE j.idpel = p.idpel AND j.idpel='$idpel' ORDER BY j.nopengajuan DESC");
$data = mysqli_fetch_array($query);

$idmet = $data['idmet'];
$nama = $data['nama'];
$alamat = $data['alamat'];
$notlp = $data['notlp'];
$keluhan = $data['keluhan'];
?>
<html>
    <head>
        <title>MEMO PLN</title>
        <!-- <link rel="stylesheet" href="style.css"> -->
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"> 
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
            .scrollku{

                width: 110%;
                height: 600px;
                /*margin: 30px 30px 30px 30px;*/
                /*padding  :20px 20px 20px 20px; */

                overflow-y: auto;
                overflow-x: scroll;
            }
        </style>
    </head>
    <body>
        <?php include '../head.php'; ?>
        <div id="main">
            <div class="ml-5 mr-5">

                <div class="row">
                    <div class="col-md-8">
                        <h1>Form Pergantian Meter</h1>
                        <hr>
                        <!-- <br> -->
                        <form id="form" action="../proses/inputpergantian.php" method="POST" onKeyPress="return disableEnterKey(event)">
                            <table class="form-group">
                                <tr>
                                    <td><label>ID Petugas</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="text" name="petugas"  class="form-control" value="<?= $_SESSION['username'] ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>ID Pelanggan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" class="form-control" id="idpelku" value="<?= $idpel ?>""  minlength="10" maxlength="12" name="id"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>Nama Pelanggan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><input id="nama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama" class="form-control" value="<?= $nama ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>No Handphone</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input id="notlp" type="text" name="notlp" class="form-control" value="<?= $notlp ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><textarea id="alamat" onkeyup="this.value = this.value.toUpperCase()"  name="alamat" class="form-control" value="<?= $alamat ?>" readonly><?= $alamat ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>No Meter Lama</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_lama" type="text"  name="lama" class="form-control" value="<?= $idmet ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>No Meter Baru</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_baru" type="text" name="baru" class="form-control" placeholder="Nomor meter pengganti" required></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>Sisa Listrik</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="text" name="sisa" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Stand/Pulsa Terakhir"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Merk</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="merk_baru" name="merkbaru" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Tahun</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="tahun_baru" name="tahunbaru" class="form-control" placeholder="Tahun keluaran meter" required>
                                            <option value="" selected disabled>Tahun</option>
                                            <?php
                                            $mulai = date('Y') - 50;
                                            for ($i = $mulai; $i < $mulai + 100; $i++) {
                                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                <tr>
                                    <td><label>Tanggal Pasang/Bongkar</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="date" name="tgl" class="form-control" placeholder="Tanggal dibongkar yang lama/dipasang yang baru" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Keterangan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="ket_baru" type="text" name="ketbaru" class="form-control" placeholder="PRA/PASCA" required>
                                            <OPTION value="" selected disabled>Jenis Meteran </OPTION>
                                            <option>PASCA</option>
                                            <OPTION>PRA</OPTION>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                                
                                <tr>
                                    <td><label>Tarif</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" name="tarif" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Tarif Meter"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Daya</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="text" name="daya" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Daya Meter"></td>
                                    <td> &nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label>Alasan</label></td>
                                    <td> &nbsp;:&nbsp;</td>                              
                                    <td colspan="5"><textarea id="keluhan" type="text" name="keluhan" class="form-control" readonly><?= $keluhan ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label>     </label></td>
                                </tr>
                            </table>
                            <button id="btn" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>   
                </div>
            </div>
        </div>
        <?php include '../script/script_form_pergantian.php' ?>
    </body>
</html>