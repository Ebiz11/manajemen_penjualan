<?php
		require ("lib.php");
		$penjualan=new penjualan();
		$del=$penjualan->del_supplier($_GET['id_supplier']);

	  echo "<script>document.location='index.php?page=supplier';</script>";
?>
