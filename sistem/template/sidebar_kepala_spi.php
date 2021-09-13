
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../dist/img/pnc.png" alt="PncLogo" height="60" width="60">
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
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../user/index.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../auditee/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Auditee</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="../konfirmasi_user/index.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Konfirmasi User
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="../pka/index.php" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                PKA
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Desk
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Data Visit
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-pen-square"></i>
              <p>
                THA
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-poll"></i>
              <p>
                LHA
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-flag"></i>
              <p>
                Berita Acara
                <i class=""></i>
              </p>
            </a>            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
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

    