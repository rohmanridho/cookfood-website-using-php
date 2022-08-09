<article>
    <div class="container-snapfood">
        <div class="main-content">
            <?php foreach ($makan as $row) : ?>
                <div class="card">
                    <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title"><?= $row["makanan"] ?></h2>
                        <p class="card-text"><?= $row["cerita"] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="card">
                    <img src="img/roti.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, veritatis?</h2>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos dolorum earum maiores eaque provident totam, non doloremque sequi repellat adipisci similique esse pariatur repellendus vero error. Cum enim harum reprehenderit?</p>
                    </div>
                </div>
        </div>
    </div>
</article>