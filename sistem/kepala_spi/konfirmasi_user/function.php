<?php

function status($data){

global $conn;
$id_user = $data["id_user"];
$status = $data["status"];

$query="UPDATE register SET status = '$status'  WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}
?>