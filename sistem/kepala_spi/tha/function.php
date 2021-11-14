<?php


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
    $id_desk     = htmlspecialchars($data["id_desk"]);
    $id_pka      = htmlspecialchars($data["id_pka"]);
    $jenis       = htmlspecialchars($data["jenis"]);
    $sumber_dana = htmlspecialchars($data["sumber_dana"]);
    $nominal     = htmlspecialchars($data["nominal"]);
    $tgl_monitoring     = htmlspecialchars($data["tgl_monitoring"]);
    $lama_monitoring    = htmlspecialchars($data["lama_monitoring"]);
    $tgl_visit          = htmlspecialchars($data["tgl_visit"]);

    //update data
    $query="UPDATE tb_desk SET 

      -- id_desk   = '$id_desk',
      id_pka         = '$id_pka',
      jenis          = '$jenis',
      sumber_dana    = '$sumber_dana',
      nominal        = '$nominal',
      tgl_monitoring    = '$tgl_monitoring',
      lama_monitoring   = '$lama_monitoring',
      tgl_visit         = '$tgl_visit'

      WHERE id_desk = '$id_desk'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>