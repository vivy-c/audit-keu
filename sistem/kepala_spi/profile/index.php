<?php
include('../../template/header.php');
include('../../template/sidebar_kepala_spi.php');

$data['judul']='Profile Kepala';

$username = $_SESSION["username"];

$sql = "SELECT * FROM tb_user WHERE username='$username'";
$result = mysqli_query($conn, $sql);

?>


<!-- Main content -->
<section class="content">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                
                  <img class="profile-user-img img-fluid img-circle" src="../../img/user/foto_<?=$username;?>.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php
                while ($row = $result->fetch_assoc()) {
                  echo $row['nama'];
                }             
                ?></h3>

                <p class="text-muted text-center"><?php
                while ($row = $result->fetch_assoc()) {
                  echo $row['level'];
                }             
                ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIP/NPAK</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>No Telepon</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
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