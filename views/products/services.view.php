<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php' ?>

<div class="padding">
    <div class="services">
        <h1 class="services-h">Услуги и цены</h1>
        <p class="breeds-p">породы, с которыми мы работаем</p>
        <div class="category-breed-container">
            <?php foreach ($categories as $category) : ?>
                <a class="category-breed" href="/app/tables/products/services.php?category=<?= $category->id ?>" id="btnradio"><?= $category->name ?></a>
            <?php endforeach ?>
        </div>
        <div class="dog-image-name">
            <?php foreach ($breeds as $breed) : ?>
                <div class="grid-dogs">
                      <img src="/upload/<?= $breed->image ?>" class="breed-image" alt="<?= $breed->name ?>">
                <div class="name_breed">
                    <p class="name-breed-p"><?= $breed->name ?></p>
                </div>
                </div>
              
            <?php endforeach ?>
        </div>

        <h1 class="all-services">Все услуги</h1>
        <div class="services-grid">
            <div>
                <?php foreach ($services as $service) : ?>
                    <div class="list-services">
                        <div class="info-line">
                            <h3 class="service-name"><?= $service->name ?></h3>
                            <h3 class="service-price"><?= (int) $service->price ?> ₽</h3>
                            <a class="btn-plus" data-bs-toggle="collapse" href="#collapseExample<?= $service->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img class="plus-services" src="/upload/plus.png" alt="">
                            </a>
                        </div>
                        <div class="collapse" id="collapseExample<?= $service->id ?>">
                            <div class="services-all">
                                 <h4 class="duration-services"> Примерная продолжительность - <?= (int) $service->duration ?> ч.</h4>
                                <?php $arrayDesc = explode(', ', $service->description) ?><ul>
                                    <?php foreach ($arrayDesc as $item) : ?>
                                        <li class="description_li"><?= $item ?></li>
                                    <?php endforeach ?>
                                </ul>
                               
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="btn-record">
            <a class="a-href" href="/app/tables/products/application.php">Записать питомца <img class="arrow" src="/upload/Arrow.png" alt=""></a>
        </div>
    </div>
</div>
<script src="/assets/js/plus.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>