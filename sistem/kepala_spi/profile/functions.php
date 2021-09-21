<?php
include('../../template/header.php');

function ubah($data){

global $conn;
$id_user = $data["id_user"];
$level = $data["level"];

// untuk alert
if (isset($_POST["edit"])) {
  if (edit($_POST) > 0) {
    echo "
      <script>
      alert('Data Berhasil Diedit!');
      document.location.href = 'index.php';
      </script>
      ";
  } else {
    echo "
      <script>
          alert('Data Gagal Diedit!');
          document.location.href = 'index.php';
      </script>
      ";
  }
}

function edit($data)
{
  global $conn;
  $id_user = $data["id_user"];
  $username = $data["username"];
  $password = $data["password"];
  $nama = $data["nama"];
  $nip_npak = $data["nip_npak"];
  $no_hp = $data["no_hp"];
  $email = $data["email"];
  $status = $data["status"];
  $ttd = $data["ttd"];

  $query = "UPDATE tb_user SET
    username='$username',
    password='$password',
    nama='$nama',
    nip_npak='$nip_npak',
    email='$email',
    no_hp='$no_hp',
    ttd='$ttd'
    WHERE id_user ='$id_user'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}



$query="UPDATE register SET level = '$level'  WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}


?>