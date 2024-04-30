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

        <title>DATA</title>
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
                            <label>Cari Data Berdasar ID Pelanggan :</label>
                            <input id = "inputku" type="text" onkeyup="myFunction()" name="cari" class="form-control" placeholder="cari ">
                            <label>Cari Data Berdasarkan Meteran</label>
                            <input id = "inputku1" type="text" onkeyup="myFunction1()" name="cari" class="form-control" placeholder="cari ">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <legend></legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Cari per-tanggal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input  class="form-control " type="date" name="tgl1">
                                </div>
                                <div class="col-md-5"> 
                                    <input  class="form-control " type="date" name="tgl2">
                                </div>
                                <div class="col-md-2"> 
                                    <input  class="btn btn-info " type="submit" name="tampilkan" value="cari">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Cari per-bulan</label> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <select class="form-control"  name="bulan">
                                        <option value="00">Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="12">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-5"> 
                                    <select class="form-control" name="tahun">
                                        <?php
                                        $mulai = date('Y') - 50;
                                        for ($i = $mulai; $i < $mulai + 100; $i++) {
                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                            echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-md-2"> 
                                    <input  class="btn btn-info" type="submit" name="tampilkun" value="cari">
                                </div>

                            </div>

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


    <div class="col-md-2"></div>
    <div class="col-md-12">
        <!-- <h3 align="center">Informasi Data</h3> -->
        <div class="col-md-11">
            <div class="col-md-4"><h3 >Data Pergantian Meteran</h3></div>
            <div class="scrollku">
                <table id="tabelku" class="table" border="1" >
                    <thead class="table-info">
                        <tr align="center" valign="bottom" >
                            <th rowspan="2" >No.</th>
                            <th rowspan="2" >ID</th>
                            <th rowspan="2" >Nama</th>
                            <th rowspan="2" >Alamat </th>
                            <th rowspan="2" >No Hp</th> 
                            <th colspan="7" width="30%" ><center>Bongkar</center></th>
                            <th colspan="7" width="30%"><center>Pasang</center></th>
                            <th rowspan="2" >Sisa Listrik</th>
                            <th rowspan="2" >Keluhan</th>
                            <th rowspan="2" align="center">Petugas</th>
                        </tr>
                        <tr>

                            <th >Tgl Bongkar</th>
                            <th> Merk</th>
                            <th> Tahun</th>
                            <th> Type </th>
                            <th> Tarif</th>
                            <th> Daya </th>
                            <th >No Meter Lama</th>

                            <th >Tgl Pasang</th>
                            <th> Merk</th>
                            <th> Tahun</th>
                            <th> Type </th>
                            <th> Tarif</th>
                            <th> Daya </th>
                            <th >No Meter Baru</th>
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
                            $query = mysqli_query($conn, "SELECT *, p.nama AS 'ptgs' FROM penggantian g, pelanggan p, petugas t WHERE (g.tglpergantian BETWEEN '$dt1' AND '$dt2')AND g.idpet = t.idpet AND  g.idpel = p.idpel AND g.idmetbaru != '$blank' ORDER BY g.tglpergantian DESC");
                        } else if (isset($_POST["tampilkun"])) {

                            $bulan = $_POST['bulan'];
                            $tahun = $_POST['tahun'];
                            $query = mysqli_query($conn, "SELECT *, p.nama AS 'ptgs' FROM penggantian g, pelanggan p, petugas t  WHERE (month(g.tglpergantian)='$bulan' and year(g.tglpergantian) = '$tahun') AND g.idpet = t.idpet AND  g.idpel = p.idpel AND g.idmetbaru != '$blank' ORDER BY g.tglpergantian DESC");
                        } else if (isset($_POST["reload"])) {
                            $query = mysqli_query($conn, "SELECT *, p.nama AS 'ptgs' FROM penggantian g, pelanggan p, petugas t WHERE g.idpet = t.idpet AND  g.idpel = p.idpel AND g.idmetbaru != '$blank' ORDER BY g.tglpergantian DESC");
                        } else {
                            $query = mysqli_query($conn, "SELECT * , p.nama AS 'ptgs' FROM penggantian g, pelanggan p, petugas t  WHERE g.idpet = t.idpet AND  g.idpel = p.idpel AND g.idmetbaru != '$blank' ORDER BY g.tglpergantian DESC ");
                        }
                        // SELECT * FROM meteran m , pelanggan p , merk k  WHERE k.idmeter = m.idmerk AND m.id_pelanggan = p.idpel  AND m.tanggal_pasang IN (SELECT MAX(m.tanggal_pasang) FROM meteran  m GROUP BY m.id_pelanggan)
                        $bil = 0;
                        $i = 0;
                        $total = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            $bil = $bil + 1;
                            $i++;
                            $total = $total + 1;
                            $metlama = $data['idmetlama'];
                            $metbaru = $data['idmetbaru'];
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

                                <td><?php echo format_indo($data['tglpergantian']) . '<br>'; ?></td>
                                <?php 
                                $quel = mysqli_query($conn, "SELECT * FROM meteran WHERE idmet = '$metlama'");
                                while($lama = mysqli_fetch_array($quel)){
                                ?>
                                <td><?php echo $lama['merk']; ?></td>
                                <td><?php echo $lama['tahun']; ?></td>
                                <td><?php echo $lama['keterangan']; ?></td>
                                <td><?php echo $lama['Tarif']; ?></td>
                                <td><?php echo $lama['Daya']; ?></td>
                                <td><?php echo $metlama ?></td>
                                <td><?php echo format_indo($data['tglpergantian']) . '<br>'; ?></td>
                                <?php 
                                }
                                $queb = mysqli_query($conn, "SELECT * FROM meteran WHERE idmet = '$metbaru'");
                                while($baru = mysqli_fetch_array($queb)){
                                ?>
                                <td><?php echo $baru['merk']; ?></td>
                                <td><?php echo $baru['tahun']; ?></td>
                                <td><?php echo $baru['keterangan']; ?></td>
                                <td><?php echo $baru['Tarif']; ?></td>
                                <td><?php echo $baru['Daya']; ?></td>
                                <td><?php echo $metbaru; ?></td>
                                <td><?php echo $data['sisalistrik']; ?></td>
                                <td><?php echo $data['keluhan']; ?></td>
                                <td><?php echo $data['kodepanggilan']; ?></td>
                                <?php
                                }
                                
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
        </div>
    </div>
</div>

       
         </div>
</body>
</html>