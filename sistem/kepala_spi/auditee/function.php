<?php

function addAuditee($data)
    {
        global $conn;
        $id_auditee = htmlspecialchars($data["id_auditee"]);
        $id_user = htmlspecialchars($data["id_user"]);
        $nama_unit = htmlspecialchars($data["nama_unit"]);
        $tanggal  = htmlspecialchars($data["tanggal"]);
    
        //insert data
        $query = "INSERT INTO tb_auditee VALUES ('$id_auditee','$id_user','$nama_unit','$tanggal')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    