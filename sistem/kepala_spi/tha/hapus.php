<?php 
include('../../template/header.php');

$id_tha = $_GET["id_tha"];

function hapus($id_tha)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_tha WHERE id_tha = $id_tha");
	return mysqli_affected_rows($conn);
}

if (hapus($id_tha)>0){
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