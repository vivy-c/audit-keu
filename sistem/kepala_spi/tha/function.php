<?php

$tb_visit = query("SELECT * FROM tb_visit ORDER BY tgl_visit ASC");

if (isset($_POST["tambahTHA"])) {
    //cek data berhasil tambah atau tidak
    if (tambahTHA($_POST) > 0) {
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
if (isset($_POST["ubahTHA"])) {
    //cek data berhasil tambah atau tidak
    if (ubahTHA($_POST) > 0) {
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

function tambahTHA($data)
{
    global $conn;
    $id_tha          = htmlspecialchars($data["id_tha"]);
    $id_visit        = htmlspecialchars($data["id_visit"]);
    $tgl_tha       = htmlspecialchars($data["tgl_tha"]);
    $catatan         = htmlspecialchars($data["catatan"]);
    $dasar_hukum     = htmlspecialchars($data["dasar_hukum"]);
    $penyebab        = htmlspecialchars($data["penyebab"]);
    $akibat          = htmlspecialchars($data["akibat"]);
    $rekomendasi     = htmlspecialchars($data["rekomendasi"]);
    $tanggapan_auditee      = htmlspecialchars($data["tanggapan_auditee"]);
    $rencana_tindak_lanjut  = htmlspecialchars($data["rencana_tindak_lanjut"]);
    $persetujuan     = htmlspecialchars($data["persetujuan"]);
    //insert data
    $query = "INSERT INTO tb_tha VALUES 
    ('$id_tha','$id_visit','$tgl_tha','$catatan','$dasar_hukum','$penyebab','$akibat','$rekomendasi','$tanggapan_auditee','$rencana_tindak_lanjut','$persetujuan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahTHA($data)
{
    global $conn;
    $id_tha          = htmlspecialchars($data["id_tha"]);
    $id_visit        = htmlspecialchars($data["id_visit"]);
    $tgl_tha       = htmlspecialchars($data["tgl_tha"]);
    $catatan         = htmlspecialchars($data["catatan"]);
    $dasar_hukum     = htmlspecialchars($data["dasar_hukum"]);
    $penyebab        = htmlspecialchars($data["penyebab"]);
    $akibat          = htmlspecialchars($data["akibat"]);
    $rekomendasi     = htmlspecialchars($data["rekomendasi"]);
    $tanggapan_auditee      = htmlspecialchars($data["tanggapan_auditee"]);
    $rencana_tindak_lanjut  = htmlspecialchars($data["rencana_tindak_lanjut"]);
    $persetujuan     = htmlspecialchars($data["persetujuan"]);
    
    //update data
    $query="UPDATE tb_tha SET 

      id_visit     = '$id_visit',
      tgl_tha      = '$tgl_tha',
      catatan      = '$catatan',
      dasar_hukum  = '$dasar_hukum',
      penyebab     = '$penyebab',
      akibat       = '$akibat',
      rekomendasi  = '$rekomendasi'
      tanggapan_auditee      = '$tanggapan_auditee'
      rencana_tindak_lanjut  = '$rencana_tindak_lanjut'
      persetujuan  = '$persetujuan'

      WHERE id_tha = '$id_tha'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>