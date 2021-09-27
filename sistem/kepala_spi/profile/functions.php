<?php

// function ubah($data){

// global $conn;
// $id_user = $data["id_user"];
// $level = $data["level"];

// // untuk alert
// if (isset($_POST["edit"])) {
//   if (edit($_POST) > 0) {
//     echo "
//       <script>
//       alert('Data Berhasil Diedit!');
//       document.location.href = 'index.php';
//       </script>
//       ";
//   } else {
//     echo "
//       <script>
//           alert('Data Gagal Diedit!');
//           document.location.href = 'index.php';
//       </script>
//       ";
//   }
// }

//   function edit($data)
//   {
//     global $conn;
//     $id_user = $data["id_user"];
//     $username = $data["username"];
//     $password = $data["password"];
//     $nama = $data["nama"];
//     $nip_npak = $data["nip_npak"];
//     $no_hp = $data["no_hp"];
//     $email = $data["email"];
//     $status = $data["status"];
//     $ttd = $data["ttd"];

//     $query = "UPDATE tb_user SET
//       username='$username',
//       password='$password',
//       nama='$nama',
//       nip_npak='$nip_npak',
//       email='$email',
//       no_hp='$no_hp',
//       ttd='$ttd'
//       WHERE id_user ='$id_user'";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
//   }



//   $query="UPDATE register SET level = '$level'  WHERE id_user = $id_user";
//     mysqli_query($conn,$query);
//     return mysqli_affected_rows($conn);

// }


// function status($data){
//   global $conn;
//   $id_user = $data["id_user"];
//   $status = $data["status"];
  
//   $query="UPDATE tb_user SET status = '$status'  WHERE id_user = $id_user";
//     mysqli_query($conn,$query);
//     return mysqli_affected_rows($conn);
  
//   }


function upload_foto()
    {
      $namaFile   = $_FILES['foto']['name'];
      $ukuranFile = $_FILES['foto']['size'];
      $error      = $_FILES['foto']['error'];
      $tmpName    = $_FILES['foto']['tmp_name'];

      //cek apakah tidak ada gambar yang di upload
      if ($error === 4) {
        echo "<script>
        alert('Pilih File Foto Terlebih Dahulu!');
        </script>";
        return false;
      }

      //cek apakah yang boleh diupload
      $ekstensiValid = ['jpg', 'jpeg', 'png'];
      $ekstensi = explode('.', $namaFile);
      $ekstensi = strtolower(end($ekstensi));
      if (!in_array($ekstensi, $ekstensiValid)) {
        echo "<script>
        alert('Tolong Upload File (jpg/jpeg/png) Foto!!');
        </script>";
        return false;
      }

      //cek jika  ukuran  file   terlalu besar
      if ($ukuranFile > 50000000) {
        echo "<script>
        alert('Ukuran File Foto Terlalu Besar (MAX 5 mb) ');
        </script>";
        return false;
      }

      //lolos pengecekan
      //nama baru

      $nama = $_POST['nama'];

      $namaFileBaru = ("foto_" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;


      move_uploaded_file($tmpName, 'sistem/img/user/' . $namaFileBaru);
      return $namaFileBaru;
    }


    function upload_ttd()
    {

      $namaFile   = $_FILES['ttd']['name'];
      $ukuranFile = $_FILES['ttd']['size'];
      $error      = $_FILES['ttd']['error'];
      $tmpName    = $_FILES['ttd']['tmp_name'];

      //cek apakah tidak ada gambar yang di upload
      if ($error === 4) {
        echo "<script>
        alert('Pilih File TTD Terlebih Dahulu!');
        </script>";
        return false;
      }

      //cek apakah yang boleh diupload
      $ekstensiValid = ['jpg', 'jpeg', 'png'];
      $ekstensi = explode('.', $namaFile);
      $ekstensi = strtolower(end($ekstensi));
      if (!in_array($ekstensi, $ekstensiValid)) {
        echo "<script>
        alert('Tolong Upload File (jpg/jpeg/png) Foto!!');
        </script>";
        return false;
      }

      //cek jika  ukuran  file   terlalu besar
      if ($ukuranFile > 50000000) {
        echo "<script>
        alert('Ukuran File Tanda Tangan Terlalu Besar (MAX 5 mb) ');
        </script>";
        return false;
      }

      //lolos pengecekan
      //nama baru

      $nama = $_POST['nama'];

      $namaFileBaru = ("ttd_" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;


      move_uploaded_file($tmpName, 'sistem/img/user/' . $namaFileBaru);
      return $namaFileBaru;
    }

function ubahBio($data){
	
	global $conn;
	$id_user =htmlspecialchars($data["id_user"]);
	$nama =htmlspecialchars($data["nama"]);
	$nip_npak =htmlspecialchars($data["nip_npak"]);
	$status =htmlspecialchars($data["status"]);
	$level =htmlspecialchars($data["level"]);
	$no_hp =htmlspecialchars($data["no_hp"]);
	$email =htmlspecialchars($data["email"]);

	$query="UPDATE tb_user SET nama = '$nama',nip_npak = '$nip_npak',email = '$email',no_hp = '$no_hp',status = '$status',level = '$level'WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


function ubahPw($data){
	
	global $conn;
	$id_user =htmlspecialchars($data["id_user"]);
	$username =htmlspecialchars($data["username"]);
	$password =htmlspecialchars($data["password"]);
	$password2 =htmlspecialchars($data["password"]);

	$query="UPDATE tb_user SET username = '$username' ,password = '$password' WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


function ubahFoto($data){
	
	global $conn;
	$id_user =htmlspecialchars($data["id_user"]);

	$fotoLama = htmlspecialchars($data(["fotoLama"]));
	$ttdLama = htmlspecialchars($data(["ttdLama"]));
	
	// 	//cek apakah user pilih foto baru atau tidak
	if($_FILES['foto']['error'] === 4){
		$foto  = $fotoLama;
	}else{
		$foto =upload_foto();
	}

	if($_FILES['ttd']['error'] === 4){
		$ttd  = $ttdLama;
	}else{
		$ttd =upload_ttd();
	}

	$query="UPDATE tb_user SET foto='$foto',ttd='$ttd' WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


?>