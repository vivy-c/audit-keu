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

$tampil1 = query("SELECT * FROM tb_auditor WHERE status = 0 ");
$tampil2 = query("SELECT * FROM tb_auditee WHERE status = 0 ");

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
  $nip_npak = $data["nip_npak"];
  $jabatan = $data["jabatan"];
  $no_hp = $data["no_hp"];
  $email = $data["email"];
  $status = $data["status"];
  $ttd = $data["ttd"];

  $query = "UPDATE tb_auditor SET
    username='$username',
    password='$password',
    nama='$nama',
    nip_npak='$nip_npak',
    jabatan='$jabatan',
    no_hp='$no_hp',
    email='$email',
    status='$status',
    ttd='$ttd'
    WHERE id_auditor ='$id'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


if (isset($_POST["edit2"])) {
  if (edit2($_POST) > 0) {
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


function edit2($data)
{
  global $conn;
  $id = $data["id"];
  $username = $data["username"];
  $password = $data["password"];
  $nama_unit = $data["nama_unit"];
  $nama_ketua = $data["nama_ketua"];
  $nip_npak = $data["nip_npak"];
  $no_hp = $data["no_hp"];
  $email = $data["email"];
  $status = $data["status"];
  $ttd = $data["ttd"];

  $query = "UPDATE tb_auditee SET
    username='$username',
    password='$password',
    nama_unit='$nama_unit',
    nama_ketua='$nama_ketua',
    nip_npak='$nip_npak',
    email='$email',
    status='$status',
    ttd='$ttd'
    WHERE id ='$id'";
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
                  <h5>Tabel Konfirmasi Auditor</h5>
                  <table id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          Nama
                        </th>
                        <th>
                          NIP / NPAK
                        </th>
                        <th>
                          Jabatan
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php foreach ($tampil1 as $r) : ?>
                        <tr>
                          <td><?php echo $r['nama']; ?></td>
                          <td><?php echo  $r['nip_npak']; ?></td>
                          <td><?php echo  $r['jabatan']; ?></td>
                          <td>
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModall<?php echo $r['id_auditor']; ?>">
                              Detail
                            </a>

                            <!-- tampilan modal jadi-->
                            <div class="modal fade" id="myModall<?php echo $r['id_auditor']; ?>">
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
                                      $id = $r["id_auditor"];
                                      $data = mysqli_query($conn, "SELECT * FROM tb_auditor WHERE id_auditor = '$id'");
                                      while ($cb = mysqli_fetch_array($data)) {
                                      ?>
                                        <div class="form-group">
                                          <!-- <label for="id_user">ID User</label> -->
                                          <input type="hidden" class="form-control" id="id" name="id" value="<?= $cb["id_auditor"]; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="read" class="form-control" id="username" name="username" value="<?= $cb["username"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_unit">nama_unit</label>
                                          <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_ketua">nama_ketua</label>
                                          <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nip_npak">nip_npak</label>
                                          <input type="number" class="form-control" id="nip_npak" name="nip_npak" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_hp">no_hp</label>
                                          <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">email</label>
                                          <input type="email" class="form-control" id="email" name="email" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="status">status</label>
                                          <input type="text" class="form-control" id="status" name="status" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="ttd">ttd</label>
                                          <input type="text" class="form-control" id="ttd" name="ttd" value="<?= $cb["password"]; ?>" required readonly>
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


                            <a class="btn btn-success btn-sm mb-1" href="notif/index.php?id=<?= $row["id"]; ?>">Konfirmasi</a>

                            <a class="btn btn-danger btn-sm mb-1" name="hapus" href="hapus.php?id=<?= $r["id_auditor"]; ?>" onclick="return confirm('Mengabaikan bererti menghapus data auditor, yakin ingin melanjutkan?');">Abaikan</a>
                          </td>
                        </tr>
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


      <section class="col-md-12 connectedSortable">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5>Tabel Konfirmasi Auditee</h5>
                  <table id="datatable2" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          Nama Unit
                        </th>
                        <th>
                          Nama ketua
                        </th>
                        <th>
                          NIP / NPAK
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php foreach ($tampil2 as $r) : ?>
                        <tr>
                          <td><?php echo $r['nama_unit']; ?></td>
                          <td><?php echo  $r['nama_ketua']; ?></td>
                          <td><?php echo  $r['nip_npak']; ?></td>
                          <td>
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">
                              Detail
                            </a>

                            <!-- tampilan modal jadi-->
                            <div class="modal fade" id="myModal<?php echo $r['id']; ?>">
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
                                      $id = $r["id"];
                                      $data = mysqli_query($conn, "SELECT * FROM tb_auditee WHERE id = '$id'");
                                      while ($cb = mysqli_fetch_array($data)) {
                                      ?>
                                        <div class="form-group">
                                          <!-- <label for="id_user">ID User</label> -->
                                          <input type="hidden" class="form-control" id="id" name="id" value="<?= $cb["id"]; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="username">Username</label>
                                          <input type="read" class="form-control" id="username" name="username" value="<?= $cb["username"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_unit">nama_unit</label>
                                          <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_ketua">nama_ketua</label>
                                          <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nip_npak">nip_npak</label>
                                          <input type="number" class="form-control" id="nip_npak" name="nip_npak" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_hp">no_hp</label>
                                          <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">email</label>
                                          <input type="email" class="form-control" id="email" name="email" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="status">status</label>
                                          <input type="text" class="form-control" id="status" name="status" value="<?= $cb["password"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="ttd">ttd</label>
                                          <input type="text" class="form-control" id="ttd" name="ttd" value="<?= $cb["password"]; ?>" required readonly>
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
                            
                            <a class="btn btn-success btn-sm mb-1" href="notif/index.php?id=<?= $row["id"]; ?>">Konfirmasi</a>

                            <a class="btn btn-danger btn-sm mb-1" name="hapus" href="hapus.php?id=<?= $r["id"]; ?>" onclick="return confirm('Hapus?');">Hapus</a>


                          </td>
                        </tr>
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