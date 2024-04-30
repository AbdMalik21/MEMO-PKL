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
                        <h1>Form User</h1>
                        <form id="form" action="../proses/inputuser.php" method="POST" onKeyPress="return disableEnterKey(event)">
                            <table class="form-group">
                                <tr>
                                    <td><label>ID Pegawai</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="id" name="id" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Nama Pegawai</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="nama" onkeyup="this.value = this.value.toUpperCase()" type="text" name="nama" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
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
                                    <td><label>Divisi</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="div" onkeyup="this.value = this.value.toUpperCase()" type="text" name="div" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Nama Panggilan</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input id="kode" onkeyup="this.value = this.value.toUpperCase()" type="text" name="kode" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Password</label></td>
                                    <td> &nbsp;:&nbsp;</td>
                                    <td><input id="pass" type="text" name="pass" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                                <td><label>     </label></td>
                                <tr>
                                    <td><label>Akses</label></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><input id="akses" type="text" name="akses" class="form-control" required></td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td colspan="3"></td>
                                </tr>
                            </table>
                            <button id="btn" type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

