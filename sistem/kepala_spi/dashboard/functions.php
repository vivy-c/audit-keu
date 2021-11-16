<?php

// session_start();
$sql = query("SELECT * FROM tb_user WHERE username='$username'");

// $foto = $sql['foto'];

if (isset($_POST["ubahData"])) {
  if (ubah($_POST) > 0) {
    if (!isset($_SESSION['username'])) {
      header("Location: ../../session/index.php");
    } else {
      header("Location: index.php");
    }
    echo "<script>
      alert('data berhasil diperbarui');
      document.location.href = '../../session/index.php';
      </script>";
  } else {
    echo "<script>
    alert('data gagal diperbarui');
    document.location.href = '../dashboard/index.php';
  </script>";
  }
}

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

      $namaFileBaru = ("ttd_" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;


      move_uploaded_file($tmpName, '../../img/user/' . $namaFileBaru);
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

      move_uploaded_file($tmpName, '../../img/user/' . $namaFileBaru);
      return $namaFileBaru;
    }


    function ubah($data){
	
      global $conn;
      $id_user   =htmlspecialchars($data["id_user"]);
      $username  =htmlspecialchars($data["username"]);
      $password  =htmlspecialchars($data["password"]);
      $password2 =htmlspecialchars($data["password"]);
      $nama      =htmlspecialchars($data["nama"]);
      $nip_npak  =htmlspecialchars($data["nip_npak"]);
      $status    =htmlspecialchars($data["status"]);
      $level     =htmlspecialchars($data["level"]);
      $no_hp     =htmlspecialchars($data["no_hp"]);
      $email     =htmlspecialchars($data["email"]);
      $fotoLama  =htmlspecialchars($data["fotoLama"]);
      $ttdLama   =htmlspecialchars($data["ttdLama"]);
    
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

    
      $query="UPDATE tb_user SET 

      -- id_user   = '$id_user',
      username  = '$username',
      password  = '$password',
      passsword2 = '$password2',
      nama      = '$nama',
      nip_npak  = '$nip_npak',
      status    = '$status',
      level     = '$level',
      no_hp     = '$no_hp',
      email     = '$email',
      foto      = '$foto',
      ttd       = '$ttd' 

      WHERE id_user = '$id_user'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
    }

$rowata_user = mysqli_query($conn,"SELECT * FROM tb_user");
$jumlah_user = mysqli_num_rows($rowata_user);

$rowata_pka = mysqli_query($conn,"SELECT * FROM tb_pka");
$jumlah_pka = mysqli_num_rows($rowata_pka);

$rowata_desk = mysqli_query($conn,"SELECT * FROM tb_desk");
$jumlah_desk = mysqli_num_rows($rowata_desk);

$rowata_visit = mysqli_query($conn,"SELECT * FROM tb_visit");
$jumlah_visit = mysqli_num_rows($rowata_visit);

$rowata_tha = mysqli_query($conn,"SELECT * FROM tb_tha");
$jumlah_tha = mysqli_num_rows($rowata_tha);

$rowata_lha = mysqli_query($conn, "SELECT * FROM tb_lha");
$jumlah_lha = mysqli_num_rows($rowata_lha);

$rowata_ba = mysqli_query($conn,"SELECT * FROM tb_ba");
$jumlah_ba = mysqli_num_rows($rowata_ba);
 