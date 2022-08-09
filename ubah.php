<?php
session_start();
if( !isset($_SESSION["login"])){
    header('location: login.php');
    exit;
}

require 'includes/functions.php';

$id = $_GET["id"];

$recep = query("SELECT * FROM resep WHERE id = $id")[0];


if (isset($_POST["submit"])) {

    if( ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href='index.php';
        </script>";
    }else {
        echo "<script>
        alert('data gagal diubah');
        document.location.href='tambah.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Helvetica, sans-serif;
        }

        .body {
            background-color: red;
        }
        .container {
            width: 640px;
            margin: auto;
        }
        .main-content {
            margin-top: 25px;
            width: 100%;
        }
        label {
            padding-left: .5rem;
        }

        input,
        textarea {
            border: .5px solid hsl(40, 100%, 10%, .25);
            border-radius: 5px;
        }

        input[type=text] {
            width: 100%;
            padding: .5rem;
            margin-bottom: 25px;
            margin-top: 3px;
        }

        textarea {
            width: 100%;
            resize: none;
            height: 100px;
            padding: 10px 15px;
            margin-bottom: 25px;
            margin-top: 3px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="container">
            <div class="main-content">
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $recep["id"]?>">
        <input type="hidden" name="fotoLama" value="<?= $recep["foto"]?>">
        
                    <label for="foto"></label>
                    <img src="img/<?= $recep["foto"]?>">
                    <input type="file" id="foto" name="foto"><br><br>

                    <label for="judul">Judul</label><br>
                    <input type="text" placeholder="judul" name="judul" required value="<?= $recep["judul"];?>"><br>

                    <label for="bahan">Bahan-bahan</label><br>
                    <textarea name="bahan" id="bahan" placeholder="Tuliskan bahan-bahan..." required><?= $recep["bahan"];?></textarea><br>

                    <label for="langkah">Langkah-langkah</label><br>
                    <textarea name="langkah" id="langkah" placeholder="Tuliskan langkah-langkah..." required><?= $recep["langkah"];?></textarea>
                    <br>
                    <button type="submit" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>