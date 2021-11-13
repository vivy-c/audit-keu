<?php 
include('../../template/header.php');

$id_desk = $_GET["id_desk"];

function hapus($id_desk)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_desk WHERE id_desk = $id_desk");
	return mysqli_affected_rows($conn);
}

if (hapus($id_desk)>0){
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