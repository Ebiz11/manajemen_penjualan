<?php
  $nama=$_POST['nama_member'];
  $alamat= $_POST['alamat'];
  $no_telp= $_POST['no_telp'];
  $id=$_GET['id_member'];

if(isset($_POST['button'])){
      $dbh->query("UPDATE member SET nama_member='$nama', alamat='$alamat' , no_hp='$no_telp' WHERE id_member='$id' ");

      echo "<script>document.location='index.php?page=member';</script>";
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Member</h5>
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
            <div class="ibox-content">
                <form method="post" class="form-horizontal">
                  <?php
                      $no=1;
                      $querymember = $dbh->query( "SELECT * FROM member  WHERE id_member='$id'");
                      $datamember = $querymember ->fetch();
                  ?>
                  <div class="form-group"><label class="col-sm-2 control-label">Id Member</label>
                    <div class="col-sm-5">
                      <div class="col-sm-10"><input type="text" disabled="" value="<?php echo $datamember['id_member']; ?>" name="nama_investor" class="form-control"></div>
                  </div>
                  </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Member</label>
                      <div class="col-sm-5">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datamember['nama_member']; ?>" name="nama_member" class="form-control" required></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-5">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datamember['alamat']; ?>" name="alamat" class="form-control" required></div>
                    </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">No Telp</label>
                      <div class="col-sm-5">
                        <div class="col-sm-10"><input type="text" value="<?php echo $datamember['no_hp']; ?>" name="no_telp" class="form-control" required></div>
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a type="button" href=index.php?page=member class="btn btn-white" type="submit">Cancel</a>
                            <button class="btn btn-primary" type="submit" name="button">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
