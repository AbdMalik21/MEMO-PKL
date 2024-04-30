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
                            <label>Cari Data Berdasar ID Pegawai</label>
                            <input id = "inputku" type="text" onkeyup="myFunction()" name="cari" class="form-control" placeholder="cari ">
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
                    <div class="col-md-4"><h3 >Data Pegawai</h3></div>
                    <div class="scrollku">
                        <table id="tabelku" class="table" border="1" >
                            <thead class="table-info">
                                <tr align="center" valign="bottom" >
                                    <th rowspan="2" >No.</th>
                                    <th rowspan="2" >ID</th>
                                    <th rowspan="2" >Nama</th>
                                    <th rowspan="2" >No Hp</th> 
                                    <th rowspan="2" >Divisi</th>
                                    <th rowspan="2" >Panggilan</th>
                                    <th rowspan="2" >Akses</th>
                                    <th rowspan="2" >Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                include '../script/tanggal.php';

                                $blank = "";

                                $no = 1;
                                $query = mysqli_query($conn, "SELECT * FROM petugas ORDER BY idpet");
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

                                        <td><a  ><?php
                                                $idpet = "'" . $data['idpet'];
                                                echo (string) $idpet;
                                                ?></a></td> 
                                        <td><a ><?php echo $data['namapet']; ?></a></td>
                                        <td><?php echo "'" . $data['notlppet']; ?></td> 
                                        <td><?php echo $data['divisi'] ?></td>
                                        <td><?php echo $data['kodepanggilan'] ?></td>
                                        <td><?php echo $data['Akses'] ?></td>
                                        <td><a href="view_edit_user.php?id=<?= $data['idpet'] ?>" class="btn btn-primary btn-sm active">Edit Data</a></td>
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
                        <a id='form_user' href="../view/form_user.php" style="color: white">Tambah User</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>