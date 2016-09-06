<?php
		require ("lib.php");
		$penjualan=new penjualan();
		$del=$penjualan->del_keranjang_id($_GET['id_barang']);
	  echo "<script>document.location='index.php?page=transaksi';</script>";
?>
