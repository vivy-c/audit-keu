<?php

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
    $tgl_visit          = htmlspecialchars($data["tgl_visit"]);
    $penanggung_jawab   = htmlspecialchars($data["penanggung_jawab"]);
    
    //insert data
    $query = "INSERT INTO tb_desk VALUES ('$id_desk','$id_pka','$jenis','$sumber_dana','$nominal','$tgl_monitoring','$lama_monitoring','$tgl_visit','$penanggung_jawab')";
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
    $tgl_visit          = htmlspecialchars($data["tgl_visit"]);
    $penanggung_jawab   = htmlspecialchars($data["penanggung_jawab"]);

    //update data
    $query="UPDATE tb_user SET 

      -- id_desk   = '$id_desk',
      id_pka         = '$id_pka',
      jenis          = '$jenis',
      sumber_dana    = '$sumber_dana',
      nominal        = '$nominal',
      tgl_monitoring    = '$tgl_monitoring',
      lama_monitoring   = '$lama_monitoring',
      tgl_visit         = '$tgl_visit',
      penanggung_jawab  = '$penanggung_jawab'

      WHERE id_desk = '$id_desk'
      ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}


?>