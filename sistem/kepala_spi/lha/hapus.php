<?php 
include('../../template/header.php');

$id_lha = $_GET["id_lha"];

function hapus($id_lha)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_lha WHERE id_lha = $id_lha");
	return mysqli_affected_rows($conn);
}

if (hapus($id_lha)>0){
	echo "<script>
alert('data berhasil dihapus');
document.location.href='index.php';
	</script>";
}else{
	echo "<script>
alert('data gagal dihapus karena berelasi dengan tabel lain');
document.location.href='index.php';
	</script>";
}

?>