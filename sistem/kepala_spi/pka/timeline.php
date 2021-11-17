<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('function.php');

$pka = query("SELECT a.id_pka,b.id_user,b.nama,c.id_auditee,c.nama_unit,a.status,a.tanggal FROM tb_pka as a,tb_user as b,tb_auditee as c WHERE a.id_user=b.id_user and a.id_auditee=c.id_auditee ORDER BY tanggal ASC");

?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <?php foreach ($pka as $r) : ?>
                            <!-- timeline time label -->
                            <div class="time-label">
                            <?php
                          if ($r['status'] == 'Belum Dilaksanakan') {
                            $status ='info';
                          } elseif ($r['status'] == 'Terealisasi') {
                            $status = 'success';
                          } elseif ($r['status'] == 'Tidak Terealisasi') {
                            $status = 'danger';
                          } else {
                            $status = 'secondary';
                          }
                          ?>
                                <span class="bg-<?= $status;?>"><?= $r['tanggal']; ?></span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-envelope bg-default"></i>
                                <div class="timeline-item">
                                    
                                    <h3 class="timeline-header"><a href="#">Status  </a><?= $r['status'];?></h3>

                                    <div class="timeline-body">
                                        <p>Auditor : <?= $r['nama']; ?></p>
                                        <p>Auditee : <?= $r['nama_unit']; ?></p>
                                    </div>
                                    <!-- <div class="timeline-footer">
                                        <a class="btn btn-primary btn-sm">Read more</a>
                                    </div> -->
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- /.col -->


                    


                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php include('../../template/footer.php'); ?>