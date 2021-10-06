<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$tb_user = query("SELECT * FROM tb_user  ORDER BY tb_user.nama ASC");
$tb_auditee = query("SELECT * FROM tb_auditee  ORDER BY tb_auditee.nama_unit ASC");

function tambahPka($data)
{
    global $conn;
    $id_pka = htmlspecialchars($data["id_pka"]);
    $id_user = htmlspecialchars($data["id_user"]);
    $id_auditee = htmlspecialchars($data["id_auditee"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal  = htmlspecialchars($data["tanggal"]);

    //insert data
    $query = "INSERT INTO tb_pka VALUES ('$id_pka','$id_user','$id_auditee','$tanggal','$status')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["tambahDataPka"])) {
    //cek data berhasil tambah atau tidak
    if (tambahPka($_POST) > 0) {
        echo "
              <script>
              alert('data berhasil ditambahkan');
              document.location.href='index.php';
              </script>
              ";
    } else {
        echo "
              <script>
              alert('data gagal ditambahkan');
              document.location.href='index.php';
              </script>
              ";
    }
}
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

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
                                    <table id="datatable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID PKA
                                                </th>
                                                <th>
                                                    STATUS
                                                </th>
                                                <th>
                                                    TANGGAL
                                                </th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="modal-data">
                                            <?php
                                            $no = 0;
                                            $modal = mysqli_query($conn, "SELECT * FROM tb_pka ORDER BY id_pka DESC");
                                            while ($r = mysqli_fetch_array($modal)) {
                                                $no++;
                                            ?>
                                                <?php foreach ($modal as $r) : ?>
                                                    <tr>
                                                        <td><?php echo $r['id_pka']; ?></td>
                                                        <td><?php echo  $r['status']; ?></td>
                                                        <td><?php echo  $r['tanggal']; ?></td>
                                                        <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModaldetail<?php echo $r['id_pka']; ?>">
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
                                                                                <?php
                                                                                $id = $r["id_pka"];
                                                                                $data = mysqli_query($conn, "SELECT * FROM tb_pka WHERE id_pka = '$id'");
                                                                                while ($cb = mysqli_fetch_array($data)) {
                                                                                ?>
                                                                                    <div class="form-group">
                                                                                        <label for="id_pka">ID PKA</label>
                                                                                        <input type="text" class="form-control" id="id_pka" name="id_pka" value="<?= $cb["id_pka"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_user">ID Auditor</label>
                                                                                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $cb["id_user"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_auditee">ID Auditee</label>
                                                                                        <input type="text" class="form-control" id="id_auditee" name="id_auditee" value="<?= $cb["id_auditee"]; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="status">Status</label>
                                                                                        <input type="text" class="form-control" id="status" name="status" value="<?= $cb["status"]; ?>" readonly>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="tanggal">tanggal</label>
                                                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $cb["tanggal"]; ?>" required readonly>
                                                                                    </div>


                                                                                <?php
                                                                                }
                                                                                ?>

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


                                                            <a class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $r['id_pka']; ?>"><i class="fas fa-pen"></i></a>

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
                                                                                <?php
                                                                                $id = $r["id_pka"];
                                                                                $data = mysqli_query($conn, "SELECT * FROM tb_pka WHERE id_pka = '$id'");
                                                                                while ($cb = mysqli_fetch_array($data)) {
                                                                                ?>
                                                                                    <div class="form-group">
                                                                                        <!-- <label for="id_user">ID User</label> -->
                                                                                        <input type="hidden" class="form-control" id="id_pka" name="id_pka" value="<?= $cb["id_pka"]; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_user">Nama Auditor</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" id="id_auditee" name="id_auditee">
                                                                                            <option value=""></option>
                                                                                            <?php foreach ($tb_user as $row) {
                                                                                            ?>
                                                                                                <option value="<?= $row['id_user'] ?>"><?php echo $row['nama']; ?> (<?php echo $row['nip_npak']; ?>)</option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="id_auditee">Nama Auditee</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" id="id_auditee" name="id_auditee">
                                                                                            <option value=""></option>
                                                                                            <?php foreach ($tb_auditee as $row) {
                                                                                            ?>
                                                                                                <option value="<?= $row['id'] ?>"><?php echo $row['nama_unit']; ?> (<?php echo $row['tanggal']; ?>)</option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="status">Status</label>
                                                                                        <select class="form-control " data-placeholder="Pilih Status" style="width: 100%;" id="status" name="status">
                                                                                            <option value=""></option>
                                                                                            <option value="">Terealisasi</option>
                                                                                            <option value="">Tidak Terealisasi</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tanggal">tanggal</label>
                                                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $cb["tanggal"]; ?>" required readonly>
                                                                                    </div>

                                                                                <?php
                                                                                }
                                                                                ?>

                                                                        </div>
                                                                        <div class="modal-footer float-right">
                                                                            <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                                                                            <a href="index.php" type="submit" class="btn btn-success" name="">Ubah Data</a>
                                                                            <!-- <button type="edit" id="edit" name="edit" value="edit" class="btn btn-primary">Simpan Perubahan</button> -->
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->

                                                            <a class="btn btn-outline-danger btn-sm" name="hapus" href="hapus.php?id=<?= $r["id"]; ?>" onclick="return confirm('Yakin mengapus data?');"><i class="fas fa-trash"></i></a>

                                                        </div>
                                                        </td>
                                                    </tr>
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
                                                    <input type="hidden" class="form-control" id="id_pka" name="id_pka" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id">Nama Auditor</label>
                                                    <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" id="id" name="id">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_user as $row) {
                                                        ?>
                                                            <option value="<?= $row['id'] ?>"><?php echo $row['nama']; ?> (<?php echo $row['nip_npak']; ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_auditee">Nama Auditee</label>
                                                    <select class="form-control " data-placeholder="Pilih Auditor" style="width: 100%;" id="id_auditee" name="id_auditee">
                                                        <option value=""></option>
                                                        <?php foreach ($tb_auditee as $row) {
                                                        ?>
                                                            <option value="<?= $row['id'] ?>"><?php echo $row['nama_unit']; ?> (<?php echo $row['tanggal']; ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control " data-placeholder="Pilih Status" style="width: 100%;" id="status" name="status">
                                                        <option value=""></option>
                                                        <option value="">Terealisasi</option>
                                                        <option value="">Tidak Terealisasi</option>
                                                    </select>
                                                </div>

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

                            <!-- Modal Popup untuk Edit-->
                            <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            </div>

                            <!-- Modal Popup untuk delete-->
                            <div class="modal fade" id="modal_delete">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="margin-top:100px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure to delete this data ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Javascript untuk popup modal Edit-->
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#datatable').on('click', '.open_modal', function(e) {
                                        var m = $(this).attr("id");
                                        $.ajax({
                                            url: "modal_edit.php",
                                            type: "GET",
                                            data: {
                                                id_pka: m,
                                            },
                                            success: function(ajaxData) {
                                                $("#ModalEdit").html(ajaxData);
                                                $("#ModalEdit").modal('show', {
                                                    backdrop: 'true'
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Ajax untuk menyimpan data-->
                            <script type="text/javascript">
                                $('body').on('submit', '#form-save', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                            method: $(this).attr("method"), // untuk mendapatkan attribut method pada form
                                            url: $(this).attr("action"), // untuk mendapatkan attribut action pada form
                                            data: {
                                                modal_name: $('#modal-name').val(),
                                                description: $('#description').val(),
                                            },
                                            success: function(response) {
                                                console.log(response);
                                                $("#modal-data").empty();
                                                $("#modal-data").html(response.data);
                                                $("#ModalAdd").modal('hide');
                                                $(".modal-backdrop").hide();
                                            },
                                            error: function(e) {
                                                // Error function here
                                            },
                                            beforeSend: function(b) {
                                                // Before function here
                                            }
                                        })
                                        .done(function(d) {
                                            // When ajax finished
                                        });
                                });
                            </script>

                            <!-- Ajax untuk update data-->
                            <script type="text/javascript">
                                $('body').on('submit', '#form-update', function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                            method: $(this).attr("method"), // untuk mendapatkan attribut method pada form
                                            url: $(this).attr("action"), // untuk mendapatkan attribut action pada form
                                            data: {
                                                id_pka: $('#edit-id').val(),
                                                modal_name: $('#edit-name').val(),
                                                description: $('#edit-description').val(),
                                            },
                                            success: function(response) {
                                                console.log(response);
                                                $("#modal-data").empty();
                                                $("#modal-data").html(response.data);
                                                $("#ModalEdit").modal('hide');
                                            },
                                            error: function(e) {
                                                // Error function here
                                            },
                                            beforeSend: function(b) {
                                                // Before function here
                                            }
                                        })
                                        .done(function(d) {
                                            // When ajax finished
                                        });
                                });
                            </script>

                            <!-- Ajax untuk delete data-->
                            <script type="text/javascript">
                                $('body').on('click', '.delete_modal', function(e) {
                                    let id_pka = $(this).data('id');
                                    $('#modal_delete').modal('show', {
                                        backdrop: 'static'
                                    });
                                    $("#delete_link").on("click", function() {
                                        e.preventDefault();
                                        $.ajax({
                                                method: 'POST', // untuk mendapatkan attribut method pada form
                                                url: 'proses_delete.php', // untuk mendapatkan attribut action pada form
                                                data: {
                                                    id_pka: id_pka
                                                },
                                                success: function(response) {
                                                    console.log(response);
                                                    $("#modal-data").empty();
                                                    $("#modal-data").html(response.data);
                                                    $("#modal_delete").modal('hide');

                                                },
                                                error: function(e) {
                                                    // Error function here
                                                },
                                                beforeSend: function(b) {
                                                    // Before function here
                                                }
                                            })
                                            .done(function(d) {
                                                // When ajax finished
                                            });
                                    });
                                });
                            </script>



                        </div>
                    </div>
                </div>

            </section>
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