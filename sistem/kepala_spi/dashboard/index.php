<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('functions.php');

$username = $_SESSION["username"];



?>

<style>
  .container {
    display: flex;
    flex-direction: column;
  }


  .box {
    width: 100px;
    margin: 0 10px;
    box-shadow: 0 0 20px 2px rgba(0, 0, 0, .1);
    transition: 1s;

  }

  .box img {
    display: block;
    width: 100%;
    border-radius: 5px;
  }

  .box:hover {
    transform: scale(1.6);
    z-index: 2;
  }
</style>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-3 ">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah_pka; ?></h3>
            <p>Program Kerja Audit(PKA)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../pka/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

      </div>
      <!-- ./col -->

      <div class="col-lg-3 ">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo $jumlah_desk; ?></h3>
            <p>Jumlah Data Desk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../desk/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 ">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah_visit; ?></h3>

            <p>Jumlah Data Visit</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../visit/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 ">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo $jumlah_tha; ?></h3>

            <p>Temuan Hasil Audit(THA)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../tha/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 ">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah_lha; ?></h3>

            <p>Laporan Hasil Audit(LHA)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../lha/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 ">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo $jumlah_ba; ?></h3>

            <p>Berita Acara</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../ba/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 ">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah_user; ?></h3>

            <p>Jumlah User</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="../user/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white" style="background: url('../../img/photo1.png') center center;">

          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="../../img/user/<?= $foto; ?>" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12 border-right">
                <div class="description-block">
                  <?php foreach ($sql as $r) : ?>
                    <?php
                    if ($r['level'] == 1) {
                      $level = 'Direktur';
                    } elseif ($r['level'] == 2) {
                      $level = 'Auditee';
                    } elseif ($r['level'] == 3) {
                      $level = 'Auditor';
                    } elseif ($r['level'] == 4) {
                      $level = 'Ketua SPI';
                    } else {
                      $level = 'Belum dikonfirmasi';
                    }
                    ?>
                    <h5 class="description-text"><?= $nama; ?></h5>
                    <span class="description-header"><?= $level; ?></span>
                </div>
                <!-- /.description-block -->
              </div>

              <div class="card-body box-profile">

                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="hidden" name="id_user" class="form-control" value="<?= $r['id_user']; ?>">
                    <input type="hidden" name="fotoLama" class="form-control" value="<?= $r['foto']; ?>">
                    <input type="hidden" name="ttdLama" class="form-control" value="<?= $r['ttd']; ?>">
                    <input type="hidden" name="status" class="form-control" value="<?= $r['status']; ?>">
                    <input type="hidden" name="level" class="form-control" value="<?= $r['level']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nip">NIP / NPAK</label>
                    <input type="text" id="nip_npak" class="form-control" value="<?= $r['nip_npak']; ?>" name="nip_npak">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control" value="<?= $r['nama']; ?>" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No Telepon</label>
                    <input type="text" id="no_hp" class="form-control" value="<?= $r['no_hp']; ?>" name="no_hp">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" value="<?= $r['email']; ?>" name="email">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" value="<?= $r['username']; ?>" name="username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" value="<?= $r['password']; ?>" name="password">
                    <input type="hidden" id="password2" class="form-control " value="<?= $r['password2']; ?>" name="password2">
                  </div>

                  <div class="form-group">
                    <p><b>Foto anda sekarang:</b></p>
                    <div class="box">
                      <img src="../../img/user/<?= $r['foto']; ?>" alt="foto anda sekarang" width="100">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="foto">Ubah Foto</label>
                    <input type="file" id="foto" name="foto" value="<?= $r['foto']; ?>">
                  </div>
                  <div class="form-group">
                    <p><b>Ttd anda sekarang:</b></p>
                    <div class="box">
                      <img src="../../img/user/<?= $r['ttd']; ?>" alt="foto anda sekarang" width="100">
                    </div>
                    <div class="form-group">
                      <label for="ttd">Ubah tanda tangan</label>
                      <input type="file" id="ttd" name="ttd" value="<?= $r['ttd']; ?>">
                      <p style="color: red;"><i>* Upload ttd dengan background transparan*</i></p>
                    </div>
                    <div class="form-group row  float-left">
                      <div class="col-sm-4">
                        <button type="submit" name="ubahData" class="btn btn-success">Perbarui</button>
                      </div>
                    </div>
                </form>
              <?php endforeach; ?>
              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>

            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
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