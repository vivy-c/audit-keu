<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$username = $_SESSION["username"];

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
                          Tanggal THA
                        </th>
                        <th>
                          Tanggal Visit
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
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody id="modal-data">
                    <?php
                    $no = 0;
                      $tb_tha = mysqli_query($conn, "SELECT a.id_tha,a.id_visit,a.tgl_tha,a.catatan,a.dasar_hukum,a.penyebab,a.akibat,a.rekomendasi,a.tanggapan_auditee,a.rencana_tindak_lanjut,a.persetujuan,b.tgl_visit FROM tb_tha as a,tb_visit as b WHERE a.id_visit=b.id_visit");
                      while ($r = mysqli_fetch_array($tb_tha)) {
                      $no++;
                    ?>
                      <?php foreach ($tb_tha as $r) : ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <td><?php echo $r['id_tha']; ?></td>
                          <td><?php echo  $r['id_visit']; ?></td>
                          <td><?php echo  $r['tgl_tha']; ?></td>
                          <td><?php echo  $r['tgl_visit']; ?></td>
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