<?php
include '../koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}
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
                        <h1>Form Pendaftaran Pelanggan</h1>
                        <form id="form" action="../proses/inputpelanggan.php" method="POST" onKeyPress="return disableEnterKey(event)">
                            <table class="form-group">
                                <tr>
                                    <td><label>ID Pelanggan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" class="form-control" id="idpelku" name="id"   minlength="12" maxlength="12" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Nama Pelanggan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="nama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td colspan="5"><textarea id="alamat" name="alamat" onkeyup="this.value = this.value.toUpperCase()" class="form-control" required></textarea></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>No Handphone</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="notlp" type="text" name="notlp" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>No Meter </label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="meter_lama"type="text" name="lama" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Merk</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="merk" name="merk" type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" required></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Tahun</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="tahun" name="tahun" onkeyup="this.value = this.value.toUpperCase()" class="form-control" required>
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
                                    <td><label>Keterangan</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><select id="ket" onkeyup="this.value = this.value.toUpperCase()" type="text" name="ket" class="form-control" required>
                                            <OPTION value="" selected disabled>Jenis Meteran </OPTION>
                                            <option>PASCA</option>
                                            <OPTION>PRA</OPTION>
                                        </select>
                                    </td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Tanggal Pasang</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="tglpasang" type="date"  name="tgl" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <td><label>Tarif</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input id="tarif" type="text" onkeyup="this.value = this.value.toUpperCase()" name="tarif" class="form-control"></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><label>Daya</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="daya" type="text" onkeyup="this.value = this.value.toUpperCase()" name="daya" class="form-control"></td>
                                    <td> &nbsp;</td>
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
