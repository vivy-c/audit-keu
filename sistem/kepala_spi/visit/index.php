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