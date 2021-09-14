<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$tb_auditee = query("SELECT * FROM tb_auditee");

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
//   $id = $data["id"];
//   $username = $data["username"];
//   $password = $data["password"];
//   $nama_unit = $data["nama_unit"];
//   $id = $data["id"];
//   $nip_npak = $data["nip_npak"];
//   $no_hp = $data["no_hp"];
//   $email = $data["email"];
//   $status = $data["status"];
//   $ttd = $data["ttd"];

//   $query = "UPDATE tb_auditee SET
//     username='$username',
//     password='$password',
//     nama_unit='$nama_unit',
//     id='$id',
//     nip_npak='$nip_npak',
//     email='$email',
//     status='$status',
//     ttd='$ttd'
//     WHERE id ='$id'";
//   mysqli_query($conn, $query);
//   return mysqli_affected_rows($conn);
// }


?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">

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
                  <table id="datatable" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>
                          Nama ketua
                        </th>
                        <th>
                          Nama Unit
                        </th>
                        <th>
                          Tanggal
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php foreach ($tb_auditee as $r) : ?>
                        <tr>
                          <td><?php echo $r['id']; ?></td>
                          <td><?php echo $r['nama_unit']; ?></td>
                          <td><?php echo  $r['tanggal']; ?></td>
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
                                      $id = $r["id_auditee"];
                                      $data = mysqli_query($conn, "SELECT * FROM tb_auditee WHERE id_auditee = '$id'");
                                      while ($cb = mysqli_fetch_array($data)) {
                                      ?>
                                        <div class="form-group">
                                          <!-- <label for="id_user">ID User</label> -->
                                          <input type="hidden" class="form-control" id="id_auditee" name="id_auditee" value="<?= $cb["id_auditee"]; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="id">nama_ketua</label>
                                          <input type="text" class="form-control" id="id" name="id" value="<?= $cb["id"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_unit">nama_unit</label>
                                          <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $cb["nama_unit"]; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="tanggal">tanggal</label>
                                          <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $cb["tanggal"]; ?>" required readonly>
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

                            <a class="btn btn-danger btn-sm" name="hapus" href="hapus.php?id=<?= $r["id"]; ?>" onclick="return confirm('Yakin mengapus data?');">Hapus</a>


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