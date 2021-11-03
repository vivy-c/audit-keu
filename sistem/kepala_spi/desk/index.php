<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');


$username = $_SESSION["username"];

// $tampil = query("SELECT * FROM tb_user WHERE status = 0 ");
$tb_desk = query("SELECT * FROM tb_desk");
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
      <section class="col-md-12 connectedSortable">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addPKA" data-toggle="modal">Tambah data</button>
            </div>

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
                          PKA
                        </th>
                        <th>
                          Jenis
                        </th>
                        <th>
                          Sumber Dana
                        </th>
                        <th>
                          Nominal
                        </th>
                        <th>
                          Tanggal monitoring
                        </th>
                        <th>
                          Lama monitoring
                        </th>
                        <th>
                          Tanggal visit
                        </th>
                        <th>
                          Penanggung jawab
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php $no = 1; ?>
                      <?php foreach ($tb_desk as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['id_pka']; ?></td>
                          <td><?php echo  $r['jenis']; ?></td>
                          <td><?php echo  $r['sumber_dana']; ?></td>
                          <td><?php echo  $r['nominal']; ?></td>
                          <td><?php echo  $r['tgl_monitoring']; ?></td>
                          <td><?php echo  $r['lama_monitoring']; ?></td>
                          <td><?php echo  $r['tgl_visit']; ?></td>
                          <td><?php echo  $r['penanggung_jawab']; ?></td>
                        </tr>
                        <?php $no++;  ?>
                      <?php endforeach; ?>
                    </tbody>
                    <?php  ?>
                  </table>

                </div>
              </div>

              <!-- Modal Popup untuk Add-->
              <div class="modal fade" id="addPKA">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data PKA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="id_pka" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id">Nama Auditor</label>
                                                    <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" name="id_user">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_user as $row) {
                                                        ?>
                                                            <option value="<?= $row['id_user'] ?>"><?php echo $row['nama']; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_auditee">Nama Auditee</label>
                                                    <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" name="id_auditee">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_auditee as $row) {
                                                        ?>
                                                            <option value="<?= $row['id_auditee'] ?>"><?php echo $row['nama_unit']; ?> (<?php echo $row['tanggal']; ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <!-- <div class="form-group"> -->
                                                <!-- <label for="status">Status</label> -->
                                                <input type="hidden" class="form-control" id="status" name="status" value="Belum Dilaksanakan" readonly>
                                                <!-- </div> -->

                                                <div class="form-group">
                                                    <label for="tanggal">tanggal<span style="color: red;">*</span></label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="off" required>
                                                </div>
                                                <br>
                                                <br>

                                                <button type="submit" class="btn btn-success mr-2 float-right" name="tambahDataPka">Simpan</button>
                                                <button class="btn btn-secondary mr-2 float-right">Batal</button>
                                            </form>


                                        </div>


                                    </div>
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