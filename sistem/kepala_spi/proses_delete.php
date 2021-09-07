<?php
	include('../template/header.php');
	$id_pka=$_POST['id_pka'];
	$query=mysqli_query($koneksi,"Delete FROM modal WHERE id_pka='$id_pka'");
	
	
	if($query) // jika insert data berhasil
	{
		// fungsi untuk membuat format json
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/audit-keu/sistem/kepala_spi/v_pka.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
	}
	else // jika insert data gagal
	{
		$data = array('status'=>'failed', 'data'=> null);
		echo json_encode($data);
	}
	
?>