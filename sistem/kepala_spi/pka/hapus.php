<?php 
include('../../template/header.php');

$id_pka = $_GET["id_pka"];

function hapus($id_pka)
{
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_pka WHERE id_pka = $id_pka");
	return mysqli_affected_rows($conn);
}

if (hapus($id_pka)>0){
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