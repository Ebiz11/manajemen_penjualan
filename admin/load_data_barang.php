<?php
$dbh = new PDO('mysql:host=localhost;dbname=penjualan', "root", "");
$query=$dbh->query("SELECT * FROM barang_demo2 WHERE id_barang='$_POST[parent_id]'");
$response=array();
$jumlah=$query->rowCount();
		if($query){
			if($jumlah > 0){
				while($row = $query->fetch()){

					$response[] = $row;
				}
			}else{
				$response['error'] = 'Data kosong';
			}
		}else{
			//$response['error'] = mysql_error();
		}
		die(json_encode($response));

?>
