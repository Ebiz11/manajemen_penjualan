<?php

require ("lib.php");
$penjualan=new penjualan();

if(isset($_POST['button'])){

      $update_suplier=$penjualan->update_suplier($_GET['id_supplier'], $_POST['nama_supplier'], $_POST['kode_langganan'], $_POST['alamat'], $_POST['no_telp']);
      echo "<script>document.location='index.php?page=supplier';</script>";
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Supplier</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal">
                  <?php
                      $no=1;
                      $querysupplier = $penjualan->detail_supplier($_GET['id_supplier']);
                      $datasupplier = $querysupplier ->fetch(PDO::FETCH_OBJ);
                  ?>
                  <div class="form-group"><label class="col-sm-2 control-label">Id Supplier</label>
                    <div class="col-sm-10">
                      <div class="col-sm-10"><input type="text" disabled="" value="<?php echo $datasupplier->id_supplier ?>" name="id_supplier" class="form-control"></div>
                  </div>
                  </div>
                  <div class="form-group"><label class="col-sm-2 control-label">Kode Langganan</label>
                    <div class="col-sm-10">
                      <div class="col-sm-10"><input type="text" value="<?php echo $datasupplier->kode_langganan ?>"  name="kode_langganan" class="form-control"></div>
                  </div>
                  </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Supplier</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datasupplier->nama_supplier ?>" name="nama_supplier" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datasupplier->alamat ?>"  name="alamat" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">No Telp</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datasupplier->no_telp ?>"  name="no_telp" class="form-control"></div>
                    </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a type="button" href=index.php?page=supplier class="btn btn-white" type="submit">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="button">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
