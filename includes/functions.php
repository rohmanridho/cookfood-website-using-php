<?php
$conn = mysqli_connect("localhost", "root", "", "food");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// function kueri($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

function tambah($data)
{
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $langkah = htmlspecialchars($data["langkah"]);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO resep VALUES('', '$foto', '$judul', '$bahan', '$langkah')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('anda belum memilih foto');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
        alert('Format file tidak sesuai');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    //lolos pengecekan, foto siap di upload
    //generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function cari($keyword)
{
    $query = "SELECT * FROM resep WHERE judul LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'
    ");
    if( mysqli_fetch_assoc($result)){
        echo "
        <script> 
        alert('username sudah terdaftar');
        </script>";

        return false;
    }
        //cek konfirmasi password 
        if ($password !== $password2) {
            echo "
            <script>
            alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
        }
    
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    
        return mysqli_affected_rows($conn);
    }

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM resep where id = '$id'");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = ($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $langkah = htmlspecialchars($data["langkah"]);
    $fotoLama = $data["fotoLama"];

    //cek apakah user pilih gambar baru atau tidak 
    if ($_FILES["foto"]["error"] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE resep SET
    foto = '$foto',
    judul = '$judul',
    bahan = '$bahan',
    langkah = '$langkah' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>