<?php
require ("lib.php");
$penjualan=new penjualan();
if(isset($_POST['button'])){
  $dbh->query("INSERT INTO supplier (nama_supplier, alamat, no_telp)
  VALUES('$_POST[nama_supplier]','$_POST[alamat]','$_POST[no_telp]')");

    $add_supplier=$penjualan->add_supplier($_POST['nama_supplier'],$_POST['kode_langganan'], $_POST['alamat'],$_POST['no_telp']);

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
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Supplier</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" name="nama_supplier" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Kode Pelanggan</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" name="kode_langganan" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" name="alamat" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">No Telp</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" name="no_telp" class="form-control"></div>
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a type="button" href=index.php?page=home class="btn btn-white" type="submit">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="button">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
