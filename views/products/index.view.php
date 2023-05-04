<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'?>


<div class="index-container">
    <div class="index-text-base">
        <h1 class="head-h">Груминг-салон для собак</h1>
        <p class="description">
            Качественный и комплексный уход за вашими питомцами по доступным ценам.
        </p>
        <a class="index-record-ret" href="/app/tables/products/application.php">Записать питомца</a>
    </div>
</div>

<div class="padding">
    <div class="about-us-section">
        <h1 class="about" id="about-us">О нас</h1>
        <div class="about-us" >
            <img class="about-us-image" src="/upload/portrait-of-german-shepherd-dog-in-gradient-lighting (1).jpg" alt="">
            <div class="text-about">
                <hr>
                <p class="p-advantages">
                    "DOG" – это доступное и качественное решение для владельцев собак и кошек, живущих в современном ритме и не желающих тратить много времени и сил для ухода за любимой собакой или кошкой.</p>

                <p class="p-advantages"> Наш салон для собак и кошек оказывают весь спектр парикмахерских услуг для животных, мы всегда стремимся к тому, чтобы результаты нашей работы отвечали самым высоким стандартам.</p>
                <h3 class="h-advantages">Наши преимущества:</h3>
                <p class="p-advantages"> — Стрижка собак по фиксированной стоимости независимо от объема услуг.</p>
                <p class="p-advantages">— Мы не используем анестезию и седативные препараты, забота и ласка -
                    лучшее средство!</p>
                <p class="p-advantages">— Только квалифицированные специалисты работают с вашими питомцами.</p>
                <p class="p-advantages">— Все инструменты, используемые мастерами, проходят полную обработку.</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="masters-section">
        <div class="masters-h-index">
            <h1 class="masters">Наша команда</h1>
            <a href="/app/tables/products/masters.php" class="view-all-masters">Посмотреть всех <img class="arrow" src="/upload/Arrow.png" alt=""></a>
        </div>

        <div class="masters-block">
            <?php foreach ($workers as $worker) : ?>
                <div>
                    <img src="/upload/<?= $worker->image ?>" class="master-photo" alt="<?= $worker->name ?>">
                    <p class="name_master_p"><?= $worker->surname ?> <?= $worker->name ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="photo-work-block">
        <h1 class="photo-block-h">Остались вопросы?</h1>
        <div class="record">
            <div class="record-photo-grid">
                <div class="record-text">
                    <p class="record-online-p">Онлайн-запись</p>
                    <a class="record-pet" href="/app/tables/products/application.php">Записать питомца</a>
                </div>
            </div>
            <div class="record-questions">
                <p>Мы с радостью ответим на интересующие вас вопросы и поможем подобрать лучший вариант. </p>
                <p>Связаться с нами можно любым удобным для вас способом:</p>
                <p class="call-us">Позвоните нам: +7-999-999-99-99</p>
                <p class="call-us"><a class="telegramm" href="tg://resolve?domain=llrzvv">Отправьте сообщение в чат телеграмм</a></p>
            </div>
        </div>
    </div>

    <h1 class="certificate-h">Сертификаты</h1>
    <p class="certificate-p">Все наши мастера сертифицированы и регулярно проходят повышение квалификации у лучших грумеров России.</p>
    <div class="certificate">
        <img class="certificate-image" src="/upload/сертификат6.jpg" alt="">
        <img class="certificate-image" src="/upload/сертификат1.jpg" alt="">
        <img class="certificate-image" src="/upload/сертификат4.jpg" alt="">
        <img class="certificate-image" src="/upload/сертификат2.jpg" alt="">
        <img class="certificate-image" src="/upload/сертификат3.png" alt="">
        <img class="certificate-image" src="/upload/сертификат5.jpg" alt="">
    </div>

    <h1 class="photo-block-h">Контакты</h1>
    <div class="card-index" id="card-index">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A33a4c994c16e0f6ba119fa47c6bcded2d26b7c006e11d4e501813333496bc2ad&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
        <div class="info-card">
            <h1 class="info-h">Где мы находимся?</h1>
            <p class="info-p">г. Челябинск, ул. Российская, д.194</p>
            <p class="info-p">+7-999-999-99-99</p>
        </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>