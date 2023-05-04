<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php' ?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
        <div class="col">
            <div class="card cardOne">
                <img src="/upload/<?=$product->image?>" class="card-img-top imgCard" alt="<?=$product->image?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$product->name?></h5>
                    <p class="card-text"><?=$product->price?>₽</p>
                    <p class="card-text">количество: <?=$product->count?> шт.</p>
                    <p class="card-text">цвет: <?=$product->color?></p>
                    <p class="card-text">страна: <?=$product->country?></p>
                    <p class="card-text">категория: <?=$product->category?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>