<?php
require 'includes/functions.php';
$resep = query("SELECT * FROM resep ORDER BY RAND() LIMIT 10");
?>

<?php
if ( isset($_POST["cari"])){
    $resep = cari($_POST["keyword"]);
} 
if(!isset($_POST["cari"])){
    header('location: index.php');
}
?>

<?php include 'includes/header.php'; ?>

<title>Ekspresikan Perasaan Lewat Masakan - CookFood</title>
</head>

<body>
    <div class="main-container">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/article.php'; ?>
    </div>

</body>

</html>