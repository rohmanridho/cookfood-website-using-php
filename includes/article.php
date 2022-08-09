<article>
        <div class="container">
            <?php foreach($resep as $row) : ?>
            <div class="main-article">
                <section>
                    <img src="img/<?= $row["foto"]?>" class="img-resep">
                    <h1><?= $row["judul"]; ?></h1>
                </section>
                <section>
                    <h2>Bahan-bahan</h2>
                    <div class="bahan">
                        <p><?= $row["bahan"]; ?>
</p>
                    </div>
                </section>
                <section>
                    <h2>Langkah-langkah</h2>
                    <div class="langkah">
                        <p><?= $row["langkah"]; ?>
            </p>
                    </div>
                    
                </section>
            </div>
            <?php endforeach;?>
        </div>
</article>