<?php
session_start();

require 'includes/functions.php';
$resep = query("SELECT * FROM resep ORDER BY RAND() LIMIT 10");
?>

<?php include 'includes/header.php'; ?>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<title>Ekspresikan Perasaan Lewat Masakan - CookFood</title>
</head>

<body>
    <div class="main-container">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/article.php'; ?>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>