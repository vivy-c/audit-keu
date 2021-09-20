<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$tb_user = query("SELECT * FROM tb_user");
$judul='Data User';

// // untuk alert
// if (isset($_POST["edit"])) {
//   if (edit($_POST) > 0) {
//     echo "
//       <script>
//       alert('Data Berhasil Diedit!');
//       document.location.href = 'index.php';
//       </script>
//       ";
//   } else {
//     echo "
//       <script>
//           alert('Data Gagal Diedit!');
//           document.location.href = 'index.php';
//       </script>
//       ";
//   }
// }

// function edit($data)
// {
//   global $conn;
//   $id = $data["id_user"];
//   $username = $data["username"];
//   $password = $data["password"];
//   $nama = $data["nama"];
//   $nip_npak = $data["nip_npak"];
//   $jabatan = $data["jabatan"];
//   $no_hp = $data["no_hp"];
//   $email = $data["email"];
//   $status = $data["status"];
//   $ttd = $data["ttd"];

//   $query = "UPDATE tb_user SET
//     username='$username',
//     password='$password',
//     nama='$nama',
//     nip_npak='$nip_npak',
//     jabatan='$jabatan',
//     no_hp='$no_hp',
//     email='$email',
//     status='$status',
//     ttd='$ttd'
//     WHERE id_user ='$id'";
//   mysqli_query($conn, $query);
//   return mysqli_affected_rows($conn);
// }


?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-md-12 connectedSortable">

        <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php foreach ($tb_user as $r) : ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  User Profile 
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead mt-2"><b><?php echo $r['nama']; ?></b></h2>
                      <?php
                          if ($r['level'] == 1) {
                            $level = 'Direktur';
                            $badge = 'primary';
                          } elseif ($r['level'] == 2)  {
                            $level = 'Auditee';
                            $badge = 'success';
                          } elseif ($r['level'] == 3)  {
                            $level = 'Auditor';
                            $badge = 'warning';
                          } elseif ($r['level'] == 4)  {
                            $level = 'Ketua SPI';
                            $badge = 'info';
                          } else {
                            $level = 'Belum dikonfirmasi';
                            $badge = 'danger';
                          }
                          ?>
                    
                      <p class="text-muted text-sm"><b>Level: </b> <span class="badge badge-<?= $badge; ?>"><?= $level; ?></span></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small mt-1"><span class="fa-li"><i class="fas fa-md fa-building"></i></span>Email Address: <?=$r['email'];?></li>
                        <li class="small mt-1"><span class="fa-li"><i class="fas fa-md fa-phone"></i></span> Phone #: <?=$r['no_hp'];?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../img/user/foto_<?=$r['username'];?>.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <?php
                          if ($r['level'] == 1) {
                            $konfirm= 'Sudah aktif';
                            $badge = 'secondary';
                          } elseif ($r['level'] == 2)  {
                            $konfirm= 'Sudah aktif';
                            $badge = 'secondary';
                          } elseif ($r['level'] == 3)  {
                            $konfirm= 'Sudah aktif';
                            $badge = 'secondary';
                          } elseif ($r['level'] == 4)  {
                            $konfirm= 'Sudah aktif';
                            $badge = 'secondary';
                          } else {
                            $konfirm= 'Aktifkan';
                            $badge = 'teal';
                          }
                          ?>
                    <a href="#" class="btn btn-sm bg-<?=$badge;?>">
                      <i class="fas fa-comments"> <?=$konfirm;?></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                      <i class="fas fa-user"></i> Hapus
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
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