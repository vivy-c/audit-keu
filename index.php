<?php
require 'functions.php';

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan');
      document.location.href='index.php';
      </script>";
  } else {
    echo "<script>
      alert('data gagal ditambahkan');
      document.location.href='index.php';
      </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="landing/css/style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'>
  <link rel="stylesheet" href="./dist/css/style.css">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

  <title>AuditKeu | PNC</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">AuditKeu | PNC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link btn btn-primary text-white tombol" href="sistem/session/index.php">Sign-in</a>
          <a class="nav-item nav-link btn btn-primary text-white tombol" data-toggle="modal" data-target="#registrasi">Sign-Up</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir Navbar -->

  <!-- modal register-->
  <div class=" modal fade" id="registrasi" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">

                <form class="main_form" method="post" id="form" action="" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" id="id" class="form-control" value="" name="id">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP / NPAK</label>
                      <input type="text" id="nip" class="form-control" value="" name="nip_npak">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" id="nama" class="form-control" value="" name="nama">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No Telepon</label>
                      <input type="text" id="no_hp" class="form-control" value="" name="no_hp">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control" value="" name="email">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="level">Pilih Level</label>
                      <select class="form-control" name="level" id="level">
                        <option value="1">Direktur</option>
                        <option value="2">Auditee</option>
                        <option value="3">Auditor</option>
                        <option value="4">Ketua SPI</option>
                      </select>
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>


                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" id="username" class="form-control" value="" name="username">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" id="password" class="form-control" value="" name="password">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="password2">Konfirmasi Password</label>
                      <input type="password" id="password2" class="form-control " value="" name="password2">
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="form-group">
                      <label for="foto">Pilih Foto</label><br>
                      <input type="file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                      <label for="ttd">Pilih tanda tangan</label><br>
                      <input type="file" id="ttd" name="ttd">
                      <p style="color: red;"><i><b>* Upload ttd dengan background transparan*</i></b></p>
                    </div>
                    <input type="hidden" id="status" name="status" value="0">
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <input type="submit" class="btn btn-primary send_btn" name="register" value="register"> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary send_btn" type="submit" name="register">Daftar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal register -->

  <!-- Jumbotron     background: url(../img/jumbotron-bg.jpg); -->
  <div class="jumbotron jumbotron-fluid" style="background-image: url('landing/img/jumbotron-bg.jpg');">
    <div class="container">
      <h1 class="display-4"><span><br>Aplikasi Audit Keuangan Politeknik Negeri Cilacap</span></h1>
      <a href="#" class="btn btn-info btn-lg tombol">View Our Work</a>
    </div>
  </div>
  <!-- akhir Jumbotron -->


  <!-- container -->
  <div class="container">

    <!-- info panel -->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <div class="row">
          <div class="col-sm">
            <img src="landing/img/clock.png" alt="Employee" class="img-fluid float-left" width="100px">
            <h4>24 Hours</h4>
            <p>Access your document anytime & anywhere.</p>
          </div>
          <div class="col-sm">
            <img src="landing/img/file.png" alt="HiRes" class="img-fluid float-left" width="100px">
            <h4>High-Res</h4>
            <p>High resolution document.</p>
          </div>
          <div class="col-sm">
            <img src="landing/img/lock.png" alt="Security" class="img-fluid float-left" width="100px">
            <h4>Security</h4>
            <p>Your'e data savety with us.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir info panel -->


    <!-- Workingspace -->
    <div class="row workingspace">
      <div class="col-lg-6">
        <img src="landing/img/workingspace.png" alt="Working Space" class="img-fluid">
      </div>
      <div class="col-lg-5">
        <h2>today's<span> Research</span> tomorrow's <span>Innovation</span></h2>
        <p>Make today to be the day we learn something new.</p>
      </div>
    </div>
    <!-- akhir Workingspace -->


    <!-- Testimonial -->
    <section class="testimonial">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <p>"Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya."</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 justify-content-center d-flex">
        </div>
      </div>
      <div class="row justify-content-center info-text">
        <div class="col-lg text-center">
          <strong>Copyright &copy; 2021</strong>
          <p></p>
        </div>
      </div>
    </section>
    <!-- akhir Testimonial -->


  </div>
  <!-- akhir container -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="./dist/js/script.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>