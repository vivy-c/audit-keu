
<?php 

$tb_visit = query("SELECT a.id_visit, b.id_desk, b.tgl_monitoring, a.tanggal,a.isi FROM tb_visit as a, tb_desk as b WHERE a.id_desk=b.id_desk");

if (isset($_POST["tambahVisit"])) {
    //cek data berhasil tambah atau tidak
    if (tambahVisit($_POST) > 0) {
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

if (isset($_POST["ubahVisit"])) {
    //cek data berhasil tambah atau tidak
    if (ubahVisit($_POST) > 0) {
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

function tambahVisit($data)
{
    global $conn;
    $id_visit= htmlspecialchars($data["id_visit"]);
    $id_desk = htmlspecialchars($data["id_desk"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $isi     = htmlspecialchars($data["isi"]);
    //insert data
    $query = "INSERT INTO tb_visit VALUES ('$id_visit','$id_desk','$tanggal','$isi')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahVisit($data)
{
    global $conn;
    $id_visit= htmlspecialchars($data["id_visit"]);
    $id_desk = htmlspecialchars($data["id_desk"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $isi     = htmlspecialchars($data["isi"]);

    //update data
    $query="UPDATE tb_visit SET 

      id_desk = '$id_desk',
      tanggal = '$tanggal',
      isi     = '$isi'

      WHERE id_visit = '$id_visit'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}