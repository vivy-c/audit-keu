<?php
include('../template/header.php');
include('../template/sidebar_kepala_spi.php');

$tb_auditee = query("SELECT * FROM tb_auditee");

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
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
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
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      <?php foreach ($tb_auditee as $row) {
                        echo
                        "<tr>
                                      
                                      <td>" . $row['nama_unit'] . "</td>
                                      <td>" . $row['nama_ketua'] . "</td>
                                      <td>" . $row['nip_npak'] . "</td>
                                    
                                      <td>
                                        <a href='edit_mengajar.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal data-target='#detail'> Detail</a>
                                        <a href='hapus_mengajar.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a> 
                                      </td>
                                  </tr>";
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>


              <div class="modal" id="detail" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">detail</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-primary">

                            <div class="card-body">
                              <div class="form-group">
                                <input type="hidden" id="id" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="nip">NIP / NPAK</label>
                                <input type="text" id="nip" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" id="jabatan" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="no_hp">No Telepon</label>
                                <input type="text" id="no_hp" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" id="password" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                <p style="color: red;"><i><b>* Upload ttd dengan background transparan*</i></b></p>
                                <label for="ttd">Pilih tanda tangan</label>
                                <input type="file" id="ttd" name="ttd">
                              </div>

                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
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