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

          <div class="col-md-12">
            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addLHA" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
          </div>

            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <h5>Tabel Konfirmasi User</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Tanggal THA
                        </th>
                        <th>
                          Tanggal LHA
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Keterangan
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                    <?php
                    $no = 0;
                      $tb_lha = mysqli_query($conn, "SELECT a.id_lha,a.id_tha,a.tgl_lha,a.status,a.keterangan,b.id_tha,b.tgl_tha FROM tb_lha as a,tb_tha as b WHERE a.id_tha=b.id_tha");
                      while ($r = mysqli_fetch_array($tb_lha)) {
                      $no++;
                    ?>
                      <?php foreach ($tb_lha as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo  $r['tgl_tha']; ?></td>
                          <td><?php echo  $r['tgl_lha']; ?></td>
                          <td><?php echo  $r['status']; ?></td>
                          <td><?php echo  $r['keterangan']; ?></td>
                          <td>
                              <div class="btn-group btn-group-sm">
                              <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_lha']; ?>">
                                  <i class="fas fa-eye"></i>
                              </a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModaldetail<?php echo $r['id_lha']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Detail Data LHA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <input type="hidden" class="form-control" name="id_lha" autocomplete="off" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="id_tha">Tanggal THA<span style="color: red;">*</span></label>
                                                <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_tha"  value="">
                                                  <option value=""><?= $r['tgl_tha']; ?></option>
                                                  <?php foreach ($tb_tha as $row) {
                                                  ?>
                                                    <option value="<?= $r['id_tha'] ?>"> <?php echo $row['tgl_tha']; ?> (ID THA : <?= $row['id_tha']; ?>)</option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="tgl_lha">Tanggal LHA<span style="color: red;">*</span></label>
                                                <input type="date" class="form-control" id="tgl_lha" name="tgl_lha" autocomplete="off" required value="<?= $r['tgl_lha']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="status">Status<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="status" name="status" autocomplete="off" required value="<?= $r['status']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="keterangan">Keterangan<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" required value="<?= $r['keterangan']; ?>">
                                              </div>

                                              <button type="submit" class="btn btn-success mr-2 float-right" name="tambahLHA">Simpan</button>
                                              <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Batal</button>
                                            </form>

                                          </div>
                                              <div class="modal-footer float-right">
                                              <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                              
                                          </div>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->


                              <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_lha']; ?>"><i class="fas fa-pen"></i></a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModal<?php echo $r['id_lha']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Edit Data LHA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <input type="hidden" class="form-control" name="id_lha" autocomplete="off" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="id_tha">Tanggal THA<span style="color: red;">*</span></label>
                                                <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_tha"  value="">
                                                  <option value=""><?= $r['tgl_tha']; ?></option>
                                                  <?php foreach ($tb_tha as $row) {
                                                  ?>
                                                    <option value="<?= $r['id_tha'] ?>"> <?php echo $row['tgl_tha']; ?> (ID THA : <?= $row['id_tha']; ?>)</option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="tgl_lha">Tanggal LHA<span style="color: red;">*</span></label>
                                                <input type="date" class="form-control" id="tgl_lha" name="tgl_lha" autocomplete="off" required value="<?= $r['tgl_lha']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="status">Status<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="status" name="status" autocomplete="off" required value="<?= $r['status']; ?>">
                                              </div>
                                              <div class="form-group">
                                                <label for="keterangan">Keterangan<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" required value="<?= $r['keterangan']; ?>">
                                              </div>

                                              <button type="submit" class="btn btn-success mr-2 float-right" name="tambahLHA">Simpan</button>
                                              <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Batal</button>
                                            </form>

                                          </div>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <a href="hapus.php?id_tha=<?= $r["id_tha"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>

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
            <div class="modal fade" id="addLHA">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data LHA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_lha" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="id_tha">Tanggal THA<span style="color: red;">*</span></label>
                        <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_tha">
                          <option value=""></option>
                          <?php foreach ($tb_lha as $row) {
                          ?>
                            <option value="<?= $row['id_tha'] ?>"> <?php echo $row['tgl_tha']; ?> (ID THA : <?= $row['id_tha']; ?>)</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_lha">Tanggal LHA<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tgl_lha" name="tgl_lha" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="status">Status<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="status" name="status" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" required>
                      </div>

                      <button type="submit" class="btn btn-success mr-2 float-right" name="tambahLHA">Simpan</button>
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