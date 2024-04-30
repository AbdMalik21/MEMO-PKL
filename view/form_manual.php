<?php
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MEMO PLN</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"> 
        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <!-- Head Navbar -->
    </head>
    <body>
        <?php include '../head.php'; ?>
        <div id="main">
            <div style="margin-left:5%;margin-right: 5%;padding:1px 16px;">
                <div class="ml-5 mr-5">
                    <div class="mb-3">
                        <h1>Input Data Manual</h1>
                    </div>
                    <form id="form" action="../proses/inputmanual.php" method="POST" onKeyPress="return disableEnterKey(event)">
                        <div align="">
                            <table class="form-group">
                                <tr>
                                    <td><label>ID Pelanggan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="idpelku" placeholder="5210xxxxxxx" minlength="12" maxlength="12" name="id" required></td>
                                    <td colspan="4"></td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td><label>ID Petugas</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" value="<?= $_SESSION['username'] ?>" id="idpet" placeholder="xxxxxxx" name="idpet" readonly></td>
                                    <td colspan="4"></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Nama Pelanggan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><input id="nama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7"></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><textarea id="alamat" onkeyup="this.value = this.value.toUpperCase()" name="alamat" class="form-control" placeholder="Alamat Meter" required></textarea></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>No Handphone</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="notlp" onkeyup="this.value = this.value.toUpperCase()" type="text" name="notlp" class="form-control" placeholder="Nomor yang dapat dihubungi" required></td>
                                    <td colspan="4"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7"></td>
                                </tr>

                                <tr>
                                    <td colspan="7" ><h4>Meter Lama</h4></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7" ><h4>Meter Baru</h4></td>
                                </tr>
                               
                                <tr>
                                    <td><label>No Meter Lama</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_lama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="meterlama" class="form-control" placeholder="Nomor meter yang diganti" required></td>
                                    <td colspan="4"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>No Meter Baru</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_baru" onkeyup="this.value = this.value.toUpperCase()" type="text" name="meterbaru" class="form-control" placeholder="Nomor meter pengganti" required></td>
                                    <td colspan="4"></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Tahun</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="tahun_lama" name="tahunlama" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Tahun keluaran meteran">
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
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Merk</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="merk_lama" name="merklama" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Tahun</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="tahun_baru" onkeyup="this.value = this.value.toUpperCase()" name="tahunbaru" class="form-control" placeholder="Tahun keluaran meteran">
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
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Merk</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="merk_baru" name="merkbaru" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control" required></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Keterangan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><select id="ket_lama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="ketlama" class="form-control" placeholder="PRA/PASCA">
                                            <OPTION value="" selected disabled>Jenis Meteran </OPTION>
                                            <option>PASCA</option>
                                            <OPTION>PRA</OPTION>
                                        </select>
                                    </td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Tanggal Pasang</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="date" name="tgllama" class="form-control" placeholder="Tanggal dibongkar yang lama" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Keterangan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><select id="ket_baru" onkeyup="this.value = this.value.toUpperCase()" type="text" name="ketbaru" class="form-control" placeholder="PRA/PASCA">
                                            <OPTION value="" selected disabled>Jenis Meteran </OPTION>
                                            <option>PASCA</option>
                                            <OPTION>PRA</OPTION>
                                        </select>
                                    </td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Tanggal Pasang</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="date" name="tglbaru" class="form-control" placeholder="Tanggal dipasang yang baru" required></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Tarif</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" name="trflama" class="form-control" placeholder="Tarif Meter"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Daya</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="text" name="dayalama" class="form-control" placeholder="Daya Meter"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Tarif</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" name="trfbaru" class="form-control" placeholder="Tarif Meter"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Daya</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input type="text" name="dayabaru" class="form-control" placeholder="Daya Meter"></td>
                                    <td> &nbsp;</td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Stand</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="stand_lama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="standlama" class="form-control" placeholder="Stand/Pulsa terakhir" required></td>
                                    <td colspan="4"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7"></td>
                                </tr>
                                 <td><label>     </label></td>
                                <tr>
                                    <td><label>Alasan</label></td>
                                    <td> &nbsp;:&nbsp;</td>                              
                                    <td colspan="5"><textarea id="keluhan" onkeyup="this.value = this.value.toUpperCase()" type="text" name="keluhan" class="form-control" placeholder="Alasan pergantian" required ></textarea></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="7"></td>
                                </tr>
                            </table>
                        </div>
                        <button id="btn" type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">import data </button>
                    </form>


                </div>
            </div>


            <?php include '../modal/modal_input.php' ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script language="JavaScript">
                                        function disableEnterKey(e)
                                        {
                                            var key;
                                            if (window.event)
                                                key = window.event.keyCode; //IE
                                            else
                                                key = e.which; //firefox
                                            if (key == 13)
                                                return false;
                                            else
                                                return true;
                                        }
            </script>
            <script>
                $(function () {
                    $("#idpelku").change(function () {
                        var idpel = $("#idpelku").val();

                        $.ajax({
                            url: '../proses/prosesmanual.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                'idpel': idpel// dalam petik untuk ke proses.php  
                            },
                            success: function (pelanggan) {
                                $("#nama").val(pelanggan['nama']);
                                $("#alamat").val(pelanggan['alamat']);
                                $("#notlp").val(pelanggan['notlp']);
                                $("#meter_lama").val(pelanggan['idmet']);
                                $("#merk_lama").val(pelanggan['merk']);
                                $("#tahun_lama").val(pelanggan['tahun']);
                                $("#ket_lama").val(pelanggan['keterangan']);
                            }
                        });
                    });
                });
            </script>


    </body>
</html>