<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Statistik </h5>
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
            <div class="ibox-content"><br><br>

<script type="text/javascript">
	var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },
         title: {
            text: 'Grafik stok Barang'
         },
         xAxis: {
            categories: ['Nama Barang']
         },
         yAxis: {
            title: {
               text: 'Stok'
            }
         },
              series:
            [
<?php
require ("lib.php");
    $penjualan=new penjualan();
    $tampil_barang=$penjualan->tampil_barang();
    while ($ambil=$tampil_barang->fetch(PDO::FETCH_OBJ)) {
    $nama=$ambil->nama_barang;
    $stokx = $ambil->stok;
    // $stok=$penjualan->detail_barang_chart($nama);
    // while ($data=$stok->fetch(PDO::FETCH_OBJ)) {
	  //  $stokx = $data->stok;
	  // }

	  ?>
	  {
		  name: '<?php echo $nama; ?>',
		  data: [<?php echo $stokx; ?>]
	  },
	  <?php } ?>
]
});
});
</script><br><br>

<script src="../js/highchart.js"></script>
<script src="../js/exporting.js"></script>

<body>
<div id="container" style="min-width: 400; height: 400; margin: 10 auto"></div>
</body>
</div>
</div>
</div>
</div>
</div>
