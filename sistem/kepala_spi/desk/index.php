<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');


$username = $_SESSION["username"];

$tb_desk = query("SELECT * FROM tb_desk");


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
              <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#tambahDesk" data-toggle="modal">Tambah data</button>
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
                          Tanggal PKA
                        </th>
                        <th>
                          Jenis
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
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php
                      $no = 0;
                      $modal = mysqli_query($conn, "SELECT a.id_desk,b.tanggal,a.jenis,a.sumber_dana,a.nominal,a.tgl_monitoring,a.lama_monitoring,a.tgl_visit,a.penanggung_jawab,c.nama FROM tb_desk as a,tb_pka as b, tb_user as c WHERE a.id_pka=b.id_pka");
                      while ($r = mysqli_fetch_array($modal)) {
                      ?>
                        <?php $no = 1; ?>
                        <?php foreach ($modal as $r) : ?>
                          <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?php echo $r['tanggal']; ?></td>
                            <td><?php echo  $r['jenis']; ?></td>
                            <td><?php echo  $r['tgl_monitoring']; ?></td>
                            <td><?php echo  $r['lama_monitoring']; ?></td>
                            <td><?php echo  $r['tgl_visit']; ?></td>
                            <td><?php echo  $r['penanggung_jawab']; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_pka']; ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_pka']; ?>"><i class="fas fa-pen"></i></a>
                                <a href="hapus.php?id_pka=<?= $r["id_pka"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>
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
              <div class="modal fade" id="tambahDesk">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Desk</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id_desk" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                          <label for="id">Tanggal PKA<span style="color: red;">*</span></label>
                          <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" name="id_user">
                            <option value=""></option>
                            <?php foreach ($modal as $row) {
                            ?>
                              <option value="<?= $row['id_pka'] ?>"><?php echo $row['tanggal']; ?> </option>
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
                        <div class="form-group">
                          <label for="penanggung_jawab">Penanggung Jawab<span style="color: red;">*</span></label>
                          <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" name="id_user">
                            <option value=""></option>
                            <?php foreach ($modal as $row) {
                            ?>
                              <option value="<?= $row['penanggung_jawab'] ?>"><?php echo $row['nama']; ?> </option>
                            <?php } ?>
                          </select>
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
              <!-- akhir modal add -->

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