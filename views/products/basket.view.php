<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="">
    <?php foreach ($productInBasket as $item) : ?>
        <div class="row d-flex justify-content-center align-items-center basket-position">
            <div class="col">
                <div class="cards ">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="/upload/<?= $item->image ?>" width="150" height="150" style="object-fit: cover; margin-right:25px" class="img-fluid rounded-3" alt="<?= $item->name ?>">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2"><?= $item->name ?></p>
                                <p><span class="text-muted price" id="<?= $item->id ?>" data-price="<?= $item->price ?>"><?= $item->price ?>₽/шт.</span>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn px-2 minus" data-product-id="<?= $item->product_id ?>">-</button>

                                <p id="count-<?= $item->product_id ?>" class="form-control"><?= $item->count ?></p>

                                <button class="btn px-2 plus" data-product-id="<?= $item->product_id ?>">+</button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0 total" data-price-position="<?= $item->product_id ?>"><?= (int)$item->price_position ?>₽</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <button class="trash" data-product-id="<?= $item->product_id ?>">🗑</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div class="itogBasket">
    <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>
        <p class="message"></p>
    <?php else : ?>
        <p class="totalPrice">итог: <?= $totalPrice ?>₽</p>
        <p class="totalCount">итоговое количество: <?= $totalCount ?>/шт.</p>
        <form action="/app/tables/basket/order.php">
            <button class="oform">оформить заказ</button> <br> <br>
        </form>
        <button class="clear" name="clear-btn">очистить корзину</button>
        <?php endif ?>
</div>



<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadBasket.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>