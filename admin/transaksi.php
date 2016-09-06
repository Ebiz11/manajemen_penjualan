<?php
require ("lib.php");
$penjualan=new penjualan();
unset($_SESSION['error']);
unset($_SESSION['data']);

// $dbh = new PDO('mysql:host=localhost;dbname=penjualan', "root", "");
$tampil_keranjang=$penjualan->tampil_keranjang();
$jum_ker=$tampil_keranjang->rowCount();
if (isset($_POST['button'])) {

  if ($_POST['jumlah']<=$_POST['stok']) {
    $sub_totalnya= $_POST['jumlah']*$_POST['harga_jual'];
    $add_keranjang=$penjualan->add_keranjang($_POST['id_barang'], $_POST['jumlah'], $_POST['nama_barang'], $_POST['harga_jual'],$sub_totalnya, $_POST['harga_beli']);
    echo "<script>document.location='index.php?page=transaksi';</script>";

  }else {

      $_SESSION['data'] =$_POST;
      $_SESSION['error'] = 'Stok tidak mencukupi';

  }
    //echo "<script>document.location='index.php?page=transaksi';</script>";
}

if (isset($_POST['checkout'])) {

    // $hitung=$dbh->query("SELECT SUM(sub_total) AS grand_total FROM keranjang_demo2");
    $hitung=$penjualan->hitung();
    $datanya=$hitung->fetch(PDO::FETCH_OBJ);
    $insert=$penjualan->add_transaksi($datanya->grand_total);
    // $dbh->query("INSERT INTO transaksi_demo2 (total_harga) VALUES ('$datanya[grand_total]')");

    $id_transaksi=$penjualan->dbh->lastInsertId();
    //$total_harga1=0;
    while ($data_keranjang1=$tampil_keranjang->fetch(PDO::FETCH_OBJ))
    {
      // $query_beli=$penjualan->detail_barang($data_keranjang1->id_barang);
      // while ($data_harga = $query_beli->fetch()) {
      //   $harga_beli= $data_harga->harga_beli;
      //   $harga_jual= $data_harga->harga_jual;
      //   $laba=$harga_jual-$harga_beli;
      // };
      $pendapatan= $data_keranjang1->jumlah*($data_keranjang1->harga_jual-$data_keranjang1->harga_beli);
      //$total_harga1 =$total_harga1+$data_keranjang1->sub_total;
      $add_penjualan[$i]=$penjualan->add_penjualan($data_keranjang1->id_barang, $id_transaksi, $data_keranjang1->nama_barang, $data_keranjang1->jumlah, $data_keranjang1->sub_total, $pendapatan);
    }
    //$add_transaksi=$penjualan->add_transaksi($total_harga1);
    $del=$penjualan->del_keranjang();
    echo "<script>document.location='index.php?page=transaksi';</script>";
}

  ?>
 <div class="wrapper wrapper-content animated fadeInRight">
     <div class="ibox-content p-xl">
              <?php
              if (isset($_SESSION['error']) && $_SESSION['error'] <> '') {
              echo  '<div class="error alert alert-danger alert-dismissable ">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              '.$_SESSION['error'].'</div>';
               }
              $_SESSION['error'] = '';
              ?>
             <form method="post" class="form-horizontal">
                 <div class="form-group"><label class="col-sm-2 control-label">Id Barang</label>
                   <div class="col-sm-10">
                     <div class="col-sm-10"><input type="text" id="id_barang" value="<?php echo @$_SESSION['data']['id_barang'] ?>" name="id_barang" class="form-control" required></div>
                 </div>
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                   <div class="col-sm-10">
                     <div class="col-sm-10"><input type="text" id="nama_barang" value="<?php echo @$_SESSION['data']['nama_barang'] ?>" name="nama_barang" class="form-control" required></div>
                 </div>
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Stok</label>
                   <div class="col-sm-10">
                     <div class="col-sm-10"><input type="text" id="stok" value="<?php echo @$_SESSION['data']['stok'] ?>" name="stok" class="form-control" required></div>
                 </div>
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Jumlah Beli</label>
                   <div class="col-sm-10">
                     <div class="col-sm-10"><input type="text" name="jumlah" class="form-control" required><input type="hidden" id="harga_beli" name="harga_beli" class="form-control" required></div>
                 </div>
                 </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Harga Satuan</label>
                   <div class="col-sm-10">
                     <div class="col-sm-10"><input type="text" value="<?php echo @$_SESSION['data']['harga_jual'] ?>" id="harga_jual" name="harga_jual" class="form-control" required></div>
                 </div>
                 </div>
                 <br>
                 <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-2">
                         <button class="btn btn-success" type="submit" name="button">Add</button>
                     </div>
                 </div>
             </form>
             <?php
             if($jum_ker >0){ ?>
               <hr>
             <div class="row">
                <div class="col-sm-6">
                    <h5></h5>
                    <address>
                        <strong></strong><br>
                        <abbr title="Phone"> </abbr>
                    </address>
                </div>
                <div class="col-sm-6 text-right">
                    <h4 class="text-navy"><?php echo $data_detail->no_ktp ?></h4>
                    <span> </span>
                    <address>
                        <strong>
                    </address>
                    <p>
                        <span><strong>Tanggal: </strong> <?php echo date("d-m-Y") ?></span>
                    </p>
                </div>
            </div>
            <form method="post" >
             <div class="table-responsive m-t">
                 <table class="table table-hover">
                     <thead>
                     <tr>
                         <th>No</th>
                         <th>Id Barang</th>
                         <th>Nama Barang</th>
                         <th>Jumlah</th>
                         <th>Harga Satuan</th>
                         <th>Total</th>
                         <th>Aksi</th>
                     </tr>
                     </thead>
                     <tbody>
                       <?php
                       $no=1;
                       $total_harga=0;
                       //$tampil_keranjang=$penjualan->tampil_keranjang();
                       while ($data_keranjang=$tampil_keranjang->fetch(PDO::FETCH_OBJ)){
                       ?>

                     <tr class="gradeX">
                         <td><?php echo $no++ ?></td>
                         <td><?php echo $data_keranjang->id_barang ?></td>
                         <td> <?php echo $data_keranjang->nama_barang; ?> </td>
                         <td><?php echo $data_keranjang->jumlah ?></input></td>
                         <td><?php echo number_format($data_keranjang->harga_jual,0,',','.') ?></td>
                         <td><?php echo number_format($data_keranjang->sub_total,0,',','.') ?></td>
                         <td>
                         <a type="button" class="btn  btn-danger btn-sm" href="index.php?page=del_keranjang&id_barang=<?php echo $data_keranjang->id_barang ?>"><i class="fa fa-trash"> Hapus</i></a>
                         </td>
                         <?php
                         $total_harga=$total_harga+$data_keranjang->sub_total;
                         ?>
                     </tr>
                     <?php } ?>
                     </tbody>
                 </table>
             </div><!-- /table-responsive -->

             <table class="table invoice-total">

                 <tbody><br><br>
                 <tr>
                     <td><strong>Total Harga : </strong></td>
                     <td><?php echo number_format($total_harga,0,',','.') ?></td>
                 </tr>
                 </tbody>
             </table>

             <button class="btn btn-info" type="submit" name="checkout">Save</button>
           </form>
           <?php }else{} ?>
         </div>
 </div>

 <script language="javascript">
 $(document).ready(function() {
   $("#id_barang").keyup(function() {
       var barang = $('#id_barang').val();
   $.post('load_data_barang.php', {parent_id: barang}, function(data){
      $('#nama_barang').val(data[0].nama_barang);
      $('#id_barang').val(data[0].id_barang);
      $('#harga_jual').val(data[0].harga_jual);
      $('#harga_beli').val(data[0].harga_beli);
      $('#stok').val(data[0].stok);
   },'json'
     );
  });
  });
 </script>
