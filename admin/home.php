<?php

require ("lib.php");
$penjualan=new penjualan();

$tampil_penjualan=$penjualan->tampil_transaksi();
$jumlah_penjualan=$tampil_penjualan->rowCount();

$tampil_pembelian=$penjualan->tampil_pembelian();
$jumlah_pembelian=$tampil_pembelian->rowCount();

$tampil_supplier=$penjualan->tampil_supplier();
$jumlah_supplier=$tampil_supplier->rowCount();

 ?>
<div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right"></span>
                                <h5>Penjualan</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $jumlah_penjualan ?></h1>
                                <small>Total penjualan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right"></span>
                                <h5>Pembelian</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $jumlah_pembelian ?></h1>
                                <small>Total Pembelian</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right"></span>
                                <h5>Supplier</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $jumlah_supplier ?></h1>
                                <small>Total Supplier</small>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
