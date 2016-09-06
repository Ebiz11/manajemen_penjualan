<?php
require ("lib.php");
$class_penjualan=new penjualan();
$penjualan=$class_penjualan->chart();
$rows = array();
while($data_penjualan = $penjualan->fetch(PDO::FETCH_OBJ)) {
	$row[0] = $data_penjualan->nama_barang;
	$row[1] = $data_penjualan->stok_total;
	array_push($rows,$row);//memasukan data ke dalam $rows array
}


print json_encode($rows, JSON_NUMERIC_CHECK);

?>
