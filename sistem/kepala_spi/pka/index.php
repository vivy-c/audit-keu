<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');
include('function.php');

?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <p>PKA Belum Dilaksanakan</p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="<?= $persentase1; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $persentase1; ?>%">
                                            <span class=""><?= $persentase1; ?>%</span>
                                        </div>
                                    </div>
                                    <p>PKA Terealisasi</p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?= $persentase2; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $persentase2; ?>%">
                                            <span class=""><?= $persentase2; ?>%</span>
                                        </div>
                                    </div>
                                    <p>PKA Tidak Terealisasi</p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?= $persentase3; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $persentase3; ?>%">
                                            <span class=""><?= $persentase3; ?>%</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-12">
                            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addPKA" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
                        </div>

                        <div class="col-12">

                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Nama Auditor
                                                </th>
                                                <th>
                                                    Nama Unit
                                                </th>
                                                <th>
                                                    Status
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
                                            <?php
                                            $no = 0;
                                            $modal = mysqli_query($conn, "SELECT a.id_pka,b.id_user,b.nama,c.id_auditee,c.nama_unit,a.status,a.tanggal FROM tb_pka as a,tb_user as b,tb_auditee as c WHERE a.id_user=b.id_user and a.id_auditee=c.id_auditee ORDER BY status ASC");
                                          while ($r = mysqli_fetch_array($modal)) {
                                                $no++;
                                            ?>
                                                <?php foreach ($modal as $r) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $no; ?></th>
                                                        <td><?php echo $r['nama']; ?></td>
                                                        <td><?php echo $r['nama_unit']; ?></td>
                                                        <?php
                                                        if ($r['status'] == 'Belum Dilaksanakan') {
                                                            $status = 'Belum Dilaksanakan';
                                                            $badge = 'info';
                                                        } elseif ($r['status'] == 'Terealisasi') {
                                                            $status = 'Terealisasi';
                                                            $badge = 'success';
                                                        } else {
                                                            $status = 'Tidak Terealisasi';
                                                            $badge = 'danger';
                                                        }
                                                        ?>
                                                        <td><span class="badge badge-<?= $badge; ?>"><?= $status; ?></td>
                                                        <td><?php echo  $r['tanggal']; ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm">
                                                                <a class="btn btn-outline-primary btn-sm text-primary" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_pka']; ?>">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>

                                                                <!-- tampilan modal jadi-->
                                                                <div class="modal fade" id="myModaldetail<?php echo $r['id_pka']; ?>">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Detail Data PKA</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <!-- form start -->
                                                                                <form action="" method="POST">

                                                                                    <div class="form-group">
                                                                                        <label for="id_pka">ID PKA</label>
                                                                                        <input type="text" class="form-control" id="id_pka" name="id_pka" value="<?= $r["id_pka"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nama">Nama Auditor</label>
                                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $r["nama"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nama_unit">Nama Auditee</label>
                                                                                        <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?= $r["nama_unit"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="status">Status</label>
                                                                                        <input type="text" class="form-control" id="status" name="status" value="<?= $r["status"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tanggal">tanggal</label>
                                                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $r["tanggal"]; ?>" required readonly>
                                                                                    </div>


                                                                            </div>
                                                                            <div class="modal-footer float-right">
                                                                                <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                                <!-- /.modal -->


                                                                <a class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#myModal<?php echo $r['id_pka']; ?>"><i class="fas fa-pen"></i></a>

                                                                <!-- tampilan modal jadi-->
                                                                <div class="modal fade" id="myModal<?php echo $r['id_pka']; ?>">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Edit Data PKA</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <!-- form start -->
                                                                                <form action="" method="POST">
                                                                                    <div class="form-group">
                                                                                        <!-- <label for="id_user">ID User</label> -->
                                                                                        <input type="hidden" class="form-control" id="id_pka" name="id_pka" value="<?= $r["id_pka"]; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_user">Nama Auditor</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" id="id_user" name="id_user">
                                                                                        <option selected value="<?= $r["id_user"]; ?>"><?= $r['nama'] ?></option>
                                                                                            <?php
                                                                                            $sql="SELECT * FROM tb_user WHERE status=1 AND level=3";
                                                                                            $hasil=mysqli_query($conn,$sql);
                                                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                                                ?>
                                                                                                <option value="<?= $data['id_user'] ?>"><?php echo $data['nama']; ?> </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_auditee">Nama Auditee</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Auditee" style="width: 100%;" id="id_auditee" name="id_auditee">
                                                                                        <option selected value="<?= $r["id_auditee"]; ?>"><?= $r['nama_unit'] ?></option>
                                                                                        <?php
                                                                                            $sql="SELECT * FROM tb_auditee";
                                                                                            $hasil=mysqli_query($conn,$sql);
                                                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                                                ?>
                                                                                                <option value="<?= $data['id_auditee'] ?>"><?php echo $data['nama_unit']; ?> (<?php echo $data['tanggal']; ?>)</option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="status">Status</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Status" style="width: 100%;" id="status" name="status">
                                                                                            <option value="<?= $r['status'] ?>"><?= $r['status'] ?></option>
                                                                                            <option value="Terealisasi">Terealisasi</option>
                                                                                            <option value="Tidak Terealisasi">Tidak Terealisasi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tanggal">tanggal</label>
                                                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $r["tanggal"]; ?>" required readonly>
                                                                                    </div>
                                                                                    <div class="modal-footer float-right">
                                                                                        <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                                                                        <button type="submit" name="ubahDataPka" class="btn btn-success">Perbarui</button>
                                                                                        
                                                                                    </div>
                                                                                    </form>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                                <!-- /.modal -->
                                                                <a href="hapus.php?id_pka=<?= $r["id_pka"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>

                                                            </div>
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
                                                    <select class="form-control " data-placeholder="Pilih Auditee" style="width: 100%;" name="id_auditee">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_auditee as $row) {
                                                        ?>
                                                            <option value="<?= $row['id_auditee'] ?>"><?php echo $row['nama_unit']; ?> (<?php echo $row['tanggal']; ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="status" name="status" value="Belum Dilaksanakan">
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

            <!-- /.Left col -->
            <div class="container-fluid">

        
      </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php include('../../template/footer.php'); ?>