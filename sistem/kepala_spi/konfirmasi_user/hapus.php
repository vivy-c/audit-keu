<?php 
include('../../template/header.php');

$id_user = $_GET["id_user"];

function hapus($id_user)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_user WHERE id_user = $id_user");
	return mysqli_affected_rows($conn);
}

if (hapus($id_user)>0){
	echo "<script>
alert('data berhasil dihapus');
document.location.href='index.php';
	</script>";
}else{
	echo "<script>
alert('data gagal dihapus');
document.location.href='index.php';
	</script>";
}

?>