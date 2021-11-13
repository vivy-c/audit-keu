<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('functions.php');
// include('../../functions.php');

$tb_user = query("SELECT * FROM tb_user ORDER BY nama ASC");
$judul = 'Data User';

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan');
      document.location.href='index.php';
      </script>";
  } else {
    echo "<script>
      alert('data gagal ditambahkan');
      document.location.href='index.php';
      </script>";
  }
}

?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

    <div class="container-fluid">
        <h5 class="mb-2">Info Jumlah</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ketua SPI</span>
                <span class="info-box-number"><?= $jumlah_kepala_spi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Auditor</span>
                <span class="info-box-number"><?= $jumlah_auditor; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Auditee</span>
                <span class="info-box-number"><?= $jumlah_auditee; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Belum dikonfirmasi</span>
                <span class="info-box-number"><?= $jumlah_belum_dikonfirmasi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       
      </div>

      <div class="col-md-12">
        <button href="javascript.void(0)" class="btn btn-primary mb-3" data-toggle="modal" data-target="#registrasi"><i class="far fa-plus-square"></i> Tambah data</button>
      </div>

      <!-- Left col -->
      <section class="col-md-12 connectedSortable">

        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              <?php foreach ($tb_user as $r) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      <!-- User Profile  -->
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead mt-2"><b><?php echo $r['nama']; ?></b></h2>
                          <?php
                          if ($r['level'] == 1) {
                            $level = 'Direktur';
                            $badge = 'primary';
                          } elseif ($r['level'] == 2) {
                            $level = 'Auditee';
                            $badge = 'success';
                          } elseif ($r['level'] == 3) {
                            $level = 'Auditor';
                            $badge = 'warning';
                          } elseif ($r['level'] == 4) {
                            $level = 'Ketua SPI';
                            $badge = 'info';
                          } else {
                            $level = 'Tidak tersedia';
                            $badge = 'danger';
                          }
                          ?>

                          <p class="text-muted text-sm"><b>Level: </b> <?= $level; ?></p>

                          <?php
                          if ($r['status'] == 1) {
                            $status = 'Aktif';
                            $badge = 'success';
                          } elseif ($r['status'] == 0) {
                            $status = 'Belum Aktif';
                            $badge = 'danger';
                          } else {
                            $status = 'Tidak tersedia';
                            $badge = 'danger';
                          }
                          ?>

                          <p class="text-muted text-sm"><b>Status: </b> <span class="badge badge-<?= $badge; ?>" href="<?= $a_tag; ?>" class="btn btn-sm bg-<?= $badge; ?>"><?= $status; ?></span></p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small mt-1"><span class="fa-li"><i class="fas fa-md fa-building"></i></span>Email Address: <?= $r['email']; ?></li>
                            <li class="small mt-1"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span> Phone #: <?= $r['no_hp']; ?></li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="../../img/user/<?= $r['foto']; ?>" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <?php
                        if ($r['status'] == 1) {
                          $konfirm = 'Sudah aktif';
                          $badge = 'secondary';
                          $a_tag = '#';
                        } else {
                          $konfirm = 'Aktifkan';
                          $badge = 'teal';
                          $a_tag = '../konfirmasi_user/index.php';
                        }
                        ?>
                        <a href="<?= $a_tag; ?>" class="btn btn-sm bg-<?= $badge; ?>">
                          <!-- <i class="fas fa-user"><?= $konfirm; ?></i> --><?= $konfirm; ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- modal register-->
  <div class=" modal fade" id="registrasi" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">

                <form class="main_form" method="post" id="form" action="" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" id="id" class="form-control" value="" name="id">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP / NPAK</label>
                      <input type="text" id="nip" class="form-control" value="" name="nip_npak">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" id="nama" class="form-control" value="" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No Telepon</label>
                      <input type="text" id="no_hp" class="form-control" value="" name="no_hp">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control" value="" name="email">
                    </div>
                    <div class="form-group">
                      <label for="level">Pilih Level</label>
                      <select class="form-control" name="level" id="level">
                        <option value="1">Direktur</option>
                        <option value="2">Auditee</option>
                        <option value="3">Auditor</option>
                        <option value="4">Ketua SPI</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" id="username" class="form-control" value="" name="username">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" id="password" class="form-control" value="" name="password">
                    </div>
                    <div class="form-group">
                      <label for="password2">Konfirmasi Password</label>
                      <input type="password" id="password2" class="form-control " value="" name="password2">
                    </div>
                    <div class="form-group">
                      <label for="foto">Pilih Foto</label><br>
                      <input type="file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                      <label for="ttd">Pilih tanda tangan</label><br>
                      <input type="file" id="ttd" name="ttd">
                      <p style="color: red;"><i><b>* Upload ttd dengan background transparan*</i></b></p>
                    </div>
                    <input type="hidden" id="status" name="status" value="0">
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <input type="submit" class="btn btn-primary send_btn" name="register" value="register"> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary send_btn" type="submit" name="register">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal register -->

          <!-- /.card-body -->
          <!-- /.card-footer -->
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