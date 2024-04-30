<?php
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}
if(empty($_GET['id'])){
    $id = NULL;
}
else{
    $id = $_GET['id'];
}

$query = mysqli_query($conn, "SELECT m.idpel, m.idmet, p.nama, p.alamat, p.notlp, m.merk, m.tahun, m.keterangan, m.tarif, m.daya, m.tglpasang "
        . "from meteran m, pelanggan p "
        . "WHERE m.idpel = p.idpel AND p.idpel='$id' "
        . "ORDER BY m.tglpasang DESC");
$data = mysqli_fetch_array($query);

$idpel = $id;
$idmet = $data['idmet'];
$nama = $data['nama'];
$alamat = $data['alamat'];
$notlp = $data['notlp'];
$merk = $data['merk'];
$tahun = $data['tahun'];
$ket = $data['keterangan'];
$tglpasang = $data['tglpasang'];
$tarif = $data['tarif'];
$daya = $data['daya'];

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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <!-- Head Navbar -->
        <?php include '../head.php'; ?>

        <style type="text/css">
            th {
                font-size: 15px;
            }
            td {
                font-size: 12px;
            }
            .scrollku{

                width: 110%;
                height: 700px;
                /*margin: 30px 30px 30px 30px;*/
                /*padding  :20px 20px 20px 20px; */

                overflow-y: auto;
                overflow-x: scroll;
            }
            a{
                color: black;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div class="ml-5 mr-5" >

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-md-6 mt-5">
                        <h1>Form Pengajuan Keluhan</h1>
                        <form id="form" action="../proses/inputpengajuan.php" method="POST" onKeyPress="return disableEnterKey(event)">
                            <table class="form-group">
                                <tr>
                                    <td><label>ID Pelanggan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" class="form-control" id="idpelku" value="<?= $idpel ?>" name="id"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Nama Pelanggan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="nama" type="text" name="nama" class="form-control" value="<?= $nama ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><textarea id="alamat" name="alamat" class="form-control" value="<?= $alamat ?> readonly"><?= $alamat ?></textarea></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>No Handphone</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="notlp" type="text" name="notlp" class="form-control" value="<?= $notlp ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>No Meter Lama</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_lama"type="text" name="lama" class="form-control" value="<?= $idmet ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Merk</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="merk"type="text" name="merk" class="form-control" value="<?= $merk ?>" readonly></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Tahun</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="tahun" type="text" name="tahun" class="form-control" value="<?= $tahun ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Keterangan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="ket" type="text" name="ket" class="form-control" value="<?= $ket ?>" readonly></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Tanggal Pasang</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="tglpasang" type="date" name="tgl" class="form-control" value="<?= $tglpasang ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td><label>Tarif</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input id="tarif" type="text" name="trflama" class="form-control" value="<?= $tarif ?>" readonly></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Daya</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="daya" type="text" name="dayalama" class="form-control" value="<?= $daya ?>" readonly></td>
                                    <td> &nbsp;</td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Alasan</label></td>
                                    <td> &nbsp;:&nbsp;</td>                              
                                    <td colspan="5"><textarea id="keluhan" type="text" onkeyup="this.value = this.value.toUpperCase()" name="keluhan" class="form-control" placeholder="Keluhan yang diajukan"></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="ajukan" value="<?php echo date('d-M-y'); ?>"></td>
                                </tr>
                            </table>
                            <button id="btn" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>      
                </div>
            </div>
        </div>


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
                        url: '../proses/prosespengajuan.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'idpel': idpel// dalam petik untuk ke proses.php  
                        },
                        success: function (pelanggan) {
                            $("#meter_lama").val(pelanggan['idmet']);
                            $("#nama").val(pelanggan['nama']);
                            $("#alamat").val(pelanggan['alamat']);
                            $("#notlp").val(pelanggan['notlp']);
                            $("#merk").val(pelanggan['merk']);
                            $("#tahun").val(pelanggan['tahun']);
                            $("#ket").val(pelanggan['keterangan']);
                            $("#tglpasang").val(pelanggan['tglpasang']);
                            $("#tarif").val(pelanggan['tarif']);
                            $("#daya").val(pelanggan['daya']);
                        }
                    });
                });
            });
        </script>
        <script>
            //////////////search data
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("idpelku");
                filter = input.value.toUpperCase();
                table = document.getElementById("tabel_modal");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];//search sesuai array ke 1
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </body>
</html>