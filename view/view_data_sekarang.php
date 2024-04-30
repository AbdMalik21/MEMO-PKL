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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <style type="text/css">

            th {
                font-size: 15px;
            }
            td {
                font-size: 12px;
            }
            .scrollku{

                width: 110%;
                height: 430px;
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
        <?php include '../head.php'; ?>
        <div id="main">
            <div class="col-md-2"></div>
            <div class="col-md-8 ml-5 mr-5">


                <form action="" method="post">
                    <div class="col-md-4">

                        <fieldset>
                            <legend></legend>
                            <label>Cari Data Berdasar ID Pelanggan</label>
                            <input id = "inputku" type="text" onkeyup="myFunction()" name="cari" class="form-control" placeholder="cari ">
                            <label>Cari Data Berdasarkan Meteran</label>
                            <input id = "inputku1" type="text" onkeyup="myFunction2()" name="cari" class="form-control" placeholder="cari ">
                        </fieldset>
                    </div>
                    

                    <div class="col-md-1">

                        <div class="row">
                            <fieldset>
                                <br><br>
                                <div class="col-md-2"></div>
                                <div class="col-md-2 mt-2">
                                    <input type="image" src="../image/reload1.png" width="30" height="30" name="reload" onClick="document.location.reload(true)" value="reload" input type="submit" >
                                </div>     </fieldset>
                        </div>
                    </div>
                </form>                
            </div>
            <!-- bawah -->


            <div class="col-md-2"></div>
            <div class="col-md-12">
                <!-- <h3 align="center">Informasi Data</h3> -->
                <div class="col-md-11">
                    <div class="col-md-4"><h3 >Data Pelanggan</h3></div>
                    <div class="scrollku">
                        <table id="tabelku" class="table" border="1" >
                            <thead class="table-info">
                                <tr align="center" valign="bottom" >
                                    <th rowspan="2" >No.</th>
                                    <th rowspan="2" >ID</th>
                                    <th rowspan="2" >Nama</th>
                                    <th rowspan="2" >Alamat </th>
                                    <th rowspan="2" >No Hp</th> 
                                    <th rowspan="2" >Tgl Pasang</th>
                                    <th rowspan="2" >Merk</th>
                                    <th rowspan="2" >Tahun </th>
                                    <th rowspan="2" >Keterangan </th>
                                    <th rowspan="2" >ID Meter</th> 
                                    <th rowspan="2" >Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                include '../script/tanggal.php';

                                $blank = "";
                                if (isset($_POST["tampilkan"])) {

                                    $dt1 = $_POST["tgl1"];
                                    $dt2 = $_POST["tgl2"];

                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = p.idpel AND m.tglpasang IN (SELECT MAX(tglpasang) FROM meteran GROUP BY idpel) ORDER BY tglpasang DESC");
                                } else if (isset($_POST["tampilkun"])) {

                                    $bulan = $_POST['bulan'];
                                    $tahun = $_POST['tahun'];
                                    $query = mysqli_query($conn, "SELECT * FROM meteran m, pelanggan p WHERE (month(g.tglpergantian)='$bulan' and year(g.tglpergantian) = '$tahun') AND m.idpel = p.idpel AND m.tglpasang IN (SELECT MAX(tglpasang) FROM meteran GROUP BY idpel ORDER BY tglpasang DESC");
                                } else if (isset($_POST["reload"])) {
                                    $query = mysqli_query($conn, "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = p.idpel AND m.tglpasang IN (SELECT MAX(tglpasang) FROM meteran GROUP BY idpel) ORDER BY tglpasang DESC");
                                } else {
                                    $query = mysqli_query($conn, "SELECT * FROM meteran m, pelanggan p WHERE m.idpel = p.idpel AND m.tglpasang IN (SELECT MAX(tglpasang) FROM meteran GROUP BY idpel) ORDER BY tglpasang DESC ");
                                }
                                // SELECT * FROM meteran m , pelanggan p , merk k  WHERE k.idmeter = m.idmerk AND m.id_pelanggan = p.idpel  AND m.tanggal_pasang IN (SELECT MAX(m.tanggal_pasang) FROM meteran  m GROUP BY m.id_pelanggan)
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

                                        <td><a id='edit_data' data-toggle='modal' data-target='#modal_data' href="../modal/modal_pasang.php?id=<?= $data['idpel']; ?>"><?php
                                $idpel = "'" . $data['idpel'];
                                echo (string) $idpel;
                                    ?></a></td> 
                                        <td><a id='edit_data' data-toggle='modal' data-target='#modal_data' href="../modal/modal_pasang.php?id=<?= $data['idpel']; ?>"><?php echo $data['nama']; ?></a></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo "'" . $data['notlp']; ?></td> 

                                        <td><?php echo format_indo($data['tglpasang']) . '<br>'; ?></td>

                                        <td><?php echo $data['merk'] ?></td>
                                        <td><?php echo $data['tahun'] ?></td>
                                        <td><?php echo $data['keterangan'] ?></td>
                                        <td><?php echo $data['idmet'] ?></td>
                                        <td><a href="form_pengajuan.php?id=<?= $data['idpel'] ?>" class="btn btn-primary btn-sm active">Ajukan Keluhan</a></td>
                                        <?php
                                    }
                                    ?>
                                </tr>


                            </tbody>
                        </table>

                    </div>

                    <?php
                    echo "Total: " . $total;
                    ?>
                    <?php include '../script/script_pelanggan.php'; ?>
                    <br>
                    <br>
                    <button id="eksport" type="submit" name="submit" class="btn btn-info" >
                        <!-- <a href="ekspor.php" style="color: white"></a> -->
                        Eksport Excel
                    </button>
                    <!-- <button type="submit" name="submit" class="btn btn-info" >
                        <a href="print2.php" style="color: white">Export PDF</a>
                    </button> -->
                    <button type="submit" name="submit" class="btn btn-info" >
                        <a id='tambah_data' href="../view/form_pelanggan.php" style="color: white">Tambah Data</a>
                    </button>
                </div>
            </div>
        </div>
  
</body>
</html>