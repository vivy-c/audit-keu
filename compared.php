
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../../plugins/googleapis-head.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../../plugins/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/pnc.png" alt="PncLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/pnc.png" alt="Pnc Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AuditKeu | PNC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <br />
<b>Notice</b>:  Undefined variable: conn in <b>C:\xampp\htdocs\audit-keu-main\sistem\kepala_spi\pka\index.php</b> on line <b>6</b><br />
<br />
<b>Warning</b>:  mysqli_query() expects parameter 1 to be mysqli, null given in <b>C:\xampp\htdocs\audit-keu-main\sistem\kepala_spi\pka\index.php</b> on line <b>6</b><br />
<br />
<b>Warning</b>:  mysqli_fetch_array() expects parameter 1 to be mysqli_result, null given in <b>C:\xampp\htdocs\audit-keu-main\sistem\kepala_spi\pka\index.php</b> on line <b>7</b><br />
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
                                                    <input type="text" name="date" class="form-control" plcaceholder="Timestamp" disabled value="2021-09-08 17:50:13" required />
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




  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
</body>
</html>
