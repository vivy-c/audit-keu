<?php
session_start();
//error_reporting(0);
$server = "localhost";
$user = "root";
$pass = "";
$database = "db_audit_keu";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}


function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [] ;
  while($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
    
  }
  return $rows;
}

// KETERANGAN PROFIL

// $username = $_SESSION['username'];
// $query = query("SELECT * FROM tb_user WHERE username = '$username' ");


// $foto = $query['foto'];


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
  else
    $url = "http://";
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];

  // Append the requested resource location to the URL   
  $url .= $_SERVER['REQUEST_URI'];


  // if ($url == 'http://localhost/audit-keu/kepala_spi/tb_user.php' or $url == $lihat_user) {
  if ($url == 'http://localhost/audit-keu/sistem/kepala_spi/dashboard/index.php') {
    $title = 'Ketua | Dashboard';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/user/index.php') {
    $title = 'Ketua | User';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/konfirmasi_user/index.php') {
    $title = 'Ketua | Konfirmasi';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/auditee/index.php') {
    $title = 'Ketua | Auditee';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/pka/index.php') {
    $title = 'Ketua | PKA';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/desk/index.php') {
    $title = 'Ketua | Desk';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/visit/index.php') {
    $title = 'Ketua | Visit';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/tha/index.php') {
    $title = 'Ketua | THA';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/lha/index.php') {
    $title = 'Ketua | LHA';
  } elseif ($url == 'http://localhost/audit-keu/sistem/kepala_spi/ba/index.php') {
      $title = 'Ketua | BA';
  } else {
    $title = '';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

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

  <link rel="stylesheet" type="text/css" href="../../../datatables/datatables.min.css"/>
  <script type="text/javascript" src="../../../datatables/datatables.min.js"></script>
    
  <script src="../../../jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../../datatables/datatables.min.css"/>
  <script type="text/javascript" src="../../../datatables/datatables.min.js"></script>

  <link rel="stylesheet" type="text/css" href="DataTables/Bootstrap-4-4.1.1/css/bootstrap.min.css"/>
  <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../../jquery/jquery-3.3.1.min.js"></script>
  <script src="../../../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="../../../dist/js/script.js"></script>
  <!-- Untuk datatable -->
  <link rel="stylesheet" type="text/css" href="../../../datatables/datatables.min.css"/>
  <script type="text/javascript" src="../../../datatables/datatables.min.js"></script>
    
  <script type="text/javascript">
  $(document).ready(function() {
      $('#datatable').DataTable();
  });

</script>

</head>