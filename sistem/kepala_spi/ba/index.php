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
            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addBA" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
          </div>

            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <h5>Tabel Berita Acara</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Tanggal LHA
                        </th>
                        <th>
                          Tanggal Berita Acara
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                    <?php
                    $no = 0;
                      $tb_ba = mysqli_query($conn, "SELECT a.id_ba,a.id_lha,a.tgl_ba,b.id_lha,b.tgl_lha FROM tb_ba as a,tb_lha as b WHERE a.id_lha=b.id_lha");
                      while ($r = mysqli_fetch_array($tb_ba)) {
                      $no++;
                    ?>
                      <?php foreach ($tb_ba as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo  $r['tgl_lha']; ?></td>
                          <td><?php echo  $r['tgl_ba']; ?></td>
                          <td>
                              <div class="btn-group btn-group-sm">
                              <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_ba']; ?>">
                                  <i class="fas fa-eye"></i>
                              </a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModaldetail<?php echo $r['id_ba']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Detail Data Berita Acara</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <input type="hidden" class="form-control" name="id_ba" autocomplete="off" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="id_tha">Tanggal THA</label>
                                                <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_tha"  value="" readonly>
                                                  <option value=""><?= $r['tgl_lha']; ?></option>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="tgl_ba">Tanggal BA</label>
                                                <input type="date" class="form-control" id="tgl_ba" name="tgl_ba" autocomplete="off" required value="<?= $r['tgl_ba']; ?>" readonly>
                                              </div>
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


                              <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_ba']; ?>"><i class="fas fa-pen"></i></a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModal<?php echo $r['id_ba']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Edit Data Berita Acara</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                          <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                              <div class="form-group">
                                                <input type="hidden" class="form-control" name="id_ba" autocomplete="off" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="id_tha">Tanggal THA</label>
                                                <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_tha"  value="" >
                                                  <option value=""><?= $r['tgl_lha']; ?></option>
                                                  <?php foreach ($tb_lha as $row) { ?>
                                                    <option value="<?= $row['id_lha'] ?>"> <?php echo $row['tgl_lha']; ?> (ID LHA : <?= $row['id_lha']; ?>)</option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="tgl_ba">Tanggal BA</label>
                                                <input type="date" class="form-control" id="tgl_ba" name="tgl_ba" autocomplete="off" required value="<?= $r['tgl_ba']; ?>" >
                                              </div>
                                              <button type="submit" class="btn btn-success mr-2 float-right" name="ubahBA">Perbarui</button>
                                              <button class="btn btn-secondary mr-2 float-right" data-dismiss="modal">Batal</button>
                                            </form>

                                          </div>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <a href="hapus.php?id_ba=<?= $r["id_ba"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>

                            </div>
                          </td>
                        <?php $no++;  ?>
                      <?php endforeach; ?>
                    </tbody>
                    <?php } ?>
                  </table>

                </div>
              </div>

              <!-- Modal Popup untuk Add-->
            <div class="modal fade" id="addBA">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Berita Acara</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_ba" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="id_tha">Tanggal LHA<span style="color: red;">*</span></label>
                        <select class="form-control " data-placeholder="Pilih Tanggal THA" style="width: 100%;" name="id_lha">
                          <option value=""></option>
                          <?php foreach ($tb_ba as $row) {
                          ?>
                            <option value="<?= $row['id_lha'] ?>"> <?php echo $row['tgl_lha']; ?> (ID LHA : <?= $row['id_lha']; ?>)</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_ba">Tanggal Berita Acara<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tgl_ba" name="tgl_ba" autocomplete="off" required>
                      </div>

                      <button type="submit" class="btn btn-success mr-2 float-right" name="tambahBA">Simpan</button>
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