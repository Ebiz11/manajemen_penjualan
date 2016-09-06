<?php
$dbh = new PDO('mysql:host=localhost;dbname=penjualan', "root", "");
require ("lib.php");
$penjualan=new penjualan();

  $tampil_keranjang=$penjualan->tampil_keranjang();
  $total_harga1=0;
  while ($data_keranjang1=$tampil_keranjang->fetch(PDO::FETCH_OBJ))
  {
    $total_harga1 =$total_harga1+$data_keranjang1->sub_total;
    $id_transaksi=1;
    //$id_transaksi=$penjualan->lastInsertId();
    $add_penjualan[$i]=$penjualan->add_penjualan($data_keranjang1->id_barang,$id_transaksi,  $data_keranjang1->nama_barang, $data_keranjang1->jumlah, $data_keranjang1->sub_total);
  }
  $add_transaksi=$penjualan->add_transaksi($total_harga1);
  $del=$penjualan->del_keranjang();
  echo "<script>document.location='index.php?page=transaksi';</script>";
 ?>
