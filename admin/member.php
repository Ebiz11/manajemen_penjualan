
<div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Data Member</h5>
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
                  <a type="button" class="btn btn-primary btn-sm" href="index?page=tambah_member" >Tambah Data</a></br></br>
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>No </th>
                    <th>Id Member</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $no=1;
                      $querymember = $dbh->query( "SELECT * FROM member  ORDER BY id_member");
                      while ($datamember = $querymember ->fetch())
                      {
                  ?>
                    <tr class="gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $datamember['id_member']; ?></td>
                        <td><?php echo $datamember['nama_member']; ?></td>
                        <td><?php echo $datamember['alamat']; ?></td>
                        <td><?php echo $datamember['no_hp']; ?> </td>
                        <td>
                          <a type="button" class="btn btn-info btn-sm" href="index.php?page=edit_member&id_member=<?php echo $datamember['id_member']; ?>"><i class="fa fa-pencil-square-o"> Edit</i></a>
                          <a type="button" class="btn btn-danger btn-sm" href="index.php?page=del_member&id_member=<?php echo $datamember['id_member']; ?>"><i class="fa fa fa-trash"> Hapus</i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
                </table>

                </div>
            </div>
        </div>
        </div>

        </div>
