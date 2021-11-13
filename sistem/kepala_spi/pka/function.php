<?php

$tb_user = query("SELECT * FROM tb_user WHERE level=2 AND status=1 ORDER BY tb_user.nama ASC");
$tb_auditee = query("SELECT * FROM tb_auditee ORDER BY tb_auditee.nama_unit ASC");

if (isset($_POST["tambahDataPka"])) {
    //cek data berhasil tambah atau tidak
    if (tambahPka($_POST) > 0) {
        echo "
              <script>
              alert('data berhasil ditambahkan');
              document.location.href='index.php';
              </script>
              ";
    } else {
        echo "
              <script>
              alert('data gagal ditambahkan');
              document.location.href='index.php';
              </script>
              ";
    }
}
if (isset($_POST["ubahDataPka"])) {
    //cek data berhasil tambah atau tidak
    if (ubahPka($_POST) > 0) {
        echo "
              <script>
              alert('data berhasil diubah');
              document.location.href='index.php';
              </script>
              ";
    } else {
        echo "
              <script>
              alert('data gagal diubah');
              document.location.href='index.php';
              </script>
              ";
    }
}

function tambahPka($data)
{
    global $conn;
    $id_pka = htmlspecialchars($data["id_pka"]);
    $id_user = htmlspecialchars($data["id_user"]);
    $id_auditee = htmlspecialchars($data["id_auditee"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal  = htmlspecialchars($data["tanggal"]);

    //insert data
    $query = "INSERT INTO tb_pka VALUES ('$id_pka','$id_user','$id_auditee','$status','$tanggal')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahPka($data)
{
    global $conn;
    $id_pka = htmlspecialchars($data["id_pka"]);
    $id_user = htmlspecialchars($data["id_user"]);
    $id_auditee = htmlspecialchars($data["id_auditee"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal  = htmlspecialchars($data["tanggal"]);

    //update data
    $query="UPDATE tb_pka SET 

    --   id_pka   = '$id_pka',
      id_user  = '$id_user',
      id_auditee  = '$id_auditee',
      status    = '$status',
      tanggal     = '$tanggal'

      WHERE id_pka = '$id_pka'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>