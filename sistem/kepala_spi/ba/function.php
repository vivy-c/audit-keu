<?php

$tb_lha= query("SELECT * FROM tb_lha ORDER BY tgl_lha ASC");

if (isset($_POST["tambahBA"])) {
    //cek data berhasil tambah atau tidak
    if (tambahBA($_POST) > 0) {
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
if (isset($_POST["ubahBA"])) {
    //cek data berhasil tambah atau tidak
    if (ubahBA($_POST) > 0) {
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

function tambahBA($data)
{
    global $conn;
    $id_ba        = htmlspecialchars($data["id_ba"]);
    $id_lha          = htmlspecialchars($data["id_lha"]);
    $tgl_ba       = htmlspecialchars($data["tgl_ba"]);
    //insert data
    $query = "INSERT INTO tb_ba VALUES 
    ('$id_ba','$id_lha','$tgl_ba')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahBA($data)
{
    global $conn;
    $id_ba        = htmlspecialchars($data["id_ba"]);
    $id_lha          = htmlspecialchars($data["id_lha"]);
    $tgl_ba       = htmlspecialchars($data["tgl_ba"]);
    //update data
    $query="UPDATE tb_ba SET 

      id_lha     = '$id_lha',
      tgl_ba      = '$tgl_ba'

      WHERE id_ba = '$id_ba'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>