<nav>
    <div class="container">
        <div class="main-navbar">
            <div>
                <a href="index.php"><img src="img/cookfoods.png" alt="cookfood" width="120px">
                </a>
            </div>
            <div>
            <form action="search.php" method="POST">
                <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari resep" autocomplete="off"></input>
                <button class="search" type="submit" name="cari">Cari</button>
                
            </form>
            </div>
            <div class="menu">
                <ul>
                        <li><a href="index.php" class="main-menu">Resep</a></li>
                        <li><a href="snapfood.php" class="main-menu">Snapfood</a></li>
                        <?php if( !isset($_SESSION["login"])){
echo "<li><a href='login.php' class='login'>Masuk</a></li>";
}else {
    echo"<li><a href='edit.php' class='login'>Edit</a></li>";
}
?>
                </ul>
            </div>
        </div>
    </div>
</nav>