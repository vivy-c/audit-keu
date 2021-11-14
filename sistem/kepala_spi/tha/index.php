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
            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addTHA" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
          </div>

            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <h5>Tabel Temuan Hasil Audit Keuangan</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Tanggal  THA
                        </th>
                        <th>
                          Tanggal Visit
                        </th>
                        <th>
                          Catatan
                        </th>
                        <th>
                          Persetujuan
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                    <?php
                    $no = 0;
                      $tb_tha = mysqli_query($conn, "SELECT a.id_tha,a.id_visit,a.tgl_tha,a.catatan,a.dasar_hukum,a.penyebab,a.akibat,a.rekomendasi,a.tanggapan_auditee,a.rencana_tindak_lanjut,a.persetujuan,b.tgl_visit FROM tb_tha as a,tb_visit as b WHERE a.id_visit=b.id_visit");
                      while ($r = mysqli_fetch_array($tb_tha)) {
                      $no++;
                    ?>
                      <?php foreach ($tb_tha as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo  $r['tgl_tha']; ?></td>
                          <td><?php echo  $r['tgl_visit']; ?></td>
                          <td><?php echo  $r['catatan']; ?></td>
                          <td><?php echo  $r['persetujuan']; ?></td>
                          <td>
                              <div class="btn-group btn-group-sm">
                              <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_tha']; ?>">
                                  <i class="fas fa-eye"></i>
                              </a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModaldetail<?php echo $r['id_tha']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Detail Data THA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                              <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                      <input type="hidden" class="form-control" name="id_tha" autocomplete="off" required readonly>
                                                  </div>

                                                  <div class="form-group">
                                                      <label for="nama">Nama Auditor</label>
                                                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $r["nama"]; ?>" readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="nama_unit">Nama Auditee</label>
                                                      <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $r["nama_unit"]; ?>" readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="status">Status</label>
                                                      <input type="text" class="form-control" id="status" name="status" value="<?= $r["status"]; ?>" readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="id_pka">Tanggal PKA</label>
                                                      <select class="form-control " data-placeholder="Pilih PKA" style="width: 100%;" name="id_pka" readonly>
                                                          <option value=""><?= $r['tanggal'];?> ( Auditor : <?= $r['nama'];?> )</option>

                                                      </select>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="jenis">jenis</label>
                                                      <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" value="<?= $r['jenis'];?>" required readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="sumber_dana">Sumber Dana</label>
                                                      <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" autocomplete="off" value="<?= $r['sumber_dana'];?>"  required readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="nominal">Nominal</label>
                                                      <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off" value="<?= $r['nominal'];?>" required readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="tgl_monitoring">Tanggal Monitoring</label>
                                                      <input type="date" class="form-control" id="tgl_monitoring" name="tgl_monitoring" autocomplete="off" value="<?= $r['tgl_monitoring'];?>"  required readonly>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="lama_monitoring">Lama Monitoring</label>
                                                      <input type="number" class="form-control" id="lama_monitoring" name="lama_monitoring" autocomplete="off" value="<?= $r['lama_monitoring'];?>"  required readonly>
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


                              <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_tha']; ?>"><i class="fas fa-pen"></i></a>

                              <!-- tampilan modal jadi-->
                              <div class="modal fade" id="myModal<?php echo $r['id_tha']; ?>">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Edit Data THA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                              <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                      <input type="hidden" class="form-control" name="id_tha" autocomplete="off" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="id_pka">Tanggal PKA</label>
                                                      <select class="form-control " data-placeholder="Pilih PKA" style="width: 100%;" name="id_pka">
                                                          <option value=""><?= $r['tanggal'];?> ( Auditor : <?= $r['nama'];?> )</option>
                                                          <?php foreach ($tb_pka as $row) {
                                                          ?>
                              <option value="<?= $row['id_pka'] ?>"> <?php echo $row['tanggal']; ?> (Auditor : <?= $row['nama']; ?>)</option>
                                                          <?php } ?>
                                                      </select>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="jenis">jenis</label>
                                                      <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" value="<?= $r['jenis'];?>" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="sumber_dana">Sumber Dana</label>
                                                      <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" autocomplete="off" value="<?= $r['sumber_dana'];?>"  required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="nominal">Nominal</label>
                                                      <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off" value="<?= $r['nominal'];?>" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="tgl_monitoring">Tanggal Monitoring</label>
                                                      <input type="date" class="form-control" id="tgl_monitoring" name="tgl_monitoring" autocomplete="off" value="<?= $r['tgl_monitoring'];?>"  required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="lama_monitoring">Lama Monitoring</label>
                                                      <input type="number" class="form-control" id="lama_monitoring" name="lama_monitoring" autocomplete="off" value="<?= $r['lama_monitoring'];?>"  required>
                                                  </div>

                                                  <a href="index.php" type="button" class="btn btn-secondary ml-2 float-right" data-dismiss="modal">Kembali</a>
                                                  <button type="submit" name="ubahTHA" class="btn btn-success float-right">Perbarui</button>
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
            <div class="modal fade" id="addTHA">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data THA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_tha" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="id_visit">Tanggal visit<span style="color: red;">*</span></label>
                        <select class="form-control " data-placeholder="Pilih Tanggal Visit" style="width: 100%;" name="id_visit">
                          <option value=""></option>
                          <?php foreach ($tb_tha as $row) {
                          ?>
                            <option value="<?= $row['id_visit'] ?>"> <?php echo $row['tgl_visit']; ?> (ID Visit : <?= $row['id_visit']; ?>)</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_tha">Tanggal THA<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tgl_tha" name="tgl_tha" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="catatan">Catatan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="catatan" name="catatan" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="dasar_hukum">Dasar Hukum<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="dasar_hukum" name="dasar_hukum" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="penyebab">Penyebab<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="penyebab" name="penyebab" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="akibat">Akibat<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="akibat" name="akibat" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="rekomendasi">Rekomendasi<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="tanggapan_auditee">Tanggapan Auditee<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="tanggapan_auditee" name="tanggapan_auditee" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                        <label for="persetujuan">Persetujuan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="persetujuan" name="persetujuan" autocomplete="off" required>
                      </div>

                      <button type="submit" class="btn btn-success mr-2 float-right" name="tambahTHA">Simpan</button>
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