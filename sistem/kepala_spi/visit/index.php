<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');


$username = $_SESSION["username"];

// $tampil = query("SELECT * FROM tb_user WHERE status = 0 ");
$tb_visit = query("SELECT * FROM tb_visit");
// $id_user=$_GET["id_user"];
// $q=query("SELECT * FROM tb_user WHERE id_user = $id_user")[0];


if (isset($_POST["status"])) {
  if (status($_POST) > 0) {
     echo "<script>
     alert('User berhasil diaktifkan');
     document.location.href='../user/index.php';
     </script>";
  } else {
     echo "<script>
     alert('User gagal diaktifkan');
     document.location.href='../user/index.php';
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
      <!-- Left col -->
        <div class="container-fluid">
          <div class="row">
            <div class="card-body mt-0">
              <div class="callout callout-default my-0">
              <h5>Petunjuk!</h5>
              <p>Data visit memberikan info mengenai data 
                  Data Desk berupa data referensi tahun sebelumnya dan data kunjungan.</p>
              </div>
            </div>

            <div class="col-md-12">
                            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addVisit" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
                        </div>


            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <h5>Tabel Data Visit</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Visit
                        </th>
                        <th>
                          Desk
                        </th>
                        <th>
                          Tanggal
                        </th>
                        <th>
                          Isi 
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php $no = 1; ?>
                      <?php foreach ($tb_visit as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['id_visit']; ?></td>
                          <td><?php echo  $r['id_desk']; ?></td>
                          <td><?php echo  $r['tanggal']; ?></td>
                          <td><?php echo  $r['isi']; ?></td>
                        </tr>
                        <?php $no++;  ?>
                      <?php endforeach; ?>
                    </tbody>
                    <?php  ?>
                  </table>

                </div>
              </div>


              <!-- Modal Popup untuk Add-->
              <div class="modal fade" id="addVisit">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Visit</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="id_visit" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_desk">Tanggal Visit<span style="color: red;">*</span></label>
                                                    <select class="form-control " data-placeholder="Pilih Tanggal Visit" style="width: 100%;" name="id_pka">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_visit as $row) {
                                                        ?>
                                                            <option value="<?= $row['id_desk'] ?>"> <?php echo $row['tgl_visit']; ?> (ID Desk : <?= $row['id_desk']; ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">jenis<span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sumber_dana">Sumber Dana<span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nominal">Nominal<span style="color: red;">*</span></label>
                                                    <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_monitoring">Tanggal Monitoring<span style="color: red;">*</span></label>
                                                    <input type="date" class="form-control" id="tgl_monitoring" name="tgl_monitoring" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lama_monitoring">Lama Monitoring<span style="color: red;">*</span></label>
                                                    <input type="number" class="form-control" id="lama_monitoring" name="lama_monitoring" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_visit">Tanggal Visit<span style="color: red;">*</span></label>
                                                    <input type="date" class="form-control" id="tgl_visit" name="tgl_visit" autocomplete="off" required>
                                                </div>
                                                <br>
                                                <br>

                                                <button type="submit" class="btn btn-success mr-2 float-right" name="tambahDesk">Simpan</button>
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