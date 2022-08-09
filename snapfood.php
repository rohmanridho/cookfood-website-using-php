<?php
require 'includes/functions.php';
$makan = query("SELECT * FROM snapfood ORDER BY RAND()");
?>

<?php include 'includes/header.php'; ?>

<title>Pamerkan Masakanmu di Snapfood - CookFood</title>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/article2.php'; ?>
    <?php include 'includes/footer.php'; ?>
</body>

</html>