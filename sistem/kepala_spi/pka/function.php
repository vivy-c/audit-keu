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

?>