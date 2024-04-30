<?php error_reporting(0); ?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
           <h3 class="modal-title">Input Data (Excel)</h3>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <?php
        include '../script/tanggalimport.php';
        include '../koneksi.php';
        ?>
        <div id="main"  >
            <div class="container">
               
                <!-- <div class="col-md-2"></div>     -->
                <div class="container col-md-4"  >
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
            
        </div>
        </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-info" href="../Format_Upload.xlsx">Download Format Table</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>