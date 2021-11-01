<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('functions.php');


$username = $_SESSION["username"];

$sql = query("SELECT * FROM tb_user WHERE username='$username'");

// $foto = $sql['foto'];

if (isset($_POST["ubahData"])) {
  if (ubah($_POST) > 0) {
    if (!isset($_SESSION['username'])) {
      header("Location: ../session/index.php");
    }else {
      header("Location: index.php");
    }
      echo "<script>
      alert('data berhasil diperbarui');
      document.location.href = '../dashboard/index.php';
      </script>"
  
 
  ;
  } 
  else {
  echo "<script>
    alert('data gagal diperbarui');
    document.location.href = '../dashboard/index.php';
  </script>";
  }
  }

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


      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah_pka; ?></h3>

            <p>Program Kerja Audit</p>
          </div>
          <div class="icon">
            <i class="ion ion-easel"></i>
          </div>
          <a href="../pka/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $jumlah_lha; ?></h3>
            <p>Laporan Hasil Audit</p>
          </div>
          <div class="icon">
            <i class="ion ion-laptop"></i>
          </div>
          <a href="../lha/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $jumlah_ba; ?></h3>

            <p>Berita Acara</p>
          </div>
          <div class="icon">
            <i class="ion ion-card"></i>
          </div>
          <a href="../ba/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#muncul" data-toggle="tab">Biodata</a></li>
              <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Biodata</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Foto & Ttd</a></li> -->
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
      <?php
              
              ?>
              <!-- section muncul -->
              <div class="tab-pane active" id="muncul">
                <div class="col-md-12">
                  <div class="card card-default card-outline">
                    <div class="card-body box-profile">
                      <?php foreach ($sql as $r) : ?>
                        <div class="text-center">

                          <img class="profile-user-img img-fluid img-circle" src="../../img/user/<?= $r['foto']; ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $r['nama']; ?></h3>

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

                        <p class="text-muted text-center"><?= $level; ?></p>

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
                            <input type="text" id="username" class="form-control" value="<?= $r['username']; ?>" name="username" >
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" value="<?= $r['password']; ?>" name="password">
                          </div>
                          <div class="form-group">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" id="password2" class="form-control " value="<?= $r['password2']; ?>" name="password2">
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
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>

                <!-- /.post -->
              </div>
              <!-- akhir section muncul -->

              <!--  -->

            </div>
          </div>
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