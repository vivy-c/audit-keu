<?php
$conn = mysqli_connect("localhost","root","","db_audit_keu");

function query($query){
	global $conn;
	$tampil = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_array($tampil)){
		$rows[]=$row;
	} return $rows;
}



function status($data){

global $conn;
$id_user = $data["id_user"];
$status = $data["status"];

$query="UPDATE register SET status = '$status'  WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}
?>