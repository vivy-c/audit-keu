<?php
$conn = mysqli_connect("localhost", "root", "", "sistem_cuti");


function tambah($data)
{
    global $conn;
    $nim = $data["nim"];
    $doswal = $data["doswal"];
    $kajur = $data["kajur"];
    $username = $data["username"];
    $password = $data["password"];
    $nama = $data["nama"];
    $thn_angkatan = $data["thn_angkatan"];
    $kelas = $data["kelas"];
    $tempat_lhr = $data["tempat_lhr"];
    $tgl_lhr = $data["tgl_lhr"];
    $jk = $data["jk"];
    $alamat = $data["alamat"];
    $no_telp = $data["no_telp"];


    $foto = upload_foto();
    if (!$foto) {
        return false;
    }


    $ttd = upload_ttd();
    if (!$ttd) {
        return false;
    }


    $query = "INSERT INTO tb_mahasiswa VALUES ('$nim', '$doswal', '$kajur', '$username', '$password','$nama',
    '$thn_angkatan', '$kelas', '$tempat_lhr', '$tgl_lhr', '$jk', '$alamat','$no_telp','$foto','$ttd')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function upload_foto()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
        alert('Pilih File Foto Terlebih Dahulu!');
        </script>";
        return false;
    }

    //cek apakah yang boleh diupload
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));
    if (!in_array($ekstensi, $ekstensiValid)) {
        echo "<script>
        alert('Tolong Upload File (jpg/jpeg/png) Foto!!');
        </script>";
        return false;
    }

    //cek jika  ukuran  file   terlalu besar
    if ($ukuranFile > 50000000) {
        echo "<script>
        alert('Ukuran File Foto Terlalu Besar (MAX 5 mb) ');
        </script>";
        return false;
    }

    //lolos pengecekan
    //nama baru

    $nama = $_POST['nama'];

    $namaFileBaru = ("foto_" . $nama);
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensi;


    move_uploaded_file($tmpName, '../mahasiswa/img/' . $namaFileBaru);
    return $namaFileBaru;
}



function upload_ttd()
{

    $namaFile   = $_FILES['ttd']['name'];
    $ukuranFile = $_FILES['ttd']['size'];
    $error      = $_FILES['ttd']['error'];
    $tmpName    = $_FILES['ttd']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
        alert('Pilih File TTD Terlebih Dahulu!');
        </script>";
        return false;
    }

    //cek apakah yang boleh diupload
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));
    if (!in_array($ekstensi, $ekstensiValid)) {
        echo "<script>
        alert('Tolong Upload File (jpg/jpeg/png) Foto!!');
        </script>";
        return false;
    }

    //cek jika  ukuran  file   terlalu besar
    if ($ukuranFile > 50000000) {
        echo "<script>
        alert('Ukuran File Tanda Tangan Terlalu Besar (MAX 5 mb) ');
        </script>";
        return false;
    }

    //lolos pengecekan
    //nama baru

    $nama = $_POST['nama'];

    $namaFileBaru = ("ttd_" . $nama);
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensi;


    move_uploaded_file($tmpName, '../mahasiswa/img/' . $namaFileBaru);
    return $namaFileBaru;
} ?>
<div class="form-group">
    <label for="foto">Foto</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="foto" name="foto">
        <label class="custom-file-label" for="foto"></label>
    </div>
</div>
<div class="form-group">
    <label for="ttd">Tanda Tangan</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="ttd" name="ttd">
            <label class="custom-file-label" for="ttd"></label>
        </div>
    </div>
</div>