<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');


$username = $_SESSION["username"];

// $tampil = query("SELECT * FROM tb_user WHERE status = 0 ");
$tb_tha = query("SELECT * FROM tb_tha");
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
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <h5>Tabel Temuan Hasil Audit Keuangan</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          THA
                        </th>
                        <th>
                          Visit
                        </th>
                        <th>
                          Tanggal
                        </th>
                        <th>
                          Catatan
                        </th>
                        <th>
                          Dasar Hukum
                        </th>
                        <th>
                          Penyebab
                        </th>
                        <th>
                          Akibat
                        </th>
                        <th>
                          Rekomendasi
                        </th>
                        <th>
                          Tanggapan Auditee
                        </th>
                        <th>
                          Rencana Tindak Lanjut
                        </th>
                        <th>
                          Persetujuan
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                      <?php $no = 1; ?>
                      <?php foreach ($tb_tha as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['id_tha']; ?></td>
                          <td><?php echo  $r['id_visit']; ?></td>
                          <td><?php echo  $r['tanggal']; ?></td>
                          <td><?php echo  $r['catatan']; ?></td>
                          <td><?php echo  $r['dasar_hukum']; ?></td>
                          <td><?php echo  $r['penyebab']; ?></td>
                          <td><?php echo  $r['akibat']; ?></td>
                          <td><?php echo  $r['rekomendasi']; ?></td>
                          <td><?php echo  $r['tanggapan_auditee']; ?></td>
                          <td><?php echo  $r['rencana_tindak_lanjut']; ?></td>
                          <td><?php echo  $r['persetujuan']; ?></td>
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
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php include('../../template/footer.php'); ?>