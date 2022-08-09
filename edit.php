<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

require 'includes/functions.php';
$resep = query("SELECT * FROM resep");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        html {
            background-color: white;
        }

        .container {
            width: 740px;
            background-color: hsl(29, 100%, 98%);
            margin: 0 auto;
            height: 100vh;
        }

        .container-nav {
            width: 740px;
            margin: auto;
        }

        nav {
            box-shadow: 0 .5px 3px 0 rgba(0, 0, 0, 0.3);
            background-color: hsl(29, 100%, 98%);
            position: sticky;
            top: 0;
            height: 54px;
            display: flex;
            align-items: center;
        }

        .main-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-kiri {
            border: 1px solid #ff7b00;
            color: #ff7b00;
        }

        .menu-kanan {
            border: 1px solid #f00;
            color: #f00;
        }

        .menu-kiri,
        .menu-kanan {
            display: inline-block;
            padding: 4px 6px;
            text-decoration: none;
            border-radius: 7px;
        }

        table {
            margin-right: 20px;
            border-collapse: collapse;
            width: 98%;
            margin: auto;
        }

        th {
            padding: 5px 0;
        }

        tr,
        th,
        td {
            border: 1px solid black;
        }

        td {
            padding: 4px 5px;
            text-align: center;
        }

        .judul-bahan-langkah {
            text-align: left;
        }

        .hapus-ubah {
            text-decoration: none;
            color: blue;
        }

        .hapus-ubah:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav>
        <div class="container-nav">
            <div class="main-navbar">
                <div><a href="tambah.php" class="menu-kiri">Posting</a></div>
                <div><a href="index.php"><img src="img/cookfoods.png" alt="cookfood" width="120px"></a></div>
                <div><a href="logout.php" class="menu-kanan">Keluar</a></div>
            </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <table>
            <tr>
                <th width="30px">No</th>
                <th width="110px">Aksi</th>
                <th width="60px">Foto</th>
                <th width="115px">Judul</th>
                <th width="185px">Bahan</th>
                <th width="190px">Langkah</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($resep as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="hapus-ubah" onclick="return confirm('Hapus postingan');">hapus</a> ||
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="hapus-ubah">ubah</a>
                    </td>
                    <td><?= $row["foto"]; ?></td>
                    <td class="judul-bahan-langkah">
                        <p>
                            <?php
                            $judul = $row["judul"];
                            if (strlen($judul > 20)) {
                                $judul = substr($judul, 0, 20) . "...";
                            }
                            echo $judul; ?></p>
                    </td>
                    </td>
                    <td class="judul-bahan-langkah">
                        <p>
                            <?php
                            $bahan = $row["bahan"];
                            if (strlen($bahan > 47)) {
                                $bahan = substr($bahan, 0, 47) . "...";
                            }
                            echo $bahan; ?></p>
                    </td>
                    <td class="judul-bahan-langkah">
                        <p>
                            <?php
                            $langkah = $row["langkah"];
                            if (strlen($langkah > 47)) {
                                $langkah = substr($langkah, 0, 47) . "...";
                            }
                            echo $langkah; ?></p>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>