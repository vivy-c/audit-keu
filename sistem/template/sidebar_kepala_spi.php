<body class="hold-transition sidebar-mini layout-fixed">

  <?php

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
  else
    $url = "http://";
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];

  // Append the requested resource location to the URL   
  $url .= $_SERVER['REQUEST_URI'];

  // $lihat_user = 'http://localhost/audit-keu/user/kepala_spi/user/lihat_user.php?nip=' . $nip;

  // if ($url == 'http://localhost/audit-keu/kepala_spi/tb_user.php' or $url == $lihat_user) {
  if ($url == 'http://localhost/audit-keu/sistem/kepala_spi/dashboard/index.php') {
    $dashboard = 'active';
    $konten = 'Dashboard';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/user/index.php') {
    $dataUser = 'active';
    $user = 'active';
    $konten = 'Data Semua User';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/konfirmasi_user/index.php') {
    $konfirmasi_user = 'active';
    $dataUser = 'active';
    $konten = 'Konfirmasi User';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/auditee/index.php') {
    $auditee = 'active';
    $dataUser = 'active';
    $konten = 'Data Unit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/pka/index.php') {
    $dataPka = 'active';
    $pka = 'active';
    $konten = 'Program Kerja Audit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/pka/timeline.php') {
    $dataPka = 'active';
    $timeline = 'active';
    $konten = 'Timeline Audit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/desk/index.php') {
    $desk = 'active';
    $dataAudit = 'active';
    $konten = 'Data Desk';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/visit/index.php') {
    $visit = 'active';
    $dataAudit = 'active';
    $konten = 'Data Visit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/tha/index.php') {
    $tha = 'active';
    $dataAudit = 'active';
    $konten = 'Temuan Hasil Audit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/lha/index.php') {
    $lha = 'active';
    $dataAudit = 'active';
    $konten = 'Laporan Hasil Audit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/ba/index.php') {
    $ba = 'active';
    $konten = 'Berita Acara';
  } else {
    $dashboard = '';
    $user = '';
    $konfirmasi_user = '';
    $auditee = '';
    $pka = '';
    $desk = '';
    $visit = '';
    $tha = '';
    $lha = '';
    $ba = '';
    $dataUser = '';
    $dataPka = '';
    $dataAudit = '';
    $konten = '';
  }
  ?>

  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="loader" src="../../../dist/img/loading-buffering.gif" alt="loader" height="60" width="60" style="color: white;">
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
      <a href="#" class="brand-link">
        <img src="../../../dist/img/pnc.png" alt="Pnc Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AuditKeu | PNC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        
      <div >
          
        </div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php


            $username = $_SESSION["username"];

            // $sql = "SELECT * FROM tb_user WHERE username='$username'";
            // $result = mysqli_query($conn, $sql);
            $query = query("SELECT * FROM tb_user WHERE username = '$username' ")[0];
            $id_user   = $query['id_user'];
            $username  = $query['username'];
            $password  = $query['password'];
            $password2 = $query['passsword2'];
            $nama      = $query['nama'];
            $nip_npak  = $query['nip_npak'];
            $status    = $query['status'];
            $level     = $query['level'];
            $no_hp     = $query['no_hp'];
            $email     = $query['email'];
            $foto  = $query['foto'];
            $ttd   = $query['ttd'];

            ?>
            <img src="../../img/user/<?= $foto; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            
            <a href="#" class="d-block"><?php

              $username = $_SESSION["username"];

              $sql = "SELECT * FROM tb_user WHERE username='$username'";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_assoc()) {
                echo $row['nama'];
              }
              ?></a>

              <span class="badge badge-info d-block">Ketua-SPI</span>
              
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
          <ul class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item ">
              <a href="../dashboard/index.php" class="nav-link <?= $dashboard; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class=""></i>
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link <?= $dataUser; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data User
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../user/index.php" class="nav-link <?= $user; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../konfirmasi_user/index.php" class="nav-link <?= $konfirmasi_user; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Konfirmasi User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../auditee/index.php" class="nav-link <?= $auditee; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Auditee</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item ">
              <a href="#" class="nav-link <?= $dataPka; ?>">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Data PKA
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../pka/index.php" class="nav-link <?= $pka; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PKA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../pka/timeline.php" class="nav-link <?= $timeline; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Timeline Audit</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item ">
              <a href="#" class="nav-link <?= $dataAudit; ?>">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Data Audit
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../desk/index.php" class="nav-link <?= $desk; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Desk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../visit/index.php" class="nav-link <?= $visit; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Visit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tha/index.php" class="nav-link <?= $tha; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>THA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../lha/index.php" class="nav-link <?= $lha; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>LHA</p>
                  </a>
                </li>
              </ul>
            </li>

            
            <li class="nav-item ">
              <a href="../ba/index.php" class="nav-link <?= $ba; ?>">
                <i class="nav-icon far fa-flag"></i>
                <p>
                  Berita Acara
                  <i class=""></i>
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="../../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log Out
                  <i class=""></i>
                </p>
              </a>
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
            <div class="col-sm-5 ">
              <h1 class="m-0"><?= $konten; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-5">
              <ol class="breadcrumb float-sm-right">

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->