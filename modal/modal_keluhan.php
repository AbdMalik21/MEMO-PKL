
        <?php
        include '../koneksi.php';

        $id = $_GET['id'];

         $query = "SELECT * from pengajuan j, pelanggan p where j.idpel = p.idpel and p.idpel ='".$id."'" ;
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        { 
                                       
            $nama = $row["nama"];
            $alamat = $row["alamat"];
            $keluhan = $row["keluhan"];
            $idmet = $row["idmet"];
        }
    ?>
    <?php
 $tgl=date('Y-m-d');
 
 ?>
<div class="modal-dialog">
    <form method="POST" action="organisasi_edit_proses.php">  
            <div class="modal-content">
                <div class="modal-header">
                  
                    <h4 class="modal-title">Detail Keluhan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    	<div class="col-xs-12">
                        	<div class="form-group">
                            	 <label class="control-label">ID Pelanggan</label>
                                <input type="text" name="data_keluhan" id="data_keluhan" class="form-control" value="<?=$id?>">
                               <label class="control-label">Nama Pelanggan</label>
                                <input type="text" name="data_keluhan" id="data_keluhan" class="form-control" value="<?=$nama?>">
                                <label class="control-label">Alamat Pelanggan</label>
                                <textarea  class="form-control ml-2" name="data_keluhan" id="data_keluhan" class="form-control"><?php echo "$alamat"; ?></textarea>
                                 <label class="control-label">keluhan Keluhan</label>
                                 <select class="form-control" name="jenis" >
                                <option selected disabled><?php echo "$keluhan"; ?></option>
                                 <option value="gantimeteran">Ganti Meteran</option>
                                 <option value="tambahdaya">Tambah Daya</option>
                                 <option value="meteranmeledak">meteranmeledak</option>
                                 </select>
                                <label class="control-label">Petugas Pemeriksa</label>
                                <input type="text" name="data_keluhan" id="data_keluhan" class="form-control" value="<?=$ptnama?>">
                                <label class="control-label">Tanggal</label>
                                <input type="text" name="tanggal" id="data_keluhan" class="form-control" value="<?=$tgl;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="edit">
</form>
                    <button data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Ok</button>
                </div>
            </div>
</div>
