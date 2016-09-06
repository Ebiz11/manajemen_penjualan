<?php
require ('lib.php');
$penjualan=new penjualan();
$id_barang=$_GET['id_barang'];

if(isset($_POST['button'])){
      $add_pembelian=$penjualan->add_pembelian($_POST['nama_barang'], $id_barang, $_POST['id_supplier'], $_POST['stok'], $_POST['harga_beli']);
      echo "<script>document.location='index.php?page=barang';</script>";
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Stok</h5>
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
                    $barang=$penjualan->detail_barang($id_barang);
                    $data_barang=$barang->fetch(PDO::FETCH_OBJ);
                   ?>
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $data_barang->nama_barang ?> " name="nama_barang"  class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Id Supplier</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $data_barang->id_supplier ?>" name="id_supplier" class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" name="stok"  class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $data_barang->harga_beli ?>" name="harga_beli"  class="form-control"></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10"><input type="text" value="<?php echo $data_barang->harga_jual ?>" name="harga_jual"  class="form-control"></div>
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a type="button" href=index.php?page=barang class="btn btn-white" type="submit">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="button">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
