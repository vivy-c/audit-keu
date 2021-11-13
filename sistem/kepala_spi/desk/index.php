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
                        <div class="card-body mt-0">
                            <div class="callout callout-default my-0">
                            <h5>Petunjuk!</h5>
                            <p>Data desk memberikan info mengenai data 
                                Program Kerja Audit (PKA) dan data referensi tahun sebelumnya.</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#addDesk" data-toggle="modal"><i class="far fa-plus-square"></i> Tambah data</button>
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
                                            $modal = mysqli_query($conn, "SELECT a.id_desk,a.id_pka,b.id_pka,b.tanggal,a.jenis,a.sumber_dana,a.nominal,a.tgl_monitoring,a.lama_monitoring,c.nama,b.id_user,c.id_user,d.nama_unit,b.status,c.foto FROM tb_desk as a,tb_pka as b, tb_user as c,tb_auditee as d WHERE a.id_pka=b.id_pka AND b.id_user=c.id_user AND b.id_auditee=d.id_auditee");
                                            while ($r = mysqli_fetch_array($modal)) {
                                                $no++;
                                            ?>
                                                <?php foreach ($modal as $r) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $no; ?></th>
                                                        <td><?php echo $r['tanggal']; ?></td>
                                                        <td><?php echo  $r['jenis']; ?></td>
                                                        <td><?php echo  $r['tgl_monitoring']; ?></td>
                                                        <td><?php echo  $r['lama_monitoring']; ?></td>
                                                        <td><?php echo  $r['nama']; ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm">
                                                                <a class="btn btn-outline-warning btn-sm text-warning" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_desk']; ?>">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>

                                                                <!-- tampilan modal jadi-->
                                                                <div class="modal fade" id="myModaldetail<?php echo $r['id_desk']; ?>">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Detail Data Desk</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" class="form-control" name="id_desk" autocomplete="off" required readonly>
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group text-center img-fluid img-circle">
                                                                                        <img src="../../img/user/<?= $r["foto"]; ?>" alt="foto ketua unit" width="50" class="img-circle elevation-2">
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
                                                                                        <label for="id_pka">Tanggal PKA</label>
                                                                                        <select class="form-control " data-placeholder="Pilih PKA" style="width: 100%;" name="id_pka" readonly>
                                                                                            <option value=""><?= $r['tanggal'];?> ( Auditor : <?= $r['nama'];?> )</option>
                                                                                            
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="jenis">jenis</label>
                                                                                        <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" value="<?= $r['jenis'];?>" required readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="sumber_dana">Sumber Dana</label>
                                                                                        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" autocomplete="off" value="<?= $r['sumber_dana'];?>"  required readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nominal">Nominal</label>
                                                                                        <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off" value="<?= $r['nominal'];?>" required readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tgl_monitoring">Tanggal Monitoring</label>
                                                                                        <input type="date" class="form-control" id="tgl_monitoring" name="tgl_monitoring" autocomplete="off" value="<?= $r['tgl_monitoring'];?>"  required readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lama_monitoring">Lama Monitoring</label>
                                                                                        <input type="number" class="form-control" id="lama_monitoring" name="lama_monitoring" autocomplete="off" value="<?= $r['lama_monitoring'];?>"  required readonly>
                                                                                    </div>
                                                                                </form>


                                                                            </div>
                                                                            <div class="modal-footer float-right">
                                                                                <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                                                                <!-- <button type="edit" id="edit" name="edit" value="edit" class="btn btn-primary">Simpan Perubahan</button> -->
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
                                                                                <h4 class="modal-title">Edit Data Desk</h4>
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
                                                                                        <label for="id_pka">Tanggal PKA</label>
                                                                                        <select class="form-control " data-placeholder="Pilih PKA" style="width: 100%;" name="id_pka">
                                                                                            <option value=""><?= $r['tanggal'];?> ( Auditor : <?= $r['nama'];?> )</option>
                                                                                            <?php foreach ($tb_pka as $row) {
                                                                                            ?>
                                                                                                <option value="<?= $row['id_pka'] ?>"> <?php echo $row['tanggal']; ?> (Auditor : <?= $row['nama']; ?>)</option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="jenis">jenis</label>
                                                                                        <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" value="<?= $r['jenis'];?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="sumber_dana">Sumber Dana</label>
                                                                                        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" autocomplete="off" value="<?= $r['sumber_dana'];?>"  required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nominal">Nominal</label>
                                                                                        <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off" value="<?= $r['nominal'];?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tgl_monitoring">Tanggal Monitoring</label>
                                                                                        <input type="date" class="form-control" id="tgl_monitoring" name="tgl_monitoring" autocomplete="off" value="<?= $r['tgl_monitoring'];?>"  required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="lama_monitoring">Lama Monitoring</label>
                                                                                        <input type="number" class="form-control" id="lama_monitoring" name="lama_monitoring" autocomplete="off" value="<?= $r['lama_monitoring'];?>"  required>
                                                                                    </div>

                                                                                    <a href="index.php" type="button" class="btn btn-secondary ml-2 float-right" data-dismiss="modal">Kembali</a>
                                                                                    <button type="submit" name="ubahDesk" class="btn btn-success float-right">Perbarui</button>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                                <!-- /.modal -->
                                                                <a href="hapus.php?id_desk=<?= $r["id_desk"]; ?>" name="hapus" class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus permanen?');"><i class="fas fa-trash"></i></a>

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
                            <div class="modal fade" id="addDesk">
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
                                                    <label for="id_pka">Tanggal PKA<span style="color: red;">*</span></label>
                                                    <select class="form-control " data-placeholder="Pilih PKA" style="width: 100%;" name="id_pka">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_pka as $row) {
                                                        ?>
                                                            <option value="<?= $row['id_pka'] ?>"> <?php echo $row['tanggal']; ?> (Auditor : <?= $row['nama']; ?>)</option>
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