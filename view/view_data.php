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
                height: 450px;
                /*margin: 30px 30px 30px 30px;*/
                /*padding  :20px 20px 20px 20px; */

                overflow-y: auto;
                overflow-x: scroll;
            }
            a{
                color: black;
            }
        </style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <!-- Head Navbar -->
        <?php include '../head.php'; ?>
    </head>
    <body> 
        <div id="main">
            <div class="ml-5 mr-5">
                <div >
                    <div class="col">
                        <div class="form-group col-md-4 mt-3" >
                            <label>Cari Data</label>
                            <input id = "inputku" type="text" onkeyup="myFunction()" name="cari" class="form-control" placeholder="cari ">
                        </div>
                        <div class="col-md-12">
                            <h3 align="center">Monitoring Keluhan Pelanggan</h3>
                            <div class="col-md-12  scrollku">
                                <table id="tabelku" class="table" align="center">
                                    <thead class="table-info">
                                        <tr>
                                            <th scope="col" align="center">No.</th>
                                            <th scope="col" align="center">ID</th>
                                            <th scope="col" align="center">Nama</th>
                                            <th scope="col" align="center">Alamat</th>
                                            <th scope="col" align="center">Keluhan</th>
                                            <th scope="col" align="center">No.Meter</th>
                                            <th scope="col" align="center">Tgl Pengajuan</th>
                                            <th scope="col" align="center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';

                                        $query = mysqli_query($conn, "SELECT * from pengajuan j, pelanggan p where j.idpel = p.idpel AND j.atasi = 0");

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
                                                <td><?php echo "'" . $data['idpel']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['keluhan']; ?></td>
                                                <td><?php echo $data['idmet']; ?></td>
                                                <td><?php echo $data['tglpengajuan']; ?></td>
                                                        <!-- <a href="form_edit.php?id=<?= $data['id']; ?>">Edit</a> -->
                                                <td><a href="form_pergantian.php?id=<?= $data['idpel'] ?>" class="btn btn-primary btn-sm active">Ganti Meter</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php
                            echo "Total: " . $total;
                            ?>

                            <?php include '../script/script_view_data.php'; ?>
                            <br>

                            <br>
                            <button id="eksport"type="submit" name="submit" class="btn btn-info" >
                                <!-- <a href="ekspor.php" style="color: white"></a> -->
                                Eksport Excel
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>