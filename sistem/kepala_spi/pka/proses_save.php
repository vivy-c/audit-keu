<?php
include('../template/header.php');
$modal_name = $_POST['modal_name'];
$description = $_POST['description'];
$query = mysqli_query($koneksi,"INSERT INTO tb_pka (modal_name,description) VALUES ('$modal_name','$description')");

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