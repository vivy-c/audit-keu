<?php 
include('../../template/header.php');

$id_visit = $_GET["id_visit"];

function hapus($id_visit)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_visit WHERE id_visit = $id_visit");
	return mysqli_affected_rows($conn);
}

if (hapus($id_visit)>0){
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