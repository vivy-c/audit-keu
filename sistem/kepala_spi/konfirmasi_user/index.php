<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
$judul='KEPALA-SPI';
$page='Konfirmasi User';

    function index($judul='KEPALA SPI',$page='Konfirmasi User')
    {
        // echo "Halo saya $nama, saya seorang $page";
        $data['judul']=$judul;
        $data['page']=$page;
    }

// $tampil = query("SELECT * FROM tb_user WHERE status = 0 ");
$tb_user = query("SELECT * FROM tb_user WHERE status = 0 ");
// untuk alert
if (isset($_POST["edit1"])) {
  if (edit1($_POST) > 0) {
    echo "
      <script>
      alert('Data Berhasil Diedit!');
      document.location.href = 'index.php';
      </script>
      ";
  } else {
    echo "
      <script>
          alert('Data Gagal Diedit!');
          document.location.href = 'index.php';
      </script>
      ";
  }
}

function edit1($data)
{
  global $conn;
  $id = $data["id_auditor"];
  $username = $data["username"];
  $password = $data["password"];
  $nama = $data["nama"];
  $nama = $data["nama"];
  $jabatan = $data["jabatan"];
  $no_hp = $data["no_hp"];
  $email = $data["email"];
  $status = $data["status"];
  $level = $data["level"];

  $query = "UPDATE tb_auditor SET
    username='$username',
    password='$password',
    nama='$nama',
    nama='$nama',
    jabatan='$jabatan',
    no_hp='$no_hp',
    email='$email',
    status='$status',
    level='$level'
    WHERE id_auditor ='$id'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


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
        <div class="container-fluid">
          <div class="row">
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
                          Nama
                        </th>
                        <th>
                          NIP / NPAK
                        </th>
                        <th>
                          Level
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php $no = 1; ?>
                      <?php foreach ($tb_user as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['nama']; ?></td>
                          <td><?php echo  $r['nip_npak']; ?></td>

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
                            $level = 'Tidak tersedia';
                            $badge = 'danger';
                          }
                          ?>
                    
                          <td><span class="badge badge-<?= $badge; ?>"><?= $level; ?></span></td>

                          <?php
                          if ($r['status'] == 1) {
                            $status = 'Aktif';
                            $badge = 'success';
                          } elseif ($r['status'] == 0)  {
                            $status = 'Belum Aktif';
                            $badge = 'danger';
                          } else {
                            $status = 'Tidak tersedia';
                            $badge = 'danger';
                          }
                          ?>
                    
                          <td><span class="badge badge-<?= $badge; ?>"><?= $status; ?></span></td>
                          <td class="">
                          <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $r['id_user']; ?>"><i class="fas fa-eye"></i></a>

                            <!-- tampilan modal jadi-->
                            <div class="modal fade" id="myModal<?php echo $r['id_user']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Data User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- form start -->
                                    <form action="" method="POST">
                                      <?php
                                      $id_user = $r["id_user"];
                                      $data = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
                                      while ($cb = mysqli_fetch_array($data)) {
                                      ?>
                                        <div class="form-group">
                                          <!-- <label for="id">ID User</label> -->
                                          <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $cb["id_user"]; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="foto">foto</label><br>
                                          <?php echo "<img src='../../img/user/$cb[foto]' width='70'  />"; ?>
                                        </div>
                                        <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="read" class="form-control" id="username" name="username" value="<?= $cb["username"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" value="<?= $cb["nama"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nip_npak">nip_npak</label>
                                          <input type="number" class="form-control" id="nip_npak" name="nip_npak" value="<?= $cb["nip_npak"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama">nama</label>
                                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $cb["nama"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_hp">no_hp</label>
                                          <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $cb["no_hp"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">email</label>
                                          <input type="email" class="form-control" id="email" name="email" value="<?= $cb["email"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="level">level</label>
                                          <input type="text" class="form-control" id="level" name="level" value="<?= $cb["level"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="ttd">ttd</label><br>
                                          <?php echo "<img src='../../img/user/$cb[ttd]' width='70'  />"; ?>
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

                            <a href="hapus.php?id=<?= $r["id_user"]; ?>" name="hapus" class="btn btn-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>
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
            </div>
          </div>
        </div>

      </section>

<!--  -->


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