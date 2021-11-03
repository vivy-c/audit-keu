<?php

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

    //insert data
    $query="UPDATE tb_user SET 

      -- id_pka   = '$id_pka',
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