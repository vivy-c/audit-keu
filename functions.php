
    <!-- register function -->
    <?php

    session_start();
    //error_reporting(0);
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "db_audit_keu";

    $conn = mysqli_connect($server, $user, $pass, $database);

    if (!$conn) {
      die("<script>alert('Connection Failed.')</script>");
    }



    function register($data)
    {
      global $conn;
      $username = strtolower(htmlspecialchars(trim($data["username"])));
      $password = htmlspecialchars(trim(md5($data["password"])));
      $password2 = htmlspecialchars(trim(md5($data["password2"])));
      $nama = strtolower(htmlspecialchars(trim($data["nama"])));
      $nip_npak = strtolower(htmlspecialchars(trim($data["nip_npak"])));
      $no_hp = strtolower(htmlspecialchars(trim($data["no_hp"])));
      $email = strtolower(htmlspecialchars(trim($data["email"])));
      $status = strtolower(htmlspecialchars(trim($data["status"])));
      $level = strtolower(htmlspecialchars(trim($data["level"])));
      $foto = upload_foto();
      if (!$foto) {
        return false;
      }


      $ttd = upload_ttd();
      if (!$ttd) {
        return false;
      }

      $cek_username = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

      $cek_email = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");

      $cek_nip_npak = mysqli_query($conn, "SELECT nip_npak FROM tb_user WHERE nip_npak = '$nip_npak'");



      if (mysqli_fetch_array($cek_nip_npak)) {
        echo "<script>
			alert('nip_npak sudah ada');
			document.location.href='index.php';
			</script>";
        return false;
      }


      if (mysqli_fetch_array($cek_username)) {
        echo "<script>
			alert('username sudah ada');
			document.location.href='index.php';
			</script>";
        return false;
      }

      if (mysqli_fetch_array($cek_email)) {
        echo "<script>
			alert('email sudah ada');
			document.location.href='index.php';
			</script>";
        return false;
      }


      if ($password != $password2) {
        echo "<script>
          alert('konfrimasi password tidak sesuai');
          document.location.href='index.php';
          </script>";
        return false;
      }

      if (strlen($password) <= 2) {
        echo "<script>
          alert('password trlalu pendek');
          document.location.href='index.php';
          </script>";
        return false;
      }

      $query = "INSERT INTO tb_user VALUES 
	('id','$username','$password','$password2','$nama','$nip_npak','$email','$no_hp','$status','$level','$foto','$ttd')";


      mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
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

      $namaFileBaru = ("foto_" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;


      move_uploaded_file($tmpName, 'img/user/' . $namaFileBaru);
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


      move_uploaded_file($tmpName, 'img/user/' . $namaFileBaru);
      return $namaFileBaru;
    }



    ?>
    <!-- /.register function -->