<?php

$tb_visit = query("SELECT * FROM tb_visit ORDER BY tgl_visit ASC");

if (isset($_POST["tambahLHA"])) {
    //cek data berhasil tambah atau tidak
    if (tambahLHA($_POST) > 0) {
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
if (isset($_POST["ubahLHA"])) {
    //cek data berhasil tambah atau tidak
    if (ubahLHA($_POST) > 0) {
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

function tambahLHA($data)
{
    global $conn;
    $id_lha          = htmlspecialchars($data["id_lha"]);
    $id_tha        = htmlspecialchars($data["id_tha"]);
    $tgl_lha       = htmlspecialchars($data["tgl_lha"]);
    $status         = htmlspecialchars($data["status"]);
    $keterangan     = htmlspecialchars($data["keterangan"]);
    //insert data
    $query = "INSERT INTO tb_lha VALUES 
    ('$id_lha','$id_tha','$tgl_lha','$status','$keterangan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahLHA($data)
{
    global $conn;
    $id_lha          = htmlspecialchars($data["id_lha"]);
    $id_visit        = htmlspecialchars($data["id_visit"]);
    $tgl_lha       = htmlspecialchars($data["tgl_lha"]);
    $catatan         = htmlspecialchars($data["catatan"]);
    $dasar_hukum     = htmlspecialchars($data["dasar_hukum"]);
    $penyebab        = htmlspecialchars($data["penyebab"]);
    $akibat          = htmlspecialchars($data["akibat"]);
    $rekomendasi     = htmlspecialchars($data["rekomendasi"]);
    $tanggapan_auditee      = htmlspecialchars($data["tanggapan_auditee"]);
    $rencana_tindak_lanjut  = htmlspecialchars($data["rencana_tindak_lanjut"]);
    $persetujuan     = htmlspecialchars($data["persetujuan"]);
    
    //update data
    $query="UPDATE tb_lha SET 

      id_visit     = '$id_visit',
      tgl_lha      = '$tgl_lha',
      catatan      = '$catatan',
      dasar_hukum  = '$dasar_hukum',
      penyebab     = '$penyebab',
      akibat       = '$akibat',
      rekomendasi  = '$rekomendasi'
      tanggapan_auditee      = '$tanggapan_auditee'
      rencana_tindak_lanjut  = '$rencana_tindak_lanjut'
      persetujuan  = '$persetujuan'

      WHERE id_lha = '$id_lha'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>