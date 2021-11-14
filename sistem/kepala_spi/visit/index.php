<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('function.php');

$username = $_SESSION["username"];

?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="container-fluid">
        <div class="row">
          <div class="card-body mt-0">
            <div class="callout callout-default my-0">
              <h5>Petunjuk!</h5>
              <p>Data visit memberikan info mengenai data
                Data Desk berupa data referensi tahun sebelumnya dan data kunjungan.</p>
            </div>
          </div>


          <!-- <button type="button" class="btn btn-success toastsDefaultSuccess">
                  Launch Success Toast
                </button>
                <script>
                  $('.toastsDefaultSuccess').click(function() {
                    $(document).Toasts('create', {
                      class: 'bg-success',
                      title: 'Toast Title',
                      subtitle: 'Subtitle',
                      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                  });
                </script> -->

                

          <div class="col-md-12">
            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addVisit" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
          </div>


          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h5>Tabel Data Visit</h5>
                <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>
                        Visit
                      </th>
                      <th>
                        Desk
                      </th>
                      <th>
                        Tanggal Monitoring
                      </th>
                      <th>
                        Tanggal Visit
                      </th>
                      <th>
                        Isi
                      </th>
                      <th>
                        Aksi
                      </th>
                    </tr>
                  </thead>
                  <tbody id="modal-data">
                  <?php
                    $no = 0;
                    $tb_visit = mysqli_query($conn,"SELECT a.id_visit, b.id_desk, b.tgl_monitoring, a.tgl_visit,a.isi FROM tb_visit as a, tb_desk as b WHERE a.id_desk=b.id_desk");
                    while ($r = mysqli_fetch_array($tb_visit)) {
                        $no++;
                   ?>
                    <?php foreach ($tb_visit as $r) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?php echo $r['id_visit']; ?></td>
                        <td><?php echo  $r['id_desk']; ?></td>
                        <td><?php echo  $r['tgl_monitoring']; ?></td>
                        <td><?php echo  $r['tgl_visit']; ?></td>
                        <td><?php echo  $r['isi']; ?></td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_visit']; ?>">
                              <i class="fas fa-eye"></i>
                            </a>

                            <!-- tampilan modal jadi-->
                            <div class="modal fade" id="myModaldetail<?php echo $r['id_visit']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Data Visit</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="modal-body">
                                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_visit" autocomplete="off" required readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="id_desk">Tanggal monitoring</label>
                                        <select class="form-control " data-placeholder="Pilih Tanggal Monitoring" style="width: 100%;" name="id_desk" readonly>
                                          <option value=""><?= $r['tgl_monitoring'];?></option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="tgl_visit">Tanggal Visit</label>
                                        <input type="date" class="form-control" id="tgl_visit" name="tgl_visit" autocomplete="off" required value="<?= $r['tgl_visit']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <input type="textbox" class="form-control" id="isi" name="isi" autocomplete="off" required  value="<?= $r['isi']; ?>" readonly>
                                      </div>

                                      <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Kembali</button>
                                    </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                            <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_visit']; ?>"><i class="fas fa-pen"></i></a>

                            <!-- tampilan modal jadi-->
                            <div class="modal fade" id="myModal<?php echo $r['id_visit']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Visit</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="modal-body">
                                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_visit" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="id_desk">Tanggal monitoring</label>
                                        <select class="form-control " data-placeholder="Pilih Tanggal Monitoring" style="width: 100%;" name="id_desk">
                                          <option value=""><?= $r['tgl_monitoring'];?></option>
                                          <?php foreach ($tb_visit as $row) {
                                          ?>
                                            <option value="<?= $row['id_desk'] ?>"> <?php echo $row['tgl_monitoring']; ?> (ID Desk : <?= $row['id_desk']; ?>)</option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="tgl_visit">Tanggal Visit</label>
                                        <input type="date" class="form-control" id="tgl_visit" name="tgl_visit" value="<?= $r['tgl_visit']; ?>" autocomplete="off" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="isi">Isi</label>
                                        <input type="textbox" class="form-control" id="isi" name="isi" autocomplete="off" value="<?= $r['isi']; ?>" required>
                                      </div>

                                      <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success mr-2 float-right" name="tambahVisit">Perbarui</button>
                                    </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <a href="hapus.php?id_visit=<?= $r["id_visit"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>

                          </div>
                        </td>
                      </tr>
                      <?php $no++;  ?>
                    <?php endforeach; ?>
                  </tbody>
                  <?php } ?>
                </table>

              </div>
            </div>


            <!-- Modal Popup untuk Add-->
            <div class="modal fade" id="addVisit">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Visit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_visit" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="id_desk">Tanggal monitoring<span style="color: red;">*</span></label>
                        <select class="form-control " data-placeholder="Pilih Tanggal Monitoring" style="width: 100%;" name="id_desk">
                          <option value=""></option>
                          <?php foreach ($tb_visit as $row) {
                          ?>
                            <option value="<?= $row['id_desk'] ?>"> <?php echo $row['tgl_monitoring']; ?> (ID Desk : <?= $row['id_desk']; ?>)</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_visit">Tanggal Visit<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tgl_visit" name="tgl_visit" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="isi">Isi<span style="color: red;">*</span></label>
                        <input type="textbox" class="form-control" id="isi" name="isi" autocomplete="off" required>
                      </div>

                      <button type="submit" class="btn btn-success mr-2 float-right" name="tambahVisit">Simpan</button>
                      <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Batal</button>
                    </form>


                  </div>


                </div>
              </div>
            </div>
            <!-- akhir modal add -->


          </div>
        </div>
      </div>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php include('../../template/footer.php'); ?>