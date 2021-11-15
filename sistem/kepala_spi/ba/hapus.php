<?php 
include('../../template/header.php');

$id_ba = $_GET["id_ba"];

function hapus($id_ba)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_ba WHERE id_ba = $id_ba");
	return mysqli_affected_rows($conn);
}

if (hapus($id_ba)>0){
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