<?php

$tb_user = query("SELECT * FROM tb_user WHERE status=1 ORDER BY tb_user.nama ASC");
$tb_pka_full = query("SELECT a.id_pka,b.id_user,b.nama,c.id_auditee,c.nama_unit,a.status,a.tanggal FROM tb_pka as a,tb_user as b,tb_auditee as c WHERE a.id_user=b.id_user and a.id_auditee=c.id_auditee");
$tb_pka = query("SELECT a.id_pka,a.id_user,a.tanggal,b.nama FROM tb_pka as a,tb_user as b WHERE a.id_user=b.id_user");
$tb_auditee = query("SELECT * FROM tb_auditee ORDER BY tb_auditee.nama_unit ASC");

foreach ($tb_user as $r) :
if ($r['level'] == 1) {
    $level = 'Direktur';
  } elseif ($r['level'] == 2) {
    $level = 'Auditee';
  } elseif ($r['level'] == 3) {
    $level = 'Auditor';
  } elseif ($r['level'] == 4) {
    $level = 'Ketua SPI';
  } else {
    $level = 'Tidak tersedia';
  }
endforeach;

if (isset($_POST["tambahDesk"])) {
    //cek data berhasil tambah atau tidak
    if (tambahDesk($_POST) > 0) {
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
if (isset($_POST["ubahDesk"])) {
    //cek data berhasil tambah atau tidak
    if (ubahDesk($_POST) > 0) {
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

function tambahDesk($data)
{
    global $conn;
    $id_desk     = htmlspecialchars($data["id_desk"]);
    $id_pka      = htmlspecialchars($data["id_pka"]);
    $jenis       = htmlspecialchars($data["jenis"]);
    $sumber_dana = htmlspecialchars($data["sumber_dana"]);
    $nominal     = htmlspecialchars($data["nominal"]);
    $tgl_monitoring     = htmlspecialchars($data["tgl_monitoring"]);
    $lama_monitoring    = htmlspecialchars($data["lama_monitoring"]);
    
    //insert data
    $query = "INSERT INTO tb_desk VALUES ('$id_desk','$id_pka','$jenis','$sumber_dana','$nominal','$tgl_monitoring','$lama_monitoring')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahDesk($data)
{
    global $conn;
    $id_desk     = htmlspecialchars($data["id_desk"]);
    $id_pka      = htmlspecialchars($data["id_pka"]);
    $jenis       = htmlspecialchars($data["jenis"]);
    $sumber_dana = htmlspecialchars($data["sumber_dana"]);
    $nominal     = htmlspecialchars($data["nominal"]);
    $tgl_monitoring     = htmlspecialchars($data["tgl_monitoring"]);
    $lama_monitoring    = htmlspecialchars($data["lama_monitoring"]);

    //update data
    $query="UPDATE tb_desk SET 

      -- id_desk   = '$id_desk',
      id_pka         = '$id_pka',
      jenis          = '$jenis',
      sumber_dana    = '$sumber_dana',
      nominal        = '$nominal',
      tgl_monitoring    = '$tgl_monitoring',
      lama_monitoring   = '$lama_monitoring'

      WHERE id_desk = '$id_desk'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>