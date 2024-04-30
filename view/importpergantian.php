<?php
include '../koneksi.php';
error_reporting(0);
session_start();

if (empty($_SESSION['username'])) {
    header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
    <head>
         <title>MEMO PLN</title>
        <?php
        include '../script/tanggalimport.php';
        include '../koneksi.php';
        ?>  <meta charset="utf-8">
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
        <?php include '../head.php'; ?>
    </head>
    <body>

        <div id="main" align="center" >
            <div class="container">
                <h3>Input Pergantian</h3>
                <div class="row">
                <!-- <div class="col-md-2"></div>     -->
                <div class="container col-md-4" >
                <table class="table" >
                    <!--form upload file-->
                    <form method="post" enctype="multipart/form-data" >
                        <tr>
                            <td><label class="form">Pilih File</label></td>
                        </tr>
                        <tr>
                            <td  ><input name="filemhsw" type="file" required="required"></td>
                        </tr>
                        <tr>
                            <td ><input name="upload" type="submit" value="Import"></td>
                        </tr>
                    </form>
                </table>
                </div>
                </div>
                <?php
                if (isset($_POST['upload'])) {

                    require('../plugin/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
                    require('../plugin/spreadsheet-reader-master/SpreadsheetReader.php');

                    //upload data excel kedalam folder uploads
                    $target_dir = "../uploads/" . basename($_FILES['filemhsw']['name']);

                    move_uploaded_file($_FILES['filemhsw']['tmp_name'], $target_dir);

                    $Reader = new SpreadsheetReader($target_dir);

                    foreach ($Reader as $Key => $Row) {
                        // import data excel mulai baris ke-2 (karena ada header pada baris 1)
                        if ($Key < 3)
                            continue; {


                            $tanggal1 = format_indo($Row[9]);
                            $tanggal2 = format_indo($Row[14]);

                            $Row[2] = addslashes($Row[2]);
                            $query = mysqli_query($conn, "SELECT count(idpel) FROM pelanggan WHERE idpel = '$Row[1]'");
                            list($cek) = mysqli_fetch_row($query);
                            if ($cek > 0) {
                                
                            } else {
                                $query = "INSERT into pelanggan VALUES ('$Row[1]','$Row[2]','$Row[3]','$Row[4]')";
                                $input = mysqli_query($conn, $query);
                            }

                            $query = mysqli_query($conn, "SELECT count(idmet) FROM meteran WHERE idmet = '$Row[5]'");
                            list($cek) = mysqli_fetch_row($query);
                            if ($cek > 0) {
                                $query = "UPDATE meteran SET tglbongkar = '$tanggal2' WHERE idmet = '$Row[5]'";
                                $input = mysqli_query($conn, $query);
                            } else {
                                $query = "INSERT into meteran VALUES ('$Row[5]','$Row[1]','$Row[6]','$Row[7]','$Row[8]','$tanggal1','$tanggal2')";
                                $input = mysqli_query($conn, $query)or die(mysqli_error($conn));
                            }

                            $query = mysqli_query($conn, "SELECT count(idmet) FROM meteran WHERE idmet = '$Row[10]'");
                            list($cek) = mysqli_fetch_row($query);
                            if ($cek > 0) {
                                
                            } else {
                                $query = "INSERT into meteran VALUES ('$Row[10]','$Row[1]','$Row[11]','$Row[12]','$Row[13]','$tanggal2','')";
                                $input = mysqli_query($conn, $query);
                            }

                            $query = mysqli_query($conn, "SELECT count(*) FROM pengajuan WHERE idmet = '$Row[5]' AND idpel = '$Row[1]'");
                            list($cek) = mysqli_fetch_row($query);
                            if ($cek > 0) {
                                
                            } else {
                                $query = "INSERT into pengajuan VALUES ('','$Row[1]','$Row[17]','$Row[5]','$Row[16]','','1')";
                                $input = mysqli_query($conn, $query);
                            }

                            $query = mysqli_query($conn, "SELECT count(*) FROM penggantian WHERE idmetlama = '$Row[5]' AND idpel = '$Row[1]' AND idmetbaru = '$Row[10]'");
                            list($cek) = mysqli_fetch_row($query);
                            if ($cek > 0) {
                                
                            } else {
                                $query = "INSERT into penggantian VALUES ('','$Row[1]','$Row[5]','$Row[10]','$tanggal2','$Row[17]','$Row[15]','$Row[16]')";
                                $input = mysqli_query($conn, $query);
                            }
                        }
                    }
                }
                ?>
            </div>
             <div class="container">
            <a class="btn btn-info" href="../FormatUpload.xlsx">Download Format Table</a>
        </div>
        </div>
       
    </body>
</html>
