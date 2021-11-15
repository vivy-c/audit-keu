<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');


$username = $_SESSION["username"];

// $tampil = query("SELECT * FROM tb_user WHERE status = 0 ");
$tb_ba = query("SELECT * FROM tb_ba");
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
                  <h5>Tabel Berita Acara</h5>
                  <table id="datatable" class="table table-striped table-bordered table-hover table-wrapped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Tanggal LHA
                        </th>
                        <th>
                          Tanggal Berita Acara
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                    <?php
                    $no = 0;
                      $tb_ba = mysqli_query($conn, "SELECT a.id_ba,a.id_lha,a.tgl_ba,b.id_lha,b.tgl_lha FROM tb_ba as a,tb_lha as b WHERE a.id_lha=b.id_lha");
                      while ($r = mysqli_fetch_array($tb_ba)) {
                      $no++;
                    ?>
                      <?php foreach ($tb_ba as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo  $r['tgl_lha']; ?></td>
                          <td><?php echo  $r['tgl_ba']; ?></td>
                        <?php $no++;  ?>
                      <?php endforeach; ?>
                    </tbody>
                    <?php } ?>
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