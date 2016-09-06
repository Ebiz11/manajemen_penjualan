<?php

require ("lib.php");
$penjualan=new penjualan();
$id_transaksi=$_GET['id_transaksi'];
 ?><div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Rincian Biaya</h5>
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
                  <table class="table">
                      <thead>
                      <tr>

                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Sub Total</th>
                          <th>Tanggal</th>
                      </tr>
                      </thead>
                      <tbody>

                          <?php
                          $no=1;
                          $tampil=$penjualan->detail_penjualan($id_transaksi);
                          while ($data_penjualan=$tampil->fetch(PDO::FETCH_ASSOC)){
                           ?>
                        <tr class="gradeX">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data_penjualan['nama_barang']?></td>
                            <?php
                            $cek=$penjualan->detail_barang($data_penjualan['id_barang']);
                            $data_cek=$cek->fetch(PDO::FETCH_ASSOC);
                             ?>
                            <td><?php echo $data_cek['harga_jual'] ?></td>
                            <td><?php echo $data_penjualan['jumlah'] ?></td>
                            <td><?php echo $data_penjualan['sub_total'] ?></td>
                            <td><?php echo date("d-m-Y",strtotime($data_penjualan['tanggal'])) ?></td>

                        </tr>
                        <?php } ?>
                      </tbody>
                  </table>
              <button type="button" class="btn btn-white" onclick="document.location='index.php?page=laporan_penjualan'">Kembali</button>
          </div>
          </div>
      </div>
  </div>
