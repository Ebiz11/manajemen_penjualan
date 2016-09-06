<?php

require ("lib.php");
$penjualan=new penjualan();

// add-record
if(isset($_POST['tambah'])){
  $add_pembelian=$penjualan->add_pembelian($_POST['nama_barang'], ' ', $_POST['id_supplier'], $_POST['stok'], $_POST['harga_beli']);
  $add_barang=$penjualan->add_barang($_POST['nama_barang'], $_POST['id_supplier'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
}
//

 ?>
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Data Barang</h5>
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
                  <button class="add-record btn btn-primary btn-sm">Tambah Data</button></br></br>
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>No </th>
                    <th>Id Barang </th>
                    <th>Nama Barang </th>
                    <th>Nama Supplier</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  $barang=$penjualan->tampil_barang();
                  while ($data_barang=$barang->fetch(PDO::FETCH_OBJ)){
                  ?>
                    <tr class="gradeX">
                        <td><?php echo $no++?></td>
                        <td><?php echo $data_barang->id_barang ?></td>
                        <td><?php echo $data_barang->nama_barang ?></td>
                        <td>
                        <?php
                            $supplier=$penjualan->detail_supplier($data_barang->id_supplier);
                            $data_supplier=$supplier->fetch(PDO::FETCH_OBJ);
                            echo $data_supplier->nama_supplier
                        ?>
                        </td>
                        <td><?php echo number_format($data_barang->harga_beli,0,',','.') ?></td>
                        <td><?php echo number_format($data_barang->harga_jual,0,',','.') ?></td>
                        <td><?php echo $data_barang->stok ?></td>
                        <td>
                        <a type="button" class="btn  btn-info btn-sm" href="index?page=update_stok&id_barang=<?php echo $data_barang->id_barang ?>" >Tambah Stok</a>
                        <a type="button" class="btn  btn-danger btn-sm" href="index.php?page=del_barang&id_barang=<?php echo $data_barang->id_barang ?>"><i class="fa fa-trash"> Hapus</i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
                </table>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- Start Modal Tambah-->
      <div class="modal inmodal fade" data-backdrop="static" id="add_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title">Tambah Barang</h4>
      <small class="font-bold"></small>
      </div>
      <form method="post" name="formulir" class="form-horizontal" enctype="multipart/form-data" >
      <div class="modal-body">

      <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
        <div class="col-sm-10">
          <div class="col-sm-10"><input type="text" name="nama_barang" class="form-control" required></div>
        </div>
      </div>
      <div class="form-group"><label class="col-sm-2 control-label">Id Supplier</label>
        <div class="col-sm-10">
          <div class="col-sm-10"><input type="text"  name="id_supplier" class="form-control" required></div>
        </div>
      </div>
      <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
        <div class="col-sm-10">
          <div class="col-sm-10"><input type="text"  name="stok" class="form-control" required></div>
        </div>
      </div>
      <div class="form-group"><label class="col-sm-2 control-label">Harga Beli</label>
        <div class="col-sm-10">
          <div class="col-sm-10"><input type="text"  name="harga_beli" class="form-control" required></div>
        </div>
      </div>
      <div class="form-group"><label class="col-sm-2 control-label">Harga Jual</label>
        <div class="col-sm-10">
          <div class="col-sm-10"><input type="text"  name="harga_jual" class="form-control" required></div>
        </div>
      </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
      <button class="btn btn-primary" type="submit" name="tambah">Simpan</button>
      </div>
      </form>
      </div>
      </div>
    </div>
        <!-- End Modal -->

  <script>
    $(function(){
        $(document).on('click','.add-record',function(e){
            e.preventDefault();
            $("#add_barang").modal('show');
        });
    });
  </script>
