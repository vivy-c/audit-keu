
<?php
include('../template/header.php');
include('../template/sidebar_kepala_spi.php');

$tb_auditor = query("SELECT * FROM tb_auditor"); 
?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 connectedSortable">
          <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>
                              Nama
                            </th>
                            <th>
                                NIP / NPAK
                            </th>
                            <th>
                              Jabatan
                            </th>
                            <th>
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                            <?php foreach ($tb_auditor as $row ) 
                              {
                                  echo 
                                  "<tr>
                                      
                                      <td>".$row['nama']."</td>
                                      <td>".$row['nip_npak']."</td>
                                      <td>".$row['jabatan']."</td>
                                    
                                      <td>
                                      <a href='edit_mengajar.php?id=".$row['id_auditor']."' class='btn btn-primary btn-sm'>Detail</a>
                                      <a href='edit_mengajar.php?id=".$row['id_auditor']."' class='btn btn-danger btn-sm'>Delete</a>
                                      </td>
                                  </tr>";

                              }
                          ?>
                  
                        </tbody>
                      </table>
                    </div>

                    
                  </div>

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



<?php include('../template/footer.php'); ?>