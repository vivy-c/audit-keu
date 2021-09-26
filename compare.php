<?php
	//Memanggil class pegawai
	include_once 'class/class_pegawai.php';
	
	//Inisialisasi baru
	$pegawai = new Pegawai();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawai = $_GET['id_pegawai'];

			?>
				<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">   
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Ubah Pegawai</h1>
					  </div>
					</div>
				  </div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">
				  <div class="container-fluid">
					<div class="row">
					  <!-- left column -->
					  <div class="col-md-12">
						<!-- general form elements -->
						<div class="card card-primary">
						  <div class="card-header">
							<h3 class="card-title">Data Pegawai</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=ubah_pegawai&aksi=ubah&id_pegawai=<?php echo $id_pegawai; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								<label>ID Pegawai</label>
								<input name="id_pegawai" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('id_pegawai',$id_pegawai); ?>" readonly>
							  </div>
							  
								<div class="form-group">
								<label>Unit</label>
								<select name="id_unit" class="form-control">
									<option value=<?php echo $pegawai->preview_pegawai('id_unit',$id_pegawai); ?>><?php echo $pegawai->preview_pegawai('nama_unit',$id_pegawai); ?></option>
								
									<?php
										$query = mysqli_query($con, "SELECT * FROM tb_unit WHERE id_unit NOT IN (SELECT id_unit FROM tb_pegawai WHERE id_pegawai='$id_pegawai')");
										
										while ($row = mysqli_fetch_array($query)){
											echo "<option value=$row[id_unit]>$row[nama_unit]</option>";
										}
									?>
								</select>
								</div>
							  
							  <div>
								<label>N I P/ NPAK</label>
								<input name="nip" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('nip',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>Nama Pegawai</label>
								<input name="nama_pegawai" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('nama_pegawai',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" value ="<?php echo $pegawai->preview_pegawai('password',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>Email</label>
								<input name="email" type="email" class="form-control" value ="<?php echo $pegawai->preview_pegawai('email',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>No telepon</label>
								<input name="no_telepon" type="number" class="form-control" value ="<?php echo $pegawai->preview_pegawai('no_telepon',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
                            <label for="foto">Foto</label><br>
                            <input type="file" id="foto" name="foto">
                          </div>
							</div>
							<div class="card-footer">
							  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
							  <a href="?page=tampil_pegawai" class="btn btn-warning">Kembali</a>
							</div>
						  </form>
						</div>
						<!-- /.card -->
					  </div>
					</div>
					<!-- /.row -->
				  </div><!-- /.container-fluid -->
				</section>
				<!-- /.content -->
				</body>
				</html>
			<?php
		}

		if($_POST['submit'])
		 {
			//update data pegawai
			$jml_password = strlen($_POST['password']);
		
			if($jml_password == 8){
				$data_tb_pegawai['id_pegawai'] = $_POST['id_pegawai'];
				$data_tb_pegawai['id_unit'] = $_POST['id_unit'];
				$data_tb_pegawai['nip'] = $_POST['nip'];
				$data_tb_pegawai['nama_pegawai'] = $_POST['nama_pegawai'];
				$data_tb_pegawai['password'] = $_POST['password'];
				$data_tb_pegawai['email'] = $_POST['email'];
				$data_tb_pegawai['no_telepon'] = $_POST['no_telepon'];
				$data_tb_pegawai['foto'] = $_POST['foto'];
				
				$pegawai->ubah_pegawai($data_pegawai);
						
				?>
					<script language="javascript">
						alert("Data berhasil diupdate");
						location = "?page=tampil_pegawai";
					</script>
				<?php
			}
			else{
				?>
					<script language="javascript">
						alert("Jumlah karakter password tidak sesuai dengan ketentuan");
						location = "?page=tambah_pegawai";
					</script>
				<?php
			}
		}
	}
?>