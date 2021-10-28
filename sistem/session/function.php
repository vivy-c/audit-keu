<?php
$conn = mysqli_connect("localhost", "root", "", "db_audit_keu");

function query($query)
{
    global $conn;
    $tampil = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($tampil)) {
        $rows[] = $row;
    }
    return $rows;
}


function login($data)
{
	
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id_user = $_POST['id_user'];
	// $level = $_POST['level'];
	// $status = $_POST['status'];

	// $login = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username' AND password = '$password' AND level = '$level' AND status = 1  ");

	$gagal = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username' AND password = '$password' AND status = 0  ");


		$sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			if($row['level']=='1'){
				session_start();
			  $_SESSION['username'] = $username;
			  $_SESSION['level'] = "1";
			  header("Location: ../direktur/index.php");
			}else if($row['level']=='2'){
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "2";
				header("Location: ../auditee/dashboard/index.php");
			}else if($row['level']=='3'){
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "3";
				header("Location: ../auditor/dashboard/index.php");
			}else if($row['level']=='4'){
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "4";
			  header("Location:../kepala_spi/dashboard/index.php");
			}     
		}else {
			echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
		}


	if (mysqli_fetch_array($gagal)) {
		echo "<script>
		alert('akun belum terkonfirmasi');
		document.location.href='index.php';
		</script>";
	} else {
		echo "<script>
		alert('user gagal login');
		document.location.href='index.php';
		</script>";
	}
	
	return mysqli_affected_rows($conn);
}


?>