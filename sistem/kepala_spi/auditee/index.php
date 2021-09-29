<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$tb_auditee = query("SELECT a.id_auditee,b.nama,a.nama_unit,a.tanggal from tb_auditee as a,tb_user as b where a.id_user=b.id_user");

$tb_user = query("SELECT * FROM tb_user  ORDER BY tb_user.nama ASC");
$tb_auditee = query("SELECT * FROM tb_auditee  ORDER BY tb_auditee.nama_unit ASC");

?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-md-12 connectedSortable">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addAuditee" data-toggle="modal">Tambah data</button>
            </div>
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatable" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Nama ketua
                        </th>
                        <th>
                          Nama Unit
                        </th>
                        <th>
                          Tanggal
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php $no = 1; ?>
                      <?php foreach ($tb_auditee as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['nama']; ?></td>
                          <td><?php echo $r['nama_unit']; ?></td>
                          <td><?php echo  $r['tanggal']; ?></td>
                          <td>
                            <div class="btn-group btn-group-sm">
                              <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal<?php echo $r['id_auditee']; ?>"><i class="fas fa-eye"></i></a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModal<?php echo $r['id_auditee']; ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Detail Data Auditee</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <div class="modal-body">
                                      <!-- form start -->
                                      <form action="" method="POST">
                                        <?php
                                        $id = $r["id_auditee"];
                                        $data = mysqli_query($conn, "SELECT b.foto,a.id_auditee,b.nama,a.nama_unit,a.tanggal from tb_auditee as a,tb_user as b where a.id_user=b.id_user");
                                        while ($cb = mysqli_fetch_array($data)) {
                                        ?>
                                          <div class="form-group">
                                            <!-- <label for="id_user">ID User</label> -->
                                            <input type="hidden" class="form-control" id="id_auditee" name="id_auditee" value="<?= $cb["id_auditee"]; ?>">
                                          </div>
                                          <div class="form-group justify-content-center">
                                            <img src="../../img/user/<?= $cb["foto"]; ?>" alt="foto ketua unit" width="50" class="img-circle elevation-2">
                                          </div>
                                          <div class="form-group">
                                            <label for="nama">Nama Ketua</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $cb["nama"]; ?>" required readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="nama_unit">Nama Unit</label>
                                            <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $cb["nama_unit"]; ?>" required readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $cb["tanggal"]; ?>" required readonly>
                                          </div>


                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer float-right">
                                      <a href="index.php" type="submit" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                      <!-- <button type="edit" id="edit" name="edit" value="edit" class="btn btn-primary">Simpan Perubahan</button> -->
                                      </form>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <a href="hapus.php?id=<?= $r["id_auditee"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin mengapus data?');"><i class="fas fa-trash"></i></a>

                            </div>

                          </td>
                        </tr>
                        <?php $no++;  ?>
                      <?php endforeach; ?>
                    </tbody>
                    <?php  ?>
                  </table>

                </div>
              </div>

              <!-- modal tambah data auditee-->
              <div class=" modal fade" id="addAuditee" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Data Auditee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-primary">

                            <form class="main_form" method="post" id="form" action="" enctype="multipart/form-data">

                              <div class="card-body">
                                <div class="form-group">
                                  <input type="hidden" id="id_auditee" class="form-control" value="" name="id_auditee">
                                </div>
                                <div class="form-group">
                                  <label for="nip">Nama Ketua Unit</label>
                                  <input type="text" id="nip" class="form-control" value="" name="nip_npak">
                                </div>
                                <div class="form-group">
                                  <label for="nama">Nama Unit</label>
                                  <input type="text" id="nama" class="form-control" value="" name="nama">
                                </div>
                                <div class="form-group">
                                  <label for="nama">Nama Unit</label>
                                  <input type="date" id="nama" class="form-control" value="" name="nama">
                                </div>
                              </div>
                              <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <!-- <input type="submit" class="btn btn-primary send_btn" name="tambah data auditee" value="tambah data auditee"> -->
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button class="btn btn-primary send_btn" type="submit" name="addAuditee">Daftar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.modal tambah data auditee -->





            </div>
          </div>
        </div>

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">


      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php include('../../template/footer.php'); ?>