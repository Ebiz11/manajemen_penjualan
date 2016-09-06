<?php
		require ("lib.php");
		$penjualan=new penjualan();
		$del=$penjualan->del_barang($_GET['id_barang']);
	  echo "<script>document.location='index.php?page=barang';</script>";
?>
