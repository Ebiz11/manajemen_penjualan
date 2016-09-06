<?php
	$dbh->query( "DELETE FROM member WHERE id_member = '$_GET[id_member]'");
	  echo "<script>document.location='index.php?page=member';</script>";
?>
