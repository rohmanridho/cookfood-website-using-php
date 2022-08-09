<?php
session_start();
if( !isset($_SESSION["login"])){
    header('location: login.php');
    exit;
}

require 'includes/functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal ditambahkan');
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
            padding: 10px;
            margin-bottom: 25px;
            margin-top: 3px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="container">
            <div class="main-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="foto"></label>
                    <input type="file" id="foto" name="foto"><br><br>
                    <label for="judul">Judul</label><br>
                    <input type="text" placeholder="judul" name="judul" required><br>

                    <label for="bahan">Bahan-bahan</label><br>
                    <textarea name="bahan" id="bahan" placeholder="Tuliskan bahan-bahan..." required></textarea><br>

                    <label for="langkah">Langkah-langkah</label><br>
                    <textarea name="langkah" id="langkah" placeholder="Tuliskan langkah-langkah..." required></textarea>
                    <br>
                    <button type="submit" name="submit">Publikasikan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>