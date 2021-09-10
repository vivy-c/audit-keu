<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$no = 0;
$modal = mysqli_query($conn, "SELECT * FROM tb_pka ORDER BY id_pka DESC");
while ($r = mysqli_fetch_array($modal)) {
    $no++;
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
                                <button href="javascript.void(0)" class="btn btn-primary mb-3" data-target="#ModalAdd" data-toggle="modal">Tambah data</button>
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
                                                <?php foreach ($modal as $r) : ?>
                                                    <tr>
                                                        <td><?php echo $r['id_pka']; ?></td>
                                                        <td><?php echo  $r['status']; ?></td>
                                                        <td><?php echo  $r['tanggal']; ?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" class='btn btn-primary open_modal' id='<?php echo  $r['id_pka']; ?>'">Edit</a>
                                                        <a href=" javascript:void(0)" class="btn btn-danger delete_modal" data-id='<?php echo  $r['id_pka']; ?>'>Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        <?php } ?>
                                        </table>
                                    </div>
                                </div>


                                <!-- Modal Popup untuk Add-->
                                <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Program Kerja Audit (PKA)</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form id="form-save" action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                                                    <div class="form-group" style="padding-bottom: 20px;">
                                                        <label for="Modal Name">Modal Name</label>
                                                        <input type="text" name="modal_name" id="modal-name" class="form-control" placeholder="Modal Name" required />
                                                    </div>

                                                    <div class="form-group" style="padding-bottom: 20px;">
                                                        <label for="Description">Description</label>
                                                        <textarea name="description" id="description" class="form-control" placeholder="Description" required /></textarea>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom: 20px;">
                                                        <label for="Date">Date</label>
                                                        <input type="text" name="date" class="form-control" plcaceholder="Timestamp" disabled value="<?php echo date('Y-m-d H:i:s'); ?>" required />
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-success" type="submit">
                                                            Save
                                                        </button>

                                                        <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                                                            Cancel
                                                        </button>
                                                    </div>

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