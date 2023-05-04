<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="container">
    <br> <br> <br> <br> <br> <br>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">
            <?php foreach ($products as $key => $product) : ?>
                <div class="carousel-item <?= $key == 0 ? 'active' : ' ' ?>">
                    <img src="/upload/<?= $product->image ?>" class="carousel-pic d-block w-100" height="450" style="object-fit: contain;" alt="<?= $product->name ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="/app/tables/products/show.php?id=<?= $product->id ?>" class="product-a" name="btn"><?= $product->name ?></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>