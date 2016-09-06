<?php
require ("lib.php");
$penjualan=new penjualan();

if (isset($_POST['cari'])) {

  $start=date("Y-m-d", strtotime($_POST['start']));
  $end=date("Y-m-d", strtotime($_POST['end']));

  $tampil_pembelian=$penjualan->cari_pembelian($start, $end);
}else {
$tampil_pembelian=$penjualan->tampil_pembelian();
}

 ?>
<div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
          <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Laporan Pembelian</h5>
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
                <form method="post">
                  <div class="form-group" id="data_5">
                  <label class="font-noraml">Range select</label>
                  <div class="input-daterange input-group" id="datepicker">
                  <input type="text" class="input-sm form-control"  name="start" value="<?php  date("m/d/Y") ?> "/>
                  <span class="input-group-addon"> to </span>
                  <input type="text" class="input-sm form-control"  name="end" value="<?php  date("m/d/Y") ?>" />
                  </div>
                  </div>
                  <button type="submit" name="cari" class="btn btn-info">Tampilkan</button><br>
                </form>
                  <br><br>
              <table class="table table-striped table-bordered table-hover dataTables-example">
              <thead>
              <tr>
                  <th>No </th>
                  <th>Nama Barang </th>
                  <th>Nama Supplier </th>
                  <th>Jumlah</th>
                  <th>Harga Beli </th>
                  <th>Tanggal</th>
              </tr>
              </thead>
              <tbody>

                <?php
                $no=1;
                while ($data_pembelian=$tampil_pembelian->fetch(PDO::FETCH_OBJ)) {
                ?>
                  <tr class="gradeX">
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data_pembelian->nama_barang ?></td>
                      <td>
                        <?php
                        $supplier=$penjualan->detail_supplier($data_pembelian->id_supplier);
                        $data_supplier=$supplier->fetch(PDO::FETCH_OBJ);
                      echo  $data_supplier->nama_supplier;
                      ?></td>
                      <td><?php echo $data_pembelian->stok ?></td>
                      <td><?php echo number_format($data_pembelian->harga_beli,0,',','.') ?></td>
                      <td><?php echo date("d-m-Y",strtotime($data_pembelian->tanggal)) ?></td>

                  </tr>
                  <?php
                }
                  ?>
              </tbody>
              <tfoot>
              </tfoot>
              </table>

              </div>
          </div>
      </div>
      </div>
      </div>
