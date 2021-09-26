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


function upload() {
	
	$namaFile   = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error      = $_FILES['foto']['error'];
	$tmpName    = $_FILES['foto']['tmp_name'];
	
			//cek apakah tidak ada foto yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih foto terlebih dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensifotoValid = ['jpg','jpeg','png'];
	$ekstensifoto = explode('.', $namaFile);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if(!in_array($ekstensifoto,$ekstensifotoValid)){
		echo "<script>
		alert('Tolong Upload foto !!');
		</script>";
		return false; 
	}
	
			//cek jika  ukuran  file foto  terlalu besar
	if ($ukuranFile > 5000000) 
	{
		echo "<script>
		alert('Ukuran foto Terlalu Besar ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifoto;
	
	
	move_uploaded_file($tmpName,'../../img/user'.$namaFileBaru);
	return $namaFileBaru;	
}


function ubah($data){
	
	global $conn;
	// $id_user =$_POST(["id_user"]);
	// $username =$_POST(["username"]);
	// $password =$_POST(["password"]);
	// $password2 =$_POST(["password"]);
	// $nama =$_POST(["nama"]);
	// $nip_npak =$_POST(["nip_npak"]);
	// $status =$_POST(["status"]);
	// $level =$_POST(["level"]);
	// $no_hp =$_POST(["no_hp"]);
	// $email =$_POST(["email"]);
	$id_user =htmlspecialchars($data["id_user"]);
	$username =htmlspecialchars($data["username"]);
	$password =htmlspecialchars($data["password"]);
	$password2 =htmlspecialchars($data["password"]);
	$nama =htmlspecialchars($data["nama"]);
	$nip_npak =htmlspecialchars($data["nip_npak"]);
	$status =htmlspecialchars($data["status"]);
	$level =htmlspecialchars($data["level"]);
	$no_hp =htmlspecialchars($data["no_hp"]);
	$email =htmlspecialchars($data["email"]);

	$fotoLama = htmlspecialchars($data(["fotoLama"]));
	$ttdLama = htmlspecialchars($data(["ttdLama"]));
	
	// 	//cek apakah user pilih foto baru atau tidak
	// if($_FILES['foto']['error'] === 4){
	// 	$foto  = $fotoLama;
	// }else{
	// 	$foto =upload();
	// }

	// if($_FILES['ttd']['error'] === 4){
	// 	$ttd  = $ttdLama;
	// }else{
	// 	$ttd =upload();
	// }
	// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$sumber = $_FILES['gambar']['name'];
	$nama_gambar = $_FILES['gambar']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$sumber;
	
	// Set path folder tempat menyimpan fotonya
	$path = "foto/".$fotobaru;

	if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data user berdasarkan id_user yang dikirim
		$query = "SELECT * FROM user WHERE id_user='".$id_user."'";
		$sql = mysqli_query($conn,$query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file gambar sebelumnya ada di folder foto
		if(is_file("foto/".$data['foto'])) // Jika gambar ada
			unlink("foto/".$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "update user set username='$username', foto='$fotobaru' where id_user='$id_user' ";
		$sql = mysqli_query($conn,$query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: index.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo   "<script> alert('Maaf, Gambar gagal untuk diupload'); 
				location = 'index.php'; 
				</script>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "update user set username='$username' where id_user='$id_user' ";
	$sql = mysqli_query($conn,$query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
}


	$query="UPDATE tb_user SET username = '$username' ,password = '$password',nama = '$nama',nip_npak = '$nip_npak',email = '$email',no_hp = '$no_hp',status = '$status',level = '$level'WHERE id_user = $id_user";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


?>