
<?php
include('../template/header.php');
include('../template/sidebar.php');

$tb_auditee = query("SELECT * FROM tb_auditee"); 
?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
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
                              Id Unit
                            </th>
                            <th>
                              Nama Unit
                            </th>
                            <th>
                              Nama ketua
                            </th>
                            <th>
                              NIP / NPAK
                            </th>
                            <th>
                              No Hp
                            </th>
                            <th>
                              ttd
                            </th>
                            <th>
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                            <?php foreach ($tb_auditee as $row ) 
                              {
                                  echo 
                                  "<tr>
                                      
                                      <td>".$row['id_auditee']."</td>
                                      <td>".$row['nama_unit']."</td>
                                      <td>".$row['nama_ketua']."</td>
                                      <td>".$row['nip_npak']."</td>
                                      <td>".$row['no_hp']."</td>
                                      <td>".$row['ttd']."</td>
                                    
                                      <td>
                                        <a href='edit_mengajar.php?id=".$row['id_auditee']."' class='btn btn-primary btn-sm'> Edit</a>
                                        <a href='hapus_mengajar.php?id=".$row['id_auditee']."' class='btn btn-danger btn-sm'>Hapus</a> 
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